@extends('layouts.dashboard')
@section('content')

    <div class="card">
        <div class="card-header"> <span class="fa fa-pencil fa-2x"></span> Edit <strong style="color: #227f04; font-size: 17px"> {{$loan->name}}</strong> Infomation's</div>
        <div class="card-body">
            <form action="{{route('Loans_management.update',$loan->id)}}" method="POST">

                @csrf
                @method('PUT')

                <div class="form-group row">
                    <label for="name" class="col-sm-3 col-form-label">Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{$loan->name}}" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-9">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{$loan->email}}" required>
                    </div>
                </div>


                <div class="form-group row">
                    <label for="email" class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Email" value="{{$loan->phone}}" required>
                    </div>
                </div>


                <div class="form-group row">
                    <label for="loan " class="col-sm-3 col-form-label">Loan</label>
                    <div class="col-sm-9">
                        <select class="form-control "  name="loan" id="loan">
                            <option ><strong>{{$loan->loan}}</strong></option>
                            <option name="loan">  Biashara</option>
                            <option name="loan">   Ajira Mali</option>
                            <option name="loan">  Executive</option>
                            <option name="loan">     Boresha Makazi</option>
                        </select>
                    </div>
                </div>


                <div class="form-group row">
                    <label for="amount" class="col-sm-3 col-form-label">Amount</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="amount" name="amount" placeholder="amount" value="{{$loan->amount}}" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="date" class="col-sm-3 col-form-label">Date</label>
                    <div class="col-sm-9">
                        <input type="date" class="form-control" name="date" id="date" value="{{$loan->date}}" placeholder="loan date"  required>
                    </div>
                </div>



                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


@endsection
