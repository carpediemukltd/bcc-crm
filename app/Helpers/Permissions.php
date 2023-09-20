<?php

namespace App\Helpers;

use App\Models\User;
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

    public static function checkCompany($user, $company_id)
    {
        return ($company_id == $user->company_id);
    }

    public static function getSubRoles($user)
    {
        $roles = array('');
        if ($user->role == 'superadmin') {
            $roles = array('admin', 'owner', 'user');
        } else if ($user->role == 'admin') {
            $roles = array('owner', 'user');
        } else if ($user->role == 'owner') {
            $roles = array('user');
        } else if ($user->role == 'user') {
            // $roles = array('no-permission');
            $roles = array('');
        }

        return $roles;
    }
}
