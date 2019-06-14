@extends('layouts.dashboard')
@section('content')

    <div class="card">
        <div class="card-header">View all Users  <a class="pull-right" data-toggle="modal" data-target="#add"><button class="btn btn-success">Add New <span class="fa fa-user-plus " ></span></button> </a></div>
        <div class="card-body">
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                    <p>{{ $message }}</p>

                </div>

            @endif

            @if (Session::has('message'))
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                    <p>{{ Session::get('message') }}</p>
                </div>
            @endif


            @if(!$users->isEmpty())
              {{--  <table class="table table-responsive-sm">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">User Type</th>
                        <th scope="col" colspan="2">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $key=>$user)


                        <tr>
                            <th scope="row">{{($key+1)}}</th>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->user_type}}</td>
                            <td>
                                <a href="{{Route('users.edit',$user->id) }}" class='text-success'><span class="fa fa-pencil"></span>Edit</a>

                            </td>
                            <td>
                                <form action="{{route('users.destroy',$user->id)}}" method="post" name="delete">
                                    @csrf
                                    <input name="_method" type="hidden" value="DELETE">
                                 <span class="fa fa-trash"></span> <input  type="submit" value="Delete" class='text-danger'></input>
                                    <button class="btn btn-danger btn-sm" type="submit"><span class="fa fa-trash"></span></button>
                                </form>
                            </td>

                        </tr>

                    @endforeach


                    </tbody>

                </table>--}}
                    <div class="near_by_hotel_wrapper">
                        <div class="near_by_hotel_container">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">User Type</th>
                                    <th class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $key=>$user)
                                <tr>
                                    <td>{{($key+1)}}</td>
                                    <td class="text-center">{{$user->name}}</td>
                                    <td class="text-center">{{$user->email}}</td>
                                    <td class="text-center">{{$user->user_type}}</td>
                                    <td class="" >
                                      <div style="">
                                          <a href="{{Route('users.edit',$user->id) }}" class='text-success'><span class="fa fa-pencil"></span></a>
                                          <form action="{{route('users.destroy',$user->id)}}" method="post" name="delete">
                                              @csrf
                                              <input name="_method" type="hidden" value="DELETE">
                                              <button class="btn btn-danger btn-sm" type="submit"><span class="fa fa-trash"></span></button>
                                          </form>
                                      </div>
                                    </td>


                                </tr>

                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
            @else
                <div class="card">
                    <div class="card-body">

                        <div class="alert alert-info" role="alert" >
                            <i class="blacktext"> there is no any user at this time</i>
                        </div>

                    </div>
                </div>

            @endif
            <div class="mt-4">
                <center> {{ $users->links() }}</center>
            </div>



        </div>
    </div>


    {{--   MODEL for Add  user --}}
    <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add user Here</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('users.store')}}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                            </div>
                        </div>
                        <fieldset class="form-group">
                            <div class="row">
                                <legend class="col-form-label col-sm-2 pt-0">User Type</legend>
                                <div class="col-sm-10">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="usertype" id="exampleRadios1" value="customer" checked>
                                        <label class="form-check-label" for="user">
                                            Customer
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="usertype" id="exampleRadios2" value="worker">
                                        <label class="form-check-label" for="worker">
                                            Worker
                                        </label>
                                    </div>


                                </div>
                            </div>
                        </fieldset>

                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Add member</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>


@endsection
