@extends('layouts.app')

@section('content')
    <form action="{{route('demand_post')}}" style="width: 400px" class="card p-3" method="POST">
        @csrf
        <div class="form-group">
            <label for="">Employee</label>
            <select name="emp_id" id="" class="form-control">
                @php
                $em = DB::table('users')->where('type', '=', 'participator')->get();
                @endphp
                @foreach ($em as $item)
                    <option value="{{ $item->id }}">{{ $item->name }} - {{ $item->email }}</option>
                @endforeach
            </select>
        </div>
        <input type="submit" value="REQUEST" class="btn btn-primary w-100">
    </form>
@endsection
