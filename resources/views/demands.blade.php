@extends('layouts.app')

@section('content')
    <br>
    <br>
    @if (!empty($demands))
        <table class="table container" style="width: 500px">
            <thead>
                <tr>
                    <th>Participator ID</th>
                    <th>Client ID</th>
                    <th>Payment Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($demands as $item)
                    <tr>
                        <td>{{ $item->emp_reg_id }}</td>
                        <td>{{ $item->c_reg_id }}</td>
                        @if ($item->is_paid === '1')
                            <td>
                                <div class="badge badge-success">
                                    Paid
                                </div>
                            </td>
                        @else
                            <td>
                                <div class="badge badge-danger">
                                    Not paid
                                </div>
                            </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
