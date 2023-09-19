<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name', 'last_name', 'phone_number', 'email', 'company_id', 'password', 'profile_image', 'status', 'role', 'created_at', 'bell_notification_count'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function getUsers($data)
    {
        $users = User::whereIn('role', $data['roles'])->where('users.id', '!=', $data['user_id'])
            ->when(($data['company_id'] > 0), function ($q) use ($data) {
                $q->where('company_id', '=', $data['company_id']);
            })
            ->when($data['search_term'], function ($q) use ($data) {
                $q->where(function ($query) use ($data) {
                    $query->where('first_name', 'like', '%' . $data['search_term'] . '%');
                    $query->orWhere('last_name', 'like', '%' . $data['search_term'] . '%');
                    $query->orWhere('email', 'like', '%' . $data['search_term'] . '%');
                    $query->orWhere('phone_number', 'like', '%' . $data['search_term'] . '%');
                });
            })
            ->when((!$data['status']), function ($q) {
                $q->where('status', '=', "active");
            })
            ->when(($data['status'] != 'all' && $data['status'] != null), function ($q) use ($data) {
                $q->where('status', '=', $data['status']);
            })
            ->when($data['role'], function ($q) use ($data) {
                $q->where('role', '=', $data['role']);
            })
            ->when($data['start_date'], function ($q) use ($data) {
                $q->whereBetween('created_at', [$data['start_date'], $data['end_date']]);
            })
            ->when((auth()->user()->role == 'owner'), function ($q) use ($data) {
                $q->join('user_owners', function ($join) use ($data) {
                    $join->on('users.id', '=', 'user_owners.user_id');
                    $join->on('user_owners.owner_id', '=', DB::raw($data['user_id']));
                });
            })
            ->select('users.*')
            ->orderBy('users.id', 'DESC');
        if ($data['paginate'] > 0)
            $users = $users->paginate($data['paginate']);
        else
            $users = $users->get();
        return $users;
    }

    public function getRoleAttribute($value)
    {
        $valueMap = [
            'user'  => 'contact',
        ];
        return $valueMap[$value] ?? $value;
    }
}
