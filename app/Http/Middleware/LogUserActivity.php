<?php

namespace App\Http\Middleware;

use App\Models\ActivityLog;
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
    public function handle($request, Closure $next)
    {

        // dd($request->segment(2));


        // if (!empty($request->all())) {

        $module = $request->segment(1);
        $actionType = $request->segment(2);
        $response = $next($request);

        // Get the field configurations from the configuration
        // $fieldConfigurations = config('activity_fields.' . $module . '.' . $actionType, []);
        // // $fieldConfigurations = config('activity_fields');

        // dd($fieldConfigurations);


        // Fetch input data for the specified fields
        // $fieldData = [];
        // foreach ($fieldConfigurations as $fieldName) {
        //     $fieldData[$fieldName] = $request->input($fieldName);

        //     dd($fieldName, $fieldData);

        // }

        if (!empty($request->all())) {
            // Log the activity
            ActivityLog::create([
                'user_id' => auth()->id(),
                'action' => $actionType,
                'entity' => $module,
                'data' => json_encode($request->all()),  // Serialize data as JSON
            ]);
        }

        return $response;
        // }
    }

    // public function handle($request, Closure $next)
    // {
    //     $module = $request->segment(1); // Get the first URL segment as the 'module'
    //     $actionType = $request->route('action'); // Get the 'action' parameter

    //     $response = $next($request);

    //     // Get the field configurations from the configuration
    //     $fieldConfigurations = config('activity_fields.' . $module . '.' . $actionType, []);

    //     // Capture the record if it's an 'add' or 'update' action
    //     if (in_array($actionType, ['add', 'update'], true)) {
    //         $modelName = Str::singular($module); // Convert module name to singular
    //         $modelClass = 'App\Models\\' . ucfirst($modelName); // Define model class
    //         $record = $modelClass::latest()->first(); // Capture newly added/updated record

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


    //         dd($changedFields);

    //         // Create the activity log entry
    //         ActivityLog::create([
    //             'user_id' => auth()->id(),
    //             'action' => $actionType,
    //             'entity' => $module,
    //             'data' => json_encode($changedFields), // Serialize the changed fields
    //         ]);
    //     } elseif ($actionType === 'delete') {
    //         // Handle delete action here
    //         // Log the activity for delete action
    //     }

    //     return $response;
    // }
}
