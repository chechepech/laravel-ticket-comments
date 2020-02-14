@extends('layouts.app')
@section('title', 'View a ticket')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-12 col-sm-10 col-lg-6 mx-auto">
			<div class="card bg-white mb-3 shadow rounded">				
					<div class="card-header">{{$ticket->title}}</div>					
				<div class="card-body">
					<h5 class="card-title"><strong>Status</strong>:{{$ticket->status ? ' Pending':' Answered'}}</h5>
					<p class="card-text">{{$ticket->content}}</p>
				@auth
				<a href="{{route('tickets.edit', $ticket)}}" class="btn btn-primary btn-sm">EDIT</a>
				<a href="#" onclick="event.preventDefault(); document.getElementById('remove').submit();" class="btn btn-secondary btn-sm">DELETE</a>
				<form id="remove" class="m-0 p-0 d-none" method="post" action="{{route('tickets.destroy', $ticket)}}">
					@csrf @method('DELETE')
				</form>
				@endauth
				<div class="clearfix"></div>
				</div>
			</div>
			<!----------------------COMMENTS---------------------------------->
			@foreach($comments as $comment)
			<div class="card bg-white shadow mb-3">
				<div class="card-header">
    				COMMENTS: {{$comment->id}}
  				</div>
				<div class="card-body">
					<blockquote class="blockquote mb-0">
				      <p>{{$comment->content}}</p>
				      <footer class="blockquote-footer">Created at: <cite title="Source Title">{{$comment->created_at->diffForHumans()}}</cite></footer>
    			</blockquote>
				</div>
			</div>
			@endforeach
			<form class="form-horizontal bg-light py-3 px-4 shadow rounded" method="post" action="/comment">
				@csrf
				@foreach($errors->all() as $error)
				<p class="alert alert-danger">{{ $error }}</p>
				@endforeach
				@if(session('status'))
				<div class="alert alert-success">
					{{ session('status') }}
				</div>
				@endif
				<input type="hidden" class="d-none" name="ticket_id" value="{{$ticket->id}}">
				<fieldset>
					<legend>Reply:</legend>
					<div class="form-group">						
							<textarea class="form-control" rows="3" id="content" name="content"></textarea>	
					</div>
					<div class="form-group">												
							<button type="submit" class="btn btn-primary btn-sm">Comment</button>
							<a class="btn btn-secondary btn-sm float-right" href="{{route('tickets.index')}}" title="">Back</a>					
					</div>
				</fieldset>
			</form>
		</div>
	</div>
</div>
@endsection