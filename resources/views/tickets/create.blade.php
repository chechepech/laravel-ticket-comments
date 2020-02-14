@extends('layouts.app')
@section('title', 'Create a new ticket')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-12 col-sm-10 col-lg-6 mx-auto">
			<!--show errors-->
			@foreach ($errors->all() as $error)
			<p class="alert alert-danger">{{ $error }}</p>
			@endforeach
			<!--end show errors-->
			<!--show status messages-->
			@if(session('status'))
			<div class="alert alert-success">
				{{ session('status') }}
			</div>
			@endif
			<!--end show status messages-->			
			<form class="form-horizontal bg-white py-3 px-4 shadow rounded" action="{{route('tickets.store')}}" method="post" accept-charset="utf-8">
				@csrf
				<fieldset>
					<legend>Register a new ticket</legend>
					<div class="form-group">
						<label for="title" class="control-label">Title:</label>
						
							<input type="text" class="form-control" id="title" name="title" placeholder="Enter a title">
					
					</div>
					<div class="form-group">
						<label for="content" class="control-label">Content:</label>
						
							<textarea class="form-control" rows="3" id="content" name="content" placeholder="Typing some..."></textarea>
							<span class="help-block">Feel free to ask us any question.</span>
						
					</div>
					<div class="form-group">						
							<button type="submit" class="btn btn-primary">Save</button>
							<a class="btn btn-secondary float-right" href="{{route('tickets.index')}}" title="">Cancel</a>					
					</div>
				</fieldset>
			</form>				
		</div>
	</div>
</div>
@endsection