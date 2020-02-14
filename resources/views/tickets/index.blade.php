@extends('layouts.app')
@section('title', 'View all tickets')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-12 col-sm-10 col-lg-6 mx-auto">
			@if (session('status'))
			<div class="alert alert-success">
				{{session('status')}}
			</div>
			@endif
			<div class="panel panel-default">
				<div class="panel-heading">
					<h2> TICKETS @auth<a href="{{route('tickets.create')}}" class="btn btn-primary btn-sm float-right" title="">NEW</a>@endauth</h2>
				</div>
				@if ($tickets->isEmpty())
				<p class="lead"> There is no ticket!</p>				
				@else
				<table class="table">
					<thead>
						<tr>
							<th>ID</th>
							<th>Title</th>
							<th>Status</th>
						</tr>
					</thead>
					<tbody>
						@foreach($tickets as $ticket)
						<tr>
							<td>{{$ticket->id}}</td>
							<td><a class="btn btn-link" href="{{route('tickets.show',$ticket)}}" title="">{{$ticket->title}}</a></td>
							<td>{{$ticket->status ? 'Pending' : 'Answered'}}</td>
						</tr>
						@endforeach
					</tbody>
				</table>
				@endif
			</div>
		</div>
	</div>
</div>
@endsection