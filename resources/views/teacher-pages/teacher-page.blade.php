@extends('layouts.teacher-layout')
@section('title','Teacher Page')
@section('bg-color','teacher-page-bg')
@section('content')
     <img src="{{url('images/6.webp')}}" alt="" class="front-image">
        <h1 class="text-center mt-3 text-decoration-underline">Welcome to {{$teacher->name }}</h1>
        <div class="admin-content">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut iure veritatis pariatur repellat, quod, enim,
            alias autem placeat deserunt laboriosam dicta saepe sit consectetur iste accusamus reprehenderit id
            quibusdam quasi!
        </div>
@endsection