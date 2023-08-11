<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RoundRobinSetting extends Model
{
    use HasFactory;
    protected $fillable = ['company_id', 'owner_id', 'priority', 'last_lead'];

    public static function getDataByCompany($company_id)
    {
        $data = User::where('users.role', '=', 'owner')->where('users.company_id', '=', $company_id)
            ->leftJoin('round_robin_settings', function ($join) {
                $join->on('round_robin_settings.owner_id', '=', 'users.id');
            })->select('users.*', 'round_robin_settings.priority')->get();

        return $data;
    }

    public static function RoundRobinOwner($company_id)
    {
        $rand = rand(1, 9);
        $priority = "low";
        if ($rand > 3) $priority = "high";

        $data = RoundRobinSetting::where('company_id', '=', $company_id)
            ->orderByRaw("priority='$priority' DESC, last_lead ASC")
            ->first();

        return $data;
    }
}
