<?php

namespace App\Helpers;

use App\Models\User;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;


class Permissions
{
 
    public static function checkUserAccess($user, $user_id)
    {
        $company_id = 0;
        if ($user->role != 'superadmin') {
            $company_id = $user->company_id;
        }
        $data = User::where(['users.id' => $user_id])
            ->when(($company_id > 0), function ($q) use ($company_id) {
                $q->where('company_id', '=', $company_id);
            })->when(($user->role == 'owner'), function ($q) use ($user) {
                $q->join('user_owners', function ($join) use ($user) {
                    $join->on('users.id', '=', 'user_owners.user_id');
                    $join->on('user_owners.owner_id', '=', DB::raw($user->id));
                });
            })->first();

        return $data;
    }
}