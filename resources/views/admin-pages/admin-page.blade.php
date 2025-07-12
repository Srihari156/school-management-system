@extends('layouts.admin-layout')
@section('title', 'Admin Pages')
@section('bg-color', 'admin-page-bg')
@section('content')
     <img src="{{url('images/admin-image-front.jpg')}}" alt="" class="front-image">
        @foreach ($name as $admin)
            <h1 class="text-center mt-3 text-decoration-underline">Welcome to {{ $admin->username ??'Admin name'}}</h1>
        @endforeach
        
        <div class="admin-content">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut iure veritatis pariatur repellat, quod, enim,
            alias autem placeat deserunt laboriosam dicta saepe sit consectetur iste accusamus reprehenderit id
            quibusdam quasi!
        </div>
        <div class="d-flex mt-5">
            <div class="box d-flex me-4">
                <div class="flex-column">
                    <div>
                        Total no of Students
                    </div>
                    <div class="display-6">
                        100
                    </div> 
                </div>
                <div>
                    <img src="{{url('images/icons8-student-96.png')}}" alt="" class="logo-icon">
                </div>
            </div>
            <div class="box d-flex">
                <div class="flex-column">
                    <div>
                        Total no of Teachers
                    </div>
                    <div class="display-6">
                        30
                    </div> 
                </div>
                <div>
                    <img src="{{url('images/icons8-teacher-96.png')}}" alt="" class="logo-icon">
                </div>
            </div>
        </div>
@endsection