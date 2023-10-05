<?php

namespace App\Models;

use App\Services\FileStorageService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Documents extends Model
{
    use HasFactory;
    protected $fillable = ['id ', 'user_id', 'type', 'file_group_name', 'file_name', 'file_path', 'ocrolus_status', 'ocrolus_document_status', 'ocrolus_mixed_doc_id', 'ocrolus_mixed_doc_pk', 'ocrolus_mixed_doc_uuid', 'ocrolus_doc_page_count', 'ocrolus_doc_verification_status', 'ocrolus_book_uuid', 'ocrolus_book_pk', 'ocrolus_book_summary_csv_path'];
    public function getFilePathAttribute($key){
        return $this->getS3Url($key);
    }
    public function getOcrolusBookSummaryCsvPathAttribute($key){
        return $this->getS3Url($key);
    }
    private function getS3Url($key)
    {
        $fileStorageService = new FileStorageService(env('FILESYSTEM_DRIVER'));
        $storageServiceName = $fileStorageService->getStorageServiceName($key);
        switch ($storageServiceName) {
            case 's3':
                return $fileStorageService->getTemporaryUrl($key);
                break;
            default:
            return URL("uploads/documents")."/".$key;
        }
    }

    public static function getUploadedDocument($iUserId)
    {
        return self::select([
                "file_group_name",
                "file_name",
                "file_path",
                "type"
            ])
            ->where("user_id", $iUserId)
            ->orderBy("id", "DESC")
            ->get()
            ->toArray();
    }

    public static function getDocumentName($iDocumentId)
    {
         return self::from("documents AS D")
                    ->leftJoin("ocrolus_book_detail AS OBD", "OBD.document_id", "D.id")
                    ->select(["D.file_name", "D.file_path", "OBD.report"])
                    ->where("D.id", $iDocumentId)
                    ->first();
    }
}
