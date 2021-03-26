@extends('layouts.app')
@section('content')

    <div class="container pt-5">
        <div class="row">
            <div class="col-lg-10"><h2>Details of Businesses</h2></div>
            <div class="col-lg-2">
                <a href="{{route('businesses.index')}}" class="btn btn-outline-primary"><i class="fas fa-chevron-left" ></i></a>
            </div>
        </div>
    </div>
    <br>
    <br>

    <div class="container">
        <div class="col-xs-12 col-sm-12 col-md-12">
           <div class="form-group">
               <table class="table table-responsive dataTable">
                   <tr>
                       <td> <strong>Name   :</strong></td>
                       <td> {{$business->name}}</td>
                   </tr>
                   <tr>
                       <td> <strong>Email  :</strong></td>
                       <td> {{$business->email}}</td>
                   </tr>
                   <tr>
                       <td> <strong>Phone  :</strong></td>
                       <td> {{$business->phone}}</td>
                   </tr>
                   <tr>
                       <td> <strong>Created By :</strong></td>
                       <td> {{$business->user->name}}</td>
                   </tr>

               </table>
           </div>
        </div>
    </div>
@endsection
