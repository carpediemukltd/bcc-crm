<?php

namespace App\Http\Controllers;

use App\Models\BusinessSettingEntity;
use App\Models\BusinessSettingEntityType;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index(Request $request){
        $data['current_slug'] = 'Settings';
        $data['slug']         = 'settings';
        $type = $request->input('type') ?? 'all';

        $data['type']           = $type; // Pass the $type variable to the view

        $query = BusinessSettingEntity::with('type');

        if ($type !== 'all') {
            $query->whereHas('type', function ($query) use ($type) {
                $query->where('name', $type);
            });
        }

        $data['entities']       = $query->orderBy('id', 'DESC')->paginate(10);
        $data['entity_types']   = BusinessSettingEntityType::get();

        if ($request->ajax()) {
            return view('admin.setting.index', $data)->render();

            return view('admin.setting.business-setting.pagination', $data)->render();
        } else {
            return view('admin.setting.index', $data);

            return view('admin.setting.business-setting.index', $data);
        }
    }
}
