<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DialogflowController extends Controller
{
    public static function index(Request $request) : string
    {
        return $request->queryResult["queryText"];
    }
}
