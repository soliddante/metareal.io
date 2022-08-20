<?php

namespace App\Http\Controllers;

use App\Models\Land;
use Illuminate\Http\Request;

class ApiController extends Controller
{

    public function land_get_object(Request $request)
    {
        $land = Land::find($request->land_id);
        $land->timestamps = false;

        $land->save;
        return $land;
    }
}
