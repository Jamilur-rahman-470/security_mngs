<?php

namespace App\Http\Controllers;

use App\Models\Perticipator;
use App\Models\Training;
use App\Models\TrainingBranch;
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

        $perr = Perticipator::where('reg_id', request('reg_id'))->first();
        $brr = TrainingBranch::where('id', request('branch'))->first();

        $perr->branch = $brr->branch;
        $perr->save();

        
        return redirect()->route('home');
    }
}
