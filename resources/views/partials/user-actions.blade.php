@if ($user->type === 'employee')
    <div class="card p-2" style="width: 300px">
        <a href="{{ route('create_branch') }}" class="btn btn-primary w-100">Create Training Branch</a>
        <br>
        <a href="{{ route('assign_train') }}" class="btn btn-primary w-100">Assign Training</a>
        <br>
        <a href="{{ route('salary') }}" class="btn btn-primary w-100">Give Salary</a>
        <br>
        <a href="{{ route('demands') }}" class="btn btn-primary w-100">Handle Demand</a>
    </div>
@endif
