@extends('user.layout.app')
@section('title','| Contact')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{url('')}}/public/frontend/styles/contact_styles.css">
    <link rel="stylesheet" type="text/css" href="{{url('')}}/public/frontend/styles/contact_responsive.css">
@endsection
@section('content')
    <!-- Contact Info -->

    <div class="contact_info">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="contact_info_container d-flex flex-lg-row flex-column justify-content-between align-items-between">

                        <!-- Contact Item -->
                        <div class="contact_info_item d-flex flex-row align-items-center justify-content-start">
                            <div class="contact_info_image"><img src="{{url('')}}/public/frontend/images/contact_1.png" alt=""></div>
                            <div class="contact_info_content">
                                <div class="contact_info_title">Phone</div>
                                <div class="contact_info_text">
                                    <a  style="text-decoration: none; color:inherit;font-size: 14px;"
                                           href="tel:{{$setting->mobile_1}}">{{$setting->mobile_1}}</a>
                                </div>
                            </div>
                        </div>

                        <!-- Contact Item -->
                        <div class="contact_info_item d-flex flex-row align-items-center justify-content-start">
                            <div class="contact_info_image"><img src="{{url('')}}/public/frontend/images/contact_2.png" alt=""></div>
                            <div class="contact_info_content">
                                <div class="contact_info_title">Email</div>
                                <div class="contact_info_text">
                                    <a class="contact_info_text" style="text-decoration: none; color:inherit;font-size: 14px;" href="mailto:{{$setting->email}}">{{$setting->email}}</a>
                                </div>
                            </div>
                        </div>

                        <!-- Contact Item -->
                        <div class="contact_info_item d-flex flex-row align-items-center justify-content-start">
                            <div class="contact_info_image"><img src="{{url('')}}/public/frontend/images/contact_3.png" alt=""></div>
                            <div class="contact_info_content">
                                <div class="contact_info_title">Address</div>
                                <div class="contact_info_text">{!! $setting->address !!}</div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Contact Form -->

    <div class="contact_form">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="contact_form_container">
                        <div class="contact_form_title">Get in Touch</div>

                        <form action="#" id="contact_form">
                            <div class="contact_form_inputs d-flex flex-md-row flex-column justify-content-between align-items-between">
                                <input type="text" id="contact_form_name" class="contact_form_name input_field" placeholder="Your name" required="required" data-error="Name is required.">
                                <input type="text" id="contact_form_email" class="contact_form_email input_field" placeholder="Your email" required="required" data-error="Email is required.">
                                <input type="text" id="contact_form_phone" class="contact_form_phone input_field" placeholder="Your phone number">
                            </div>
                            <div class="contact_form_text">
                                <textarea id="contact_form_message" class="text_field contact_form_message" name="message" rows="4" placeholder="Message" required="required" data-error="Please, write us a message."></textarea>
                            </div>
                            <div class="contact_form_button">
                                <button type="submit" class="button contact_submit_button">Send Message</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <div class="panel"></div>
    </div>

    <!-- Map -->

    <div class="contact_map">
        <div id="google_map" class="google_map">
            <div class="map_container">
                <div id="map">
                    {!! $setting->map !!}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{url('')}}/public/frontend/js/contact_custom.js"></script>
@endsection