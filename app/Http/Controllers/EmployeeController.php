<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmployeeInfo;

class EmployeeController extends Controller
{
    public function addEmployee(Request $request)
    {
       $request->validate([
            'name' => ['required', 'string', 'regex:/^[a-zA-Z ]+$/'],
            'email' => ['required', 'email'],
            'number' => ['required', 'numeric'],
            'address' => ['required', 'string'],
            'dob' => ['required', 'date_format:Y-m-d'],
        ]);

            EmployeeInfo::create([
                'name' => $request->name,
                'email' => $request->email,
                'number' => $request->number,
                'address' => $request->address,
                'dob' => $request->dob,
            ]);

        return redirect()->route('home')->with('success', 'Employee information added successfully.');
    }
}
