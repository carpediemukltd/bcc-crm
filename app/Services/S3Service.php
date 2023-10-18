<?php

namespace App\Services;

use Aws\S3\S3Client;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Storage;

class S3Service
{
    private $s3Client;
    private $AWS_BUCKET;
    private $AWS_BASE_URL;
    private $DISK;
    private $BASE_URL;

    public function __construct($disk)
    {
        $this->s3Client = new S3Client([
            'credentials'   => [
                'key'       => env('AWS_ACCESS_KEY_ID'),
                'secret'    => env('AWS_SECRET_ACCESS_KEY'),
            ],
            'region'        => env('AWS_DEFAULT_REGION'),
            'version'       => '2006-03-01',
        ]);

        $fileSystem         = Config::get('filesystems.disks.' . $disk);
        $this->AWS_BUCKET   = Arr::get($fileSystem, 'bucket', '');
        $this->AWS_BASE_URL = Arr::get($fileSystem, 'url', '');
        $this->BASE_URL     = Arr::get($fileSystem, 'url', '');
        $this->DISK         = $disk ? $disk : env('FILESYSTEM_DRIVER', 'public');
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
        //Creating a presigned URL
        $cmd = $this->s3Client->getCommand('PutObject', [
            'Bucket'    => env('AWS_BUCKET'),
            'Key'       => $key,
            'Metadata'  => $metadata,
        ]);
        $expires = '+' . env('AWS_PRESIGNED_EXPIRED', 20) . ' minutes';
        $request = $this->s3Client->createPresignedRequest($cmd, $expires);

        return [
            'presigned_url' => (string)$request->getUri(),
            'url'           => env('AWS_URL'). '/' . $key,
        ];
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

        // custom disk for s3
        if ($disk != 'default') {
            $fileSystem         = Config::get('filesystems.disks.' . $disk);
            $this->AWS_BUCKET   = Arr::get($fileSystem, 'bucket', '');
            $this->AWS_BASE_URL = Arr::get($fileSystem, 'url', '');
            $this->BASE_URL     = Arr::get($fileSystem, 'url', '');
            $this->DISK         = $disk;
        }

        // Check if given url is absolute / relative
        if (FileStorageService::isAbsoluteUrl($key)) {
            // Get relative url
            $key = FileStorageService::getRelativeUrl($key);

            // Remove bucket name from relative url
            $key = str_replace($this->AWS_BUCKET . '/', '', $key);
        }

        $result = Storage::disk($this->DISK)
            ->temporaryUrl($key, now()->addMinutes(env('AWS_PRESIGNED_EXPIRED', 20)));

        return $result;
    }
}