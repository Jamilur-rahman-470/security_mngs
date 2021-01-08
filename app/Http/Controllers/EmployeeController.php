<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    //
    public function store(Request $request)
    {
        # code...
        $emp = new Employee;
        $emp->reg_id = auth()->id();
        $emp->svc_year = request('svc_year');
        $emp->status = request('status');
        $emp->save();
        return redirect()->route('home');
    }
}
