<?php

namespace App\Http\Controllers;

use App\Models\Training;
use Illuminate\Http\Request;

class TrainController extends Controller
{
    //
    public function index()
    {
        # code...
        return view('assign-train');
    }

    public function store()
    {
        # code...
        $train = new Training;
        $train->branch = request('branch');
        $train->reg_id = request('reg_id');
        return redirect()->route('home');
    }
}
