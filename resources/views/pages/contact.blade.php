@extends('layouts.app')
@section('content')

    <div class="hs_page_title">
        <div class="container">
            <h3>Contact us</h3>
            <ul>
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="about.html">contact</a></li>
            </ul>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="hs_contact_head_text">
                    <h4 class="hs_contact_heading">Get in touch with us</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                        magna aliqua. </br>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                        commodo consequat.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-md-7 col-sm-7">
                <h4 class="hs_heading">Leave a Message</h4>
                <div class="hs_comment_form">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="input-group"> <span class="input-group-btn">
              <button class="btn btn-success" type="button"><i class="fa fa-user"></i></button>
              </span>
                                <input id="uname" type="text" class="form-control" placeholder="Full Name">
                            </div>
                            <!-- /input-group -->
                        </div>
                        <!-- /.col-lg-6 -->
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="input-group"> <span class="input-group-btn">
              <button class="btn btn-success" type="button"><i class="fa fa-envelope"></i></button>
              </span>
                                <input id="uemail" type="text" class="form-control" placeholder="Email">
                            </div>
                            <!-- /input-group -->
                        </div>
                        <!-- /.col-lg-6 -->
                        <div class="col-lg-12">
                            <div class="form-group">
                                <textarea id="message" class="form-control" rows="8"></textarea>
                            </div>
                            <!-- /input-group -->
                        </div>
                        <p id="err"></p>
                        <div class="form-group">
                            <div class="col-lg-8 col-md-8 col-sm-12">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" id="hs_checkbox" class="css-checkbox lrg" checked="checked"/>
                                        <label for="hs_checkbox" name="checkbox69_lbl" class="css-label lrg hs_checkbox">Receive Your Comments By Email</label>
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <button id="em_sub" class="btn btn-success pull-right" type="submit">Send</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-5 col-sm-5">
                <h4 class="hs_heading">Contact</h4>
                <div class="hs_contact">
                    <ul>
                        <li> <i class="fa fa-map-marker"></i>
                            <p>Langside Campuse, 50 Prospecthill Road, Glasgow, G42 9LB</p>
                        </li>
                        <li> <i class="fa fa-phone"></i>
                            <p>+44 141 272 9000</p>

                        </li>
                        <li> <i class="fa fa-envelope"></i>
                            <p><a href="Mailto:info@glasgowclyde.ac.uk">info@glasgowclyde.ac.uk</a></p>

                        </li>
                    </ul>
                </div>
                <div class="hs_contact_social">
                    <div class="hs_profile_social">
                        <ul>
                            <li><a href=""><i class="fa fa-facebook"></i></a></li>
                            <li><a href=""><i class="fa fa-twitter"></i></a></li>
                            <li><a href=""><i class="fa fa-linkedin"></i></a></li>
                            <li><a href=""><i class="fa fa-skype"></i></a></li>
                            <li><a href=""><i class="fa fa-youtube"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="hs_contact_head_text">
                    <h4 class="hs_contact_heading">Additional Support Resource</h4>
                    <p>Suspendisse ultrices sapien sit amet accumsan pharetra. Phasellus nec turpis neque. </br>Sed tortor lacus, eleifend vitae eros at, fermentum pellentesque leo.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <div class="hs_additional_support">
                        <h4>Manuals</h4>
                        <p>venenatis, id pharetra ante luctus. Ae lacinia blandit tellus, eu  dignissim rhoncus. Nam volutpat eu neque ac, mollis dictuml. </p>
                        <a href="" class="btn btn-default">Read More</a> </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <div class="hs_additional_support">
                        <h4>Manuals</h4>
                        <p>venenatis, id pharetra ante luctus. Ae lacinia blandit tellus, eu  dignissim rhoncus. Nam volutpat eu neque ac, mollis dictuml. </p>
                        <a href="" class="btn btn-default">Read More</a> </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <div class="hs_additional_support">
                        <h4>Manuals</h4>
                        <p>venenatis, id pharetra ante luctus. Ae lacinia blandit tellus, eu  dignissim rhoncus. Nam volutpat eu neque ac, mollis dictuml. </p>
                        <a href="" class="btn btn-default">Read More</a> </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    <iframe class="google-map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2241.089368880507!2d-4.265380148555226!3d55.8264080936849!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x488846fac7512f97%3A0x97841ecc6b9f0395!2sGlasgow%20Clyde%20College%20-%20Langside%20Campus!5e0!3m2!1sen!2suk!4v1602443746467!5m2!1sen!2suk"
            width="100%" height="500" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false"
            tabindex="0"></iframe>
@endsection
