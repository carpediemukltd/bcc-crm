<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'status'];

    public static function getCompanyByUser($user_id)
    {
        $data = Company::join('users', function ($join) {
            $join->on('users.company_id', '=', 'companies.id');
        })
        ->where('users.id', $user_id)
        ->select('companies.*')
        ->get();
        
        return $data;
    }
}
