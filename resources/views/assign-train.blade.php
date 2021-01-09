@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="" class="card p-3" style="width: 400px" method="POST">
            @csrf
            <div class="form-group">
                <label for="">Employee</label>
                <select name="reg_id" id="" class="form-control">
                    @php
                    $user = DB::table('users')->where('id', '!=', auth()->id())->where('type', '=', 'participator')->get();
                    @endphp
                    @foreach ($user as $item)
                        <option value="{{ $item->id }}">{{ $item->name }} - {{ $item->email }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="">BRANCH</label>
                <select name="branch" id="" class="form-control">
                    @php
                    $branch = DB::table('training_branches')->get();
                    @endphp
                    @foreach ($branch as $item)
                        <option value="{{ $item->id }}">{{ $item->branch }}</option>
                    @endforeach
                </select>
            </div>
            <input type="submit" value="ASSIGN" class="btn btn-primary w-100">
        </form>
    </div>
@endsection
