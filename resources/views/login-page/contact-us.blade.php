@extends('layouts.login-layout')
@section('title', 'Contact us Page')
@section('bg-color', 'login-page-bg')
@section('content')
     <div class="container mt-5">
        <div class="parent">
            <div>
                <img src="{{url('images/contact-us-scaled-1-2048x960.jpg')}}" alt="" class="contact-image">
            </div>
            <div class="form ">
                <h3 class="text-info text-center">Contact Us</h3>
                <ul class="list-styled">
                    <li class="text-info">
                        <i class="bi bi-telephone"></i> +91 1234567890
                    </li>
                    <li class="text-info">
                        <i class="bi bi-envelope"></i> nkschool@gmail.com
                    </li>
                    <li class="text-info">
                        <i class="bi bi-geo-alt-fill"></i> Gandhi Nagar, Coimbatore
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection