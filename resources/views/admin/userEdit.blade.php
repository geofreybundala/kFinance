@extends('layouts.dashboard')
@section('content')

    <div class="card">
        <div class="card-header"> <span class="fa fa-pencil fa-2x"></span> Edit <strong style="color: #227f04; font-size: 17px"> {{$user->name}}</strong> Infomation's</div>
        <div class="card-body">
            <form action="{{ route('users.update',$user->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group row">
                    <label for="name" class="col-sm-3 col-form-label">Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{$user->name}}" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-9">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{$user->email}}" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="usertype" class="col-sm-3 col-form-label">User Type(customer/worker)</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="usertype" value="{{$user->user_type}}" placeholder="User Type" required>
                    </div>
                </div>

             {{--   <div class="form-group row">
                    <label for="password" class="col-sm-3 col-form-label">Reset Password</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="password"  placeholder="User Type" required>
                    </div>

                
                </div>--}}

                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


@endsection
