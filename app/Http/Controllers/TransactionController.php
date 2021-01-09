<?php

namespace App\Http\Controllers;

use App\Models\Demand;
use App\Models\Perticipator;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    //

    public function store()
    {
        # code...
        if (request('type') === 'c') {
            $tran = new Transaction;
            $tran->income = request('amount');
            $tran->expenditure = 0;
            $tran->profit = request('amount');
            $tran->reg_id = auth()->id();
            $tran->save();

            $demand = Demand::where('id', request('id'))->first();
            $demand->is_paid = 1;
            $demand->save();
        }

        if (request('type') === 'p') {
            $tran = new Transaction;
            $tran->income = request('amount');
            $tran->expenditure = 0;
            $tran->profit = request('amount');
            $tran->reg_id = auth()->id();
            $tran->save();

            $prr = Perticipator::where('reg_id', auth()->id())->first();
            $prr->is_paid = 1;
            $prr->save();
        }

        return redirect()->route('home');
    }

    public function pay_salary()
    {
        # code...
        $tran = new Transaction;
        $tran->income = 0;
        $tran->expenditure = request('amount');
        $tran->profit = 0 - request('amount');
        $tran->emp_id = request('id');
        $tran->reg_id = auth()->id();
        $tran->save();
        return redirect()->route('home');
    }
}
