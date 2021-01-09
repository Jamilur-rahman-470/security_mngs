@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="flex row align-item-center justify-content-center">
            <div class="card p-3" style="width: 300px">
                <p> Name: {{ $user->name }}</p>
                <p> Phone: {{ $user->phone }} </p>
                <p> Email: {{ $user->email }} </p>
                <p>Type: {{ $user->type }}</p>
                <p>Gender: {{ $user->gender }}</p>
                @if (!empty($profile) && $user->type === 'employee')
                    <p>Service Year: {{ $profile->svc_year }}</p>
                    <p>Status: {{ $profile->status }}</p>
                @endif
            </div>
            @if ($user->type === 'employee' && empty($profile))
                <div class="card p-2" style="width: 300px;">
                    <form action="{{ route('emp_profile') }}" method="POST">
                        @csrf
                        <h4>Complete Profile</h4>
                        <div class="form-group">
                            <label for="">Service Year</label>
                            <input type="text" name='svc_year' class="form-control" placeholder="service year">
                        </div>
                        <div class="form-group">
                            <label for="">Status</label>
                            <input type="text" name='status' class="form-control" placeholder="status">
                        </div>
                        <input type="submit" value="DONE" class="btn btn-primary">
                    </form>
                </div>
            @endif
            @if ($user->type === 'participator' && !empty($profile))
                <div class="card p-3">
                    <p>Branch - {{ $profile->branch }}</p>
                    <p>Education - {{ $profile->education }}</p>
                    <p>Previous Job - {{ $profile->previous_job }}</p>
                    <p>Physical Quality - {{ $profile->physical_qual }}</p>

                    @if ($profile->is_paid === '0')
                        <form action="{{ route('client_pay', ['amount' => 3500, 'type' => 'p', 'id' => 1]) }}"
                            method="post">
                            @csrf
                            <input type="submit" value="PAY APP FEE" class="btn btn-primary w-100">
                        </form>
                    @endif
                </div>
            @endif
            @if ($user->type === 'participator' && empty($profile))
                <div class="card p-2" style="width: 300px;">
                    <form action="{{ route('par-profile') }}" method="POST">
                        @csrf
                        <h4>Complete Profile</h4>
                        {{-- <div class="form-group">
                            <label for="">BRANCH</label>
                            <select name="branch" id="" class="form-control">
                                @php
                                $brn = DB::table('training_branches')->get();
                                @endphp
                                @if (!empty($brn))
                                    @foreach ($brn as $item)
                                        <option value="{{ $item->branch }}">{{ $item->branch }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div> --}}
                        <div class="form-group">
                            <label for="">Education</label>
                            <input type="text" class="form-control" name='education'>
                        </div>
                        <div class="form-group">
                            <label for="">Previous job</label>
                            <input type="text" class="form-control" name='previous_job'>
                        </div>
                        <div class="form-group">
                            <label for="">Physical Quality</label>
                            <input type="text" class="form-control" name='physical_qual'>
                        </div>
                        <input type="submit" value="DONE" class="btn btn-primary">
                    </form>
                </div>
            @endif

            @if ($user->type === 'client' && !empty($profile))
                <div class="card p-2" style="width: 300px;">
                    <p>Payment: {{ $profile->payment }}</p>
                    <p>No of employee: {{ $profile->no_of_emp }}</p>
                    <a href="{{ route('demand') }}" class="btn btn-primary w-100">Make Demand</a>
                </div>
            @endif
            @include('partials.user-actions')
            @if ($user->type === 'employee' && !empty($profile))
                <div class="card p-2">
                    @php
                    $income = DB::table('transactions')->sum('income');
                    $exp = DB::table('transactions')->sum('expenditure');
                    $profit = $income - $exp;
                    @endphp
                    <p>Income - {{ $income }}</p>
                    <p>Expenditure - {{ $exp }}</p>
                    <p>Profit - {{ $profit }}</p>
                </div>
            @endif
        </div>
        <br>
        <br>
        @if ($user->type === 'client' && !empty($profile))
            @php
            $demand = DB::table('demands')->where('c_reg_id', auth()->id())->get();
            @endphp
            @if (!empty($demand))
                <div class="row">
                    @foreach ($demand as $item)
                        <div class="col-md m-1">
                            <div class="card p-2" style="width: 300px;">
                                <p>EMP id - {{ $item->emp_reg_id }}</p>
                                <p>Amount to be paid - {{ $item->amount }}</p>
                                @if ($item->is_paid === '0')
                                    <form
                                        action="{{ route('client_pay', ['amount' => $item->amount, 'type' => 'c', 'id' => $item->id]) }}"
                                        method="POST">
                                        @csrf
                                        <input type="submit" value="Make Payment" class="btn btn-primary w-100">
                                    </form>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        @endif


    </div>
@endsection
