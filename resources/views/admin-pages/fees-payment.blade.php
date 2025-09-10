@extends('layouts.admin-layout')
@section('title', 'Fees Management')
@section('bg-color', 'admin-page-bg')
@section('content')
	<h3 class="mt-3">Fees Management</h3>

	<form id="fees-payment-form" method="POST">
		@csrf
		<select name="class" id="class" class="form-control input mt-3" multiple>
			<option disabled>Select the Class</option>
			@foreach ($classList as $class)
				<option value="{{$class}}">{{$class}}</option>
			@endforeach
		</select>
		<span class="text-danger d-block" id="class-error"></span>
		<select name="section[]" id="section" class="form-control input mt-3" multiple>
			<option disabled>Select the Section</option>
			@foreach ($sectionList as $section)
				<option value="{{$section}}">{{$section}}</option>
			@endforeach
		</select>
		<span class="text-danger d-block" id="section-error"></span>
		<input type="text" id="amount" name="amount" class="form-control input mt-3" placeholder="Enter a Amount">
		<span class="text-danger d-block" id="amount-error"></span>
		<select name="email[]" id="email" class="form-control input mt-3" multiple>
			<option disabled>Select the Email</option>
		</select>
		<span class="text-danger d-block" id="email-error"></span>
		<button type="submit" name="fees_pay_submit" class="btn btn-info mt-3 text-light d-block">Submit</button>
	</form>
@endsection