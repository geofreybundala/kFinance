
@extends('layouts.dashboard')
@section('content')
    <div class="card text-center">

        <div class="card-body">






            @if(!$suggestions->isEmpty())


                <table class="table table-responsive-sm table-bordered">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">phone</th>
                        <th scope="col">subject</th>
                        <th scope="col" colspan="4">message</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($suggestions as $key=>$cont)


                        <tr>
                            <th scope="row">{{($key+1)}}</th>
                            <td class="text-capitalize">{{$cont->name}}</td>
                            <td class="font-weight-bold"><div class="email"><a  href="mailto:{{$cont->email}}">{{$cont->email}}</a></div></td>
                            <td class="font-weight-bold"><div class="">{{$cont->phone}}</div></td>
                            <td class="text-capitalize">{{$cont->subject}}</td>

                            <td >
                                <p class="h6 mb-0 font-weight-normal">{{$cont->message}}</p>

                            </td>

                        </tr>

                    @endforeach


                    </tbody>

                </table>

            @else
                <div class="card">
                    <div class="card-body">

                        <div class="alert alert-info" role="alert" >
                            <i class="blacktext"> there is no any suggestion at this time <span class="fa fa-plus"></span> to add announcement</i>
                        </div>

                    </div>
                </div>

            @endif
            <div class="mt-4" style="margin-bottom: 60px">
                {{ $suggestions->links() }}
            </div>

        </div>

    </div>







@endsection