@extends('layouts.app')
@section('title', 'Edit a ticket')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-12 col-sm-10 col-lg-6 mx-auto">
			@foreach ($errors->all() as $error)
			<p class="alert alert-danger">{{$error}}</p>
			@endforeach
			@if (session('status'))
			<div class="alert alert-success">
				{{session('status')}}
			</div>
			@endif
			<form class="form-horizontal bg-white py-3 px-4 shadow rounded" action="{{route('tickets.update',$ticket)}}" method="post">
				@csrf @method('PATCH')
				<fieldset>
					<legend>EDIT TICKET</legend>
					<div class="form-group">
						<label for="title" class="control-label">Title</label>					
							<input type="text" class="form-control" id="title" name="title" value="{{$ticket->title}}">
						
					</div>
					<div class="form-group">
						<label for="content" class="control-label">Content</label>					
							<textarea class="form-control" rows="3" id="content" name="content">{{$ticket->content}}</textarea>						
					</div>
					<div class="form-group">
						<label>
						<input type="checkbox" name="status" {{$ticket->status ? "" : "checked"}}>Close this ticket?</label>
					</div>					
					<div class="form-group">
						
							<button type="submit" class="btn btn-primary btn-sm">SAVE</button>
							<a class="btn btn-secondary float-right btn-sm" href="{{route('tickets.index')}}" title="">Back</a>
						
					</div>					
				</fieldset>
			</form>
		</div>
	</div>
</div>
@endsection