@extends('layouts.front')
@section('content')
	<div class="container">
		<h1>Contact Us</h1>

		@if(Session::has('message'))
			<div class="alert alert-success alert-dismissable">
				<a href="#" class="close" data-dismiss="alert">&times;</a>
				{{ Session('message') }}
			</div>
		@endif
		<div class="alert alert-success" role="alert" id="successMsg" style="display: none" >
		  Thank you for getting in touch! 
		</div>

		@if($errors->any())
			@foreach($errors->all() as $err)
				<li style="color: red;">{{ $err }}</li>
			@endforeach
		@endif
		
		<form id="SubmitForm">
			<div class="form-group">
                <label for="name">Name <span style="color: red;">*</span></label>
                <input type="text" id="name" name="name" class="form-control" value="" required>
                <span class="text-danger" id="nameErrorMsg"></span>
            </div>
            
            <div class="form-group">
                <label for="name">Email <span style="color: red;">*</span></label>
                <input type="text" id="email" name="email" class="form-control" value="">
                <span class="text-danger" id="emailErrorMsg"></span>
            </div>
            <div class="form-group">
                <label for="gender">Gender <span style="color: red;">*</span></label>
                <select name="gender_id" id="gender" class="form-control">
                	@foreach($genders as $gender)
                        <option value="{{ $gender->val }}">{{ $gender->name }}</option>
                    @endforeach
                    {{-- <option value="m">Male</option>
                    <option value="f">Female</option> --}}
                </select>
                <span class="text-danger" id="genderErrorMsg"></span>
            </div>
            <div class="form-group">
                <label for="content">Content <span style="color: red;">*</span></label>
                <textarea id="content" name="content" class="form-control" rows="6"></textarea>
                <span class="text-danger" id="contentErrorMsg"></span>
            </div>
		<button id="submitButton" type="submit">Submit</button>

		</form>
	</div>
@endsection