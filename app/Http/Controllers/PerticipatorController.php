<?php

namespace App\Http\Controllers;

use App\Models\Perticipator;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PerticipatorController extends Controller
{
    //
    public function store()
    {
        # code...
        $perr = new Perticipator;
        $perr->reg_id = auth()->id();
        $perr->serial_no = Str::uuid();
        $perr->app_fee = 2500;
        $perr->branch = request('branch');
        $perr->education = request('education');
        $perr->previous_job = request('previous_job');
        $perr->physical_qual = request('physical_qual');
        $perr->save();
        
        return redirect()->route('home');
    }
}
