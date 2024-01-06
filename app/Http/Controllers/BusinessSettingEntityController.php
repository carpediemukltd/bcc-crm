<?php

namespace App\Http\Controllers;

use App\Models\BusinessSettingEntity;
use App\Models\BusinessSettingEntityType;
use App\Services\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BusinessSettingEntityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $type = $request->input('type') ?? 'all';

        $data['current_slug']   = 'Business Setting Entities';
        $data['slug']           = 'business_setting';
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
            return view('admin.setting.business-setting.pagination', $data)->render();
        } else {
            return view('admin.setting.business-setting.index', $data);
        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
                
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'type' => 'required|exists:business_setting_entity_types,id',
        ]);

        // If validation fails, redirect back with errors
        if ($validator->fails()) {
            return ApiResponse::error($validator->errors()->first(), 400);

            return redirect()->back()->with(['error' => $validator->errors()->first()], 403);
        }

        // Create a new CompanyBankSetting instance
        $businessSettingEntity = new BusinessSettingEntity();
        $businessSettingEntity->name = $request->input('name');
        $businessSettingEntity->type()->associate(BusinessSettingEntityType::find($request->input('type')));
        $businessSettingEntity->save();
        return ApiResponse::success($businessSettingEntity, '', 200);


        // Redirect to the listing page with a success message
        return redirect()->route('business-settings.index')->with('success', 'Entity added successfully.');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $businessSettingEntity = BusinessSettingEntity::with('type')->findOrFail($id);
        return ApiResponse::success($businessSettingEntity, '', 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'type' => 'required|exists:business_setting_entity_types,id'
        ]);

        // If validation fails, redirect back with errors
        if ($validator->fails()) {
            return ApiResponse::error($validator->errors()->first(), 400);
        }

        // Update the CompanyBankSetting instance
        $businessSettingEntity = BusinessSettingEntity::findOrFail($id);
        $businessSettingEntity->name = $request->input('name');
        $businessSettingEntity->type()->associate(BusinessSettingEntityType::find($request->input('type')));
        $businessSettingEntity->save();
        return ApiResponse::success($businessSettingEntity, 'Entity updated successfully.', 200);
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $entity = BusinessSettingEntity::whereId($id)->delete();
        if($entity){
            return ApiResponse::success([], 'Entity deleted successfully.', 200);
        }
        return ApiResponse::error('Error deleting Entity', 400);
    }
}
