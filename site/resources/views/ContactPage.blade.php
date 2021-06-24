
@extends('Layout.app')
@section('title','Contact Page')

@section('content')

    <div class="container-fluid jumbotron  ">
        <div class="row d-flex justify-content-center">
            <div class="col-md-6  text-center">

                <h1 class="page-top-title mt-3">- Contacts -</h1>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-white jumbotron ">
        <div class="row">

            <div class="col-md-6">
                <iframe class="mapCss" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.8058072587846!2d90.38214561445592!3d23.754303394545243!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8a586b2bf21%3A0x83248c9ddb0dca50!2s52%20W%20Raza%20Bazar%20Rd%2C%20Dhaka%201215!5e0!3m2!1sen!2sbd!4v1624565916201!5m2!1sen!2sbd" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

            </div>


            <div class="col-md-6">
                <h3 class="service-card-title text-center">Contact</h3>
                <hr>
                <p class="footer-text"><i class="fas fa-map-marker-alt"></i> শেখেরটেক ৮ মোহাম্মদপুর, ঢাকা  <i class="fas ml-3 fa-phone"></i> ০১৭৮৫৩৮৮৯১৯  <i class="fas ml-3 fa-envelope"></i> Rabbil@Yahoo.com</p>

                <div class="form-group " id="contactForm">
                    <input id="ContactNameID" type="text" class="form-control w-100" placeholder="আপনার নাম">
                </div>
                <div class="form-group">
                    <input id="ContactMobileID" type="text" class="form-control  w-100" placeholder="মোবাইল নং ">
                </div>
                <div class="form-group">
                    <input id="ContactEmailID" type="text" class="form-control  w-100" placeholder="ইমেইল ">
                </div>
                <div class="form-group ">
                    <input id="ContactMsgID" type="text" class="form-control  w-100" placeholder="মেসেজ ">
                </div>
                <button id="ContactSendBtnID" class="btn mt-5 btn-block normal-btn w-100">পাঠিয়ে দিন </button>
            </div>

            </div>

    </div>





@endsection
