@extends('layouts.app')

@section('content')
    <form action="{{route('create_branch_post')}}" method="POST" style="width: 400px" class="card p-3">
        @csrf
        <div class="form-group">
            <lable>Branch</lable>
            <input type="text" name='branch' class="form-control" required>
        </div>
        <div class="form-group">
            <lable>Shift</lable>
            <input type="text" name='shift' class="form-control" required>
        </div>
        <div class="form-group">
            <lable>Cycle</lable>
            <input type="text" name='cycle' class="form-control">
        </div>
        <input type="submit" value="Create" class="btn btn-primary w-100">
    </form>
@endsection
