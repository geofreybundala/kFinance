

@extends('layouts.app')

@section('content')

    <!-- Contact Us Section -->
    <section class="Material-contact-section section-padding section-dark">
        <div class="container">
            <div class="row">
                <!-- Section Titile -->
                <div class="col-md-12 wow animated fadeInLeft" data-wow-delay=".2s">
                    <h1 class="section-title">Love to Hear From You</h1>
                </div>
                @if ($message = Session::get('success'))

                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>

                        <p>{{ $message }}</p>

                    </div>

                @endif

            </div>
            <div class="row">
                <!-- Section Titile -->
                <div class="col-md-6 mt-3 contact-widget-section2 wow animated fadeInLeft" data-wow-delay=".2s">
                    <p class="lead">Feel free to contact us</p>

                    <div class="find-widget">
                        Company:  <p class="lead">K-Finance</p>
                    </div>
                    <div class="find-widget">
                        Location: <p class="lead">Uchumi Project House,Shekilango Road,Dar es Salaam</p>
                    </div>
                    <div class="find-widget">
                        Phone:  <p class="lead">+255 715 799 115</p>
                    </div>


                    <div class="find-widget">
                        Program: <a href="#">Mon to Sat: 08:00 AM - 4.30 PM</a>
                    </div>
                </div>
                <!-- contact form -->
                <div class="col-md-6 wow animated fadeInRight" data-wow-delay=".2s">
                    <form class="shake" action="{{url('contactUs')}}" role="form" method="post" id="contactForm" name="contact-form" data-toggle="validator">
                    {{ csrf_field() }}
                        <!-- Name -->
                        <div class="form-group label-floating">
                            <label class="control-label" for="name">Name</label>
                            <input class="form-control" id="name" type="text" name="name" required data-error="Please enter your name">
                            <div class="help-block with-errors"></div>
                        </div>
                        <!-- email -->
                        <div class="form-group label-floating">
                            <label class="control-label" for="email">Email</label>
                            <input class="form-control" id="email" type="email" name="email" required data-error="Please enter your Email">
                            <div class="help-block with-errors"></div>
                        </div>

                        <!-- phoneNo -->
                        <div class="form-group label-floating">
                            <label class="control-label" for="phone">PhoneNo</label>
                            <input class="form-control" id="phone" type="text" name="phone" required data-error="Please enter your PhoneNo">
                            <div class="help-block with-errors"></div>
                        </div>
                        <!-- Subject -->
                        <div class="form-group label-floating">
                            <label class="control-label">Subject</label>
                            <input class="form-control" id="msg_subject" type="text" name="subject" required data-error="Please enter your message subject">
                            <div class="help-block with-errors"></div>
                        </div>
                        <!-- Message -->
                        <div class="form-group label-floating">
                            <label for="message" class="control-label">Message</label>
                            <textarea class="form-control" rows="3" id="message" name="message" required data-error="Write your message"></textarea>
                            <div class="help-block with-errors"></div>
                        </div>
                        <!-- Form Submit -->
                        <div class="form-submit mt-5">
                            <button class="btn btn-common" type="submit" id="form-submit"><i class="material-icons mdi mdi-message-outline"></i> Send Message</button>
                            <div id="msgSubmit" class="h3 text-center hidden"></div>
                            <div class="clearfix"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>


@endsection

