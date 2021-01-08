@extends('layouts.app')

@section('content')
    <br>
    <br>
    @if (!empty($demands))
        <table class="table container" style="width: 500px">
            <thead>
                <tr>
                    <th>Employee ID</th>
                    <th>Client ID</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($demands as $item)
                    <tr>
                        <td>{{ $item->emp_reg_id }}</td>
                        <td>{{ $item->c_reg_id }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
