@extends('layouts.app')
@section('content')

    <div class="container pt-5">
        <div class="row">
            <div class="col-lg-10"><h2>Edit Business Details</h2></div>
            <div class="col-lg-2">
                <a href="{{route('businesses.index')}}" class="btn btn-outline-primary"><i class="fas fa-chevron-left" ></i></a>
            </div>
        </div>
    </div>
    <br>
    <br>
    <div class="container">
        <form action="{{route('businesses.update',$business->id)}}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" name="name" value="{{$business->name}}" placeholder="Enter name" id="name">
                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" class="form-control" name="email" value="{{$business->email}}" placeholder="Enter Email" id="email">
                @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" class="form-control" name="address" value="{{$business->address}}" placeholder="Enter Address" id="address">
                @error('address')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="phone" class="form-control" name="phone" value="{{$business->phone}}" placeholder="Enter Phone" id="phone">
                @error('phone')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection

