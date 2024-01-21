<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function getLocations(Request $request)
    {
        $data = [
            'districts' => Location::pluck('district')->unique()->toArray(),
            'upazilas' => Location::pluck('upazila')->unique()->toArray(),
            'villages' => Location::pluck('village')->unique()->toArray(),
        ];

        return response()->json($data);
    }

    public function getUpazilas(Request $request)
    {
       // dd($request->all());
        $request->validate([
            'district' => 'required|string',
        ]);

        $district = $request->input('district');
        $upazilas = Location::where('district', $district)->pluck('upazila')->unique()->toArray();

        $data = [
            'upazilas' => $upazilas,
        ];

        return response()->json($data);
    }
    
    // public function getLocations(Request $request)
    // {
    //     $district = $request->input('district');

    //     $upazilas = Location::where('district', $district)->pluck('upazila')->unique()->toArray();
    //     $villages = Location::where('district', $district)->pluck('village')->unique()->toArray();

    //     $data = [
    //         'upazilas' => $upazilas,
    //         'villages' => $villages,
    //     ];

    //     return response()->json($data);
    // }
}

