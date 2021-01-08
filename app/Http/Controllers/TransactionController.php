<?php

namespace App\Http\Controllers;

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
        }

        if (request('type') === 'p') {
            $tran = new Transaction;
            $tran->income = request('amount');
            $tran->expenditure = 0;
            $tran->profit = request('amount');
            $tran->reg_id = auth()->id();
            $tran->save();
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
