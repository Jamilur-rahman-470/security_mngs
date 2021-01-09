@extends('layouts.app')

@section('content')
    @php
    $prr = DB::table('users')->where('type', 'participator')->get();
    @endphp
    <div class="container">
        <div class="row">

            @foreach ($prr as $item)
                @php
                $profile = DB::table('perticipators')->where('reg_id', $item->id)->first();
                @endphp
                <div class="col-md">
                    <div class="card p-3">
                        <p>Name - {{ $item->name }}</p>
                        <p>Email - {{ $item->email }}</p>
                        <p>Education - {{ $profile->education }}</p>
                        <p>Previous Job - {{ $profile->previous_job }}</p>
                        <p>Physical Quality - {{ $profile->physical_qual }}</p>
                        <p>Branch - {{$profile->branch}}</p>
                        <form action="{{ route('demand_post') }}" style="width: 400px" method="POST">
                            @csrf
                            <div class="form-group">
                                <input type="hidden" name="emp_id" value={{ $item->id }}>
                            </div>
                            <input type="submit" value="REQUEST" class="btn btn-primary w-100">
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
