@extends('layouts.app')
@section('content')
    <div class="container pt-5">
        <div class="row">
            <div class="col-lg-10"><h2>Users</h2></div>
        </div>
    </div>
    <div class="container">
        <table class="table table-bordered text-center m-auto" id="myTable">
            <thead>
            <tr>
                <th>Sr No.</th>
                <th>Name</th>
                <th>Email</th>
            </tr>
            </thead>
            <tbody>
                @php $i = 1; @endphp
                @foreach($users as $user)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
