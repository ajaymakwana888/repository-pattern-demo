@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-10">
                <h2>Businesses</h2>
            </div>
            <div class="col-lg-2 ">
                <a href="{{route('businesses.create')}}" class="btn btn-success"><i class="fas fa-plus-circle" ></i></a>
            </div>
        </div>
    </div>

    @if($msg = Session::get('success'))
        <div class="alert alert-success">
           {{$msg}}
        </div>
    @endif

    <div class="container pt-3">
        <table class="table table-bordered dataTable">
            <tr>
                <th>Sr No.</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Created By</th>
                <th width="200px">Actions</th>
            </tr>
            @php $i = 1; @endphp
            @foreach($businesses as $business)
                <tr id="business{{$business->id}}">
                    <td>{{$i++}}</td>
                    <td>{{$business->name}}</td>
                    <td>{{$business->email}}</td>
                    <td>{{$business->phone}}</td>
                    <td>{{$business->user->name}}</td>
                    <td>
                        <a href="{{route('businesses.show',  $business->id)}}" class="btn btn-outline-info"><i class="fas fa-eye"></i></a>
                        <a href="{{route('businesses.edit',  $business->id)}}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                        <button type="submit" class="btn btn-outline-danger deleteBusiness" data-id="{{$business->id}}" ><i class="fas fa-trash-alt"></i></button>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection

@section('scripts')
    <script>
         $.ajaxSetup({
             headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             }
         });
        let deleteBusinessUrl = "{{ route('businesses.index') }}";

        $(".deleteBusiness").click(function(){
            $.noConflict();
            var id = $('.deleteBusiness').attr('data-id');
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "delete",
                        url: deleteBusinessUrl + "/" + id,
                        success: function () {
                            $('#business' + id).remove();
                            if (result.isConfirmed) {
                                Swal.fire(
                                    'Deleted!',
                                    'Your record has been deleted.',
                                    'success'
                                )
                            }
                        }
                    });
                }
            })
        });
    </script>
@endsection
