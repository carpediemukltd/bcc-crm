<?php

namespace App\Services;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class FileStorageService
{
    private $DISK;
    private $BASE_URL;
    private $fileUploadedResult;
    private $s3Service;

    public function __construct($disk = null)
    {
        ini_set('memory_limit', '5096M'); 
        $fileSystem = ($disk) ?
            Config::get('filesystems.disks.' . $disk) :
            Config::get('filesystems.disks.' . env('FILESYSTEM_DRIVER', 'public'));
        $this->BASE_URL = Arr::get($fileSystem, 'url', '');
        $this->DISK = $disk ? $disk : env('FILESYSTEM_DRIVER', 'public');

        $this->fileUploadedResult = [
            'status'            => false,
            'data'              => [
                'url'           => [
                    'relative'  => '',
                    'absolute'  => '',
                ]
            ],
            'message' => 'Upload some file!',
        ];

        if ($this->isDriverS3()) {
            $this->s3Service = new S3Service($this->DISK);
        }
    }

    /**
     * Get result uploaded file
     *
     * @return array
     */
    public function getResult()
    {
        return $this->fileUploadedResult;
    }

    /**
     * Get url result uploaded file
     *
     * @param string $type
     * @return mixed
     */
    public function getResultUrl($type = 'relative')
    {
        return Arr::get($this->fileUploadedResult, 'data.url.' . $type);
    }

    /**
     * Get status result uploaded file
     *
     * @return boolean
     */
    public function getResultStatus()
    {
        return Arr::get($this->fileUploadedResult, 'status', false);
    }

    /**
     * Get message result uploaded file
     *
     * @return string
     */
    public function getResultMessage()
    {
        return Arr::get($this->fileUploadedResult, 'message', '');
    }

    /**
     * Upload file
     *
     * @param $file
     * @param $directory
     * @param $fileName.ext
     * @return string Full url
     */
    public function uploadFile($file, $directory, $fileName = null)
    {
        
        if (!$file) {
            return Arr::get($this->fileUploadedResult, 'data.url.absolute');
        }
        if ($fileName != null) {
            $url = Storage::disk($this->DISK)
                ->putFileAs($directory, $file, $fileName);
        } else {
            $url = Storage::disk($this->DISK)
                ->putFile($directory, $file);
        }

        switch ($this->DISK) {
            case 's3':
                $this->fileUploadedResult = [
                    'status'            => true,
                    'data'              => [
                        'url'           => [
                            'relative'  => $url,
                            'absolute'  => Storage::disk($this->DISK)->url($url),
                        ]
                    ],
                    'message' => 'Upload file success!',
                ];
                break;
            case 'public':
                $this->fileUploadedResult = [
                    'status'            => true,
                    'data'              => [
                        'url'           => [
                            'relative'  => '/' . $url,
                            'absolute'  => $this->BASE_URL . '/' .$url,
                        ]
                    ],
                    'message'           => 'Upload file success!',
                ];
                break;
        }
        return Arr::get($this->fileUploadedResult, 'data.url.absolute');
    }

    /**
     * Check if given url is absolute / relative
     *
     * @param $url
     * @return bool
     */
    public static function isAbsoluteUrl($url)
    {
        $urlParts = parse_url($url);
        return Arr::has($urlParts, 'host') ? true : false;
    }

    /**
     * Get relative url from absolute url
     * 'https://macan-staging-input.s3-ap-southeast-1.amazonaws.com/challenge-videos/21_64.mp4'
     * to
     * 'challenge-videos/21_64.mp4'
     *
     * @param $url
     * @return bool
     */
    public static function getRelativeUrl($url)
    {
        // Get parts url
        $urlParts   = parse_url($url);

        // Get path url
        $pathUrl    = Arr::get($urlParts, 'path');
        if (!$pathUrl) {
            return $pathUrl;
        }

        // Check first character
        if (substr($pathUrl, 0, 1) == '/') {
            $pathUrl = substr($pathUrl, 1);
        }
        return $pathUrl;
    }

    /**
     * Get relative path without bucket name
     * @param $url
     * @return string
     */
    public static function getRelativePath($url)
    {
        $resultTmp      = self::getRelativeUrl($url);
        $results        = explode('/', $resultTmp);
        return implode('/', array_slice($results, 1));
    }

    /**
     * Check is filesystem driver is s3 or not
     *
     * @return bool
     */
    public function isDriverS3()
    {
        return Str::contains($this->DISK, 's3');
    }

    /**
     * Create temporary url (pre signed url for aws s3 upload)
     *
     * @param $key
     * @param array $metadata
     * @return array
     */
    public function createPutPresignedUrl($key, $metadata = [])
    {
        $result = null;
        if ($this->isDriverS3()) {
            $result = $this->s3Service->createPutPresignedUrl($key, $metadata);
        }
        return $result;
    }

    /**
     * Get temporary url (pre signed url for aws s3)
     *
     * @param $key
     * @param string $disk
     * @return null | string
     */
    public function getTemporaryUrl($key, $disk = 'default')
    {
        $result = null;
        if ($this->isDriverS3()) {
            $result = $this->s3Service->getTemporaryUrl($key, $disk);
        }
        return $result;
    }

    /**
     * Check if file exists or not
     *
     * @param $path
     * @return bool
     */
    public function isExists($path)
    {
        return Storage::disk($this->DISK)->exists($path);
    }

    /**
     * Get storage service name
     *
     * @param $fullPath
     * @return string
     */
    public function getStorageServiceName($fullPath)
    {
        // Get parts url
        $urlParts   = parse_url($fullPath);
        $host       = Arr::get($urlParts, 'host', '');
        if (Str::contains($host, 'amazonaws.com')) {
            return 's3';
        } elseif (Str::contains($host, 'digitaloceanspaces.com')) {
            return 'space';
        }
        return '';
    }

    /**
     * Get extension from file
     * @param $file
     * @return mixed
     */
    public function getExtension($file)
    {
        return $file->getClientOriginalExtension();
    }
}