<?php

namespace App\Http\Controllers;

use App\Models\Demand;
use Illuminate\Http\Request;

class DemandController extends Controller
{
    //
    public function index()
    {
        # code...
        return view('make-demand');
    }
    public function views()
    {
        # code...
        $demand = Demand::get();
        return view('demands', ['demands' => $demand]);
    }

    public function store()
    {
        # code...
        $demand = new Demand;
        $demand->emp_reg_id = request('emp_id');
        $demand->c_reg_id = auth()->id();
        $demand->amount = 3500;
        $demand->save();
        
        return redirect()->route('home');
    }
}
