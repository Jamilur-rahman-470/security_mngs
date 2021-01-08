@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('salary_pay') }}" method="post" style="width: 500px">
            @csrf
            <div class="form-group">
                <label for="">Employee</label>
                <select name="id" id="" class="form-control">
                    @php
                    $users = DB::table('users')->where('type', '=', 'employee')->orWhere('type', '=',
                    'participator')->get();
                    @endphp
                    @foreach ($users as $item)
                        <option value="{{ $item->id }}">{{ $item->name }} - {{ $item->email }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <lable>Amount</lable>
                <input type="number" name='amount' class="form-control"></input>
            </div>
            <input type="submit" value="PAY" class="btn btn-primary w-100">
        </form>
    </div>
@endsection
