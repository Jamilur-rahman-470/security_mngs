<?php

namespace App\Http\Controllers;

use App\Models\TrainingBranch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TrainBranchController extends Controller
{
    //
    public function index(Request $request)
    {
        # code...
        return view('create-branch');
    }
    public function store()
    {
        # code...
        $branch = new TrainingBranch;
        $branch->branch = request('branch');
        $branch->shift = request('shift');
        $branch->cycle = request('cycle');
        $branch->save();

        return redirect()->route('home');
    }
}
