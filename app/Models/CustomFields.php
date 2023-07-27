<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CustomFields extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'title', 'type', 'sort'];

    public static function getDataByDeal($id)
    {
        $CustomFields = CustomFields::where('custom_fields.type', '=', 'deals')
            ->leftJoin('user_details', function ($join) use ($id) {
                $join->on('custom_fields.id', '=', 'user_details.custom_field_id');
                $join->on('user_details.deal_id', '=', DB::raw($id));
            })->select('custom_fields.*', 'user_details.data')->get();

        return $CustomFields;
    }
    
    public static function getDataByUser($id)
    {
        $CustomFields = CustomFields::where('custom_fields.type', '=', 'contact')
            ->leftJoin('user_details', function ($join) use ($id) {
                $join->on('custom_fields.id', '=', 'user_details.custom_field_id');
                $join->on('user_details.user_id', '=', DB::raw($id));
            })->select('custom_fields.*', 'user_details.data')->get();

        return $CustomFields;
    }
}
