<?php

namespace App\Http\Middleware;

use App\Models\ActivityLog;
use App\Models\Pipeline;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LogUserActivity
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    // public function handle($request, Closure $next)
    // {



    //     // $module = $request->segment(1);
    //     // $actionType = $request->segment(2);

    //     $module = $request->route('module');
    //     $actionType = $request->route('action');


    //     dd($module,$actionType);
    //     $response = $next($request);

    //          // Get the field configurations from the configuration
    //     $fieldConfigurations = config('activity_fields.' . $module . '.' . $actionType, []);

    //     // Capture the record if it's an 'add' or 'update' action
    //     if (in_array($actionType, ['add', 'update'], true)) {
    //         $modelName = Str::singular($module); // Convert module name to singular
    //         $modelClass = 'App\Models\\' . ucfirst($modelName); // Define model class
    //         $record = $modelClass::latest()->first(); // Capture newly added/updated record


    //         // dd($record);

    //         // Identify the fields that changed
    //         $changedFields = [];
    //         foreach ($fieldConfigurations as $fieldName) {
    //             if ($record->$fieldName !== $request->input($fieldName)) {
    //                 $changedFields[$fieldName] = [
    //                     'old' => $record->$fieldName,
    //                     'new' => $request->input($fieldName),
    //                 ];
    //             }
    //         }


    //         // dd($changedFields);
    //     }

    //     if (!empty($request->all())) {
    //         // Log the activity
    //         ActivityLog::create([
    //             'user_id' => auth()->id(),
    //             'action' => $actionType,
    //             'entity' => $module,
    //             'data' => json_encode($changedFields),  // Serialize data as JSON
    //         ]);
    //     }

    //     return $response;
    //     // }
    // }

    // public function handle($request, Closure $next)
    // {   


    //     // dd($request);

    //     // Parse route segments to extract module and action
    //     // $segments = $request->segments();
    //     $module = $request->segment(1);
    //     $actionType = $request->segment(2);

    //     $response = $next($request);


    //     // dd($module, $actionType);

    //     $fieldConfigurations = config('activity_fields.' . $module . '.' . $actionType, []);
    //     // dd($fieldConfigurations);
    //     if (in_array($actionType, ['add', 'edit'], true)) {
    //         $modelName = Str::singular($module);
    //         $modelClass = 'App\Models\\' . ucfirst($modelName);
    //         $record = $modelClass::latest()->first();




    //         $changedFields = [];
    //         foreach ($fieldConfigurations as $fieldName) {

    //             foreach ($record as $recordName) {

    //                if($recordName == $fieldName){

    //                     dd($record->$recordName , $request->input($fieldName));
    //                }else{
    //                 dd('bcd');
    //                }
    //                 if ($record->$fieldName !== $request->input($fieldName)) {
    //                     $changedFields[$fieldName] = [
    //                         'old' => $record->$fieldName,
    //                         'new' => $request->input($fieldName),
    //                     ];
    //                 }

    //             }
    //         }



    //     //    dd($fieldConfigurations);



    //         if (!empty($changedFields)) {
    //             ActivityLog::create([
    //                 'user_id' => auth()->id(),
    //                 'action' => $actionType,
    //                 'entity' => $module,
    //                 'data' => json_encode($changedFields),
    //             ]);
    //         }
    //     }

    //     return $response;
    // }


    public function handle($request, Closure $next)
    {   

        // dd($request);

        // Parse route segments to extract module and action
        $module = $request->segment(1);
        $actionType = $request->segment(2);

        if($module == 'contact'){

            $module = 'user';
        }

        $response = $next($request);

        // dd($request);

        $fieldMappings = config('activity_fields.' . $module . '.' . $actionType, []);



        if (in_array($actionType, ['add', 'edit'], true)) {
            $modelName = Str::singular($module);
            $modelClass = 'App\Models\\' . ucfirst($modelName);

            if ($actionType === 'add') {
                // For the "add" action, there is no old value, only the new value
                $changedFields = [];


                // dd($fieldMappings);
                foreach ($fieldMappings as $inputField) {


                    $inputValue = $request->input($inputField);


                    if($inputValue !== null){

                        $record = $modelClass::latest()->first();
                        // dd($record->id);

                        $changedFields[$inputField] = [
                            // 'old' => null, // No old value for "add"
                            'new' => $inputValue,
                        ];
                    }
                   
                }
            } elseif ($actionType === 'edit') {
                // For the "edit" action, compare the input values with database values
                 // Retrieve the edited record

                // if ($record) {
                //     $changedFields = [];

                //     foreach ($fieldMappings as $inputField => $dbField) {
                //         $inputValue = $request->input($inputField);
                //         $dbValue = $record->{$dbField};

                //         // dd($inputValue,$record->{$dbField});

                //         if ($inputValue == $dbValue) {
                //             $changedFields[$inputField] = [
                //                 'old' => $dbValue,
                //                 'new' => $inputValue,
                //             ];
                //         }
                //     }
                // }


               
                $changedFields = [];

                foreach ($fieldMappings as $inputField => $dbField) {

                    // dd($inputField,$dbField);
                    $inputValue = $request->input($inputField);
                    // $dbValue = $record->{$dbField};

                    // dd($record);
                    // dd($request->input($inputField), $dbValue);

                    // dd("Input: $inputValue, DB: $dbValue");

                    // testingbjkk

                    if($inputValue !== null){

                        $record = $modelClass::find($request->route('id'));

                        // dd($record);
                        $changedFields[$inputField] = [
                            // 'old' => null, // No old value for "add"
                            'new' => $inputValue,
                        ];
                    }
                }
            }


            // dd($changedFields);

            if (!empty($changedFields)) {
                ActivityLog::create([
                    'user_id' => auth()->id(),
                    'action' => $actionType,
                    'entity' => $module,
                    'data' => json_encode($changedFields),
                    'module_id' => $record->id,
                ]);
            }
        }

        return $response;
    }

    // public function handle($request, Closure $next)
    // {
    //     $module = $request->segment(1);
    //     $actionType = $request->segment(2);

    //     $response = $next($request);

    //     $fieldMappings = config('activity_fields.' . $module . '.' . $actionType, []);

    //     if (in_array($actionType, ['add', 'edit'], true)) {
    //         $modelName = Str::singular($module);
    //         $modelClass = 'App\Models\\' . ucfirst($modelName);

    //         $record = null; // Initialize the old record variable

    //         if ($actionType === 'edit') {
    //             // Retrieve the old record before performing the update
    //             $record = $modelClass::find($request->route('id'));
    //         }

    //         // Now, after the update, retrieve the new record
    //         $newRecord = $modelClass::find($request->route('id'));

    //         // Compare the old and new records to log changes
    //         $changedFields = [];

    //         foreach ($fieldMappings as $inputField => $dbField) {
    //             $oldValue = $record ? $record->{$dbField} : null;
    //             $newValue = $newRecord ? $newRecord->{$dbField} : null;


    //             // dd("Input: $newValue, DB: $oldValue");

    //             if ($oldValue !== $newValue) {
    //                 $changedFields[$inputField] = [
    //                     'old' => $oldValue,
    //                     'new' => $newValue,
    //                 ];
    //             }
    //         }

    //         // Log the changes if there are any
    //         if (!empty($changedFields)) {
    //             ActivityLog::create([
    //                 'user_id' => auth()->id(),
    //                 'action' => $actionType,
    //                 'entity' => $module,
    //                 'data' => json_encode($changedFields),
    //             ]);
    //         }
    //     }

    //     return $response;
    // }


    
}
