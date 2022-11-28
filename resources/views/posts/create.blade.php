@extends('default')

@section('content')

	@if($errors->any())
		<div class="alert alert-danger">
			@foreach ($errors->all() as $error)
				{{ $error }} <br>
			@endforeach
		</div>
	@endif

	{!! Form::open(['route' => 'posts.store']) !!}

		<div class="form-group">
			{{ Form::label('title', 'Title') }}
			{{ Form::text('title', null, array('class' => 'form-control')) }}
		</div>
		<div class="form-group">
			{{ Form::label('body', 'Body') }}
			{{ Form::textarea('body', null, array('class' => 'form-control')) }}
		</div>
		<div class="form-group">
			{{ Form::label('status', 'Status') }}
			{{ Form::string('status', null, array('class' => 'form-control')) }}
		</div>


		{{ Form::submit('Create', array('class' => 'btn btn-primary')) }}

	{{ Form::close() }}


@stop