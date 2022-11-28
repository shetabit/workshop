@extends('default')

@section('content')

	<div class="pull-right"><a href="{{ route('posts.create') }}" class="btn btn-info">Creer</a></div>

	<table class="table table-bordered">
		<thead>
			<tr>
				<th>id</th>
				<th>title</th>
				<th>body</th>
				<th>status</th>

				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach($posts as $post)

				<tr>
					<td>{{ $post->id }}</td>
					<td>{{ $post->title }}</td>
					<td>{{ $post->body }}</td>
					<td>{{ $post->status }}</td>

					<td>
						<a href="{{ route('posts.show', [$post->id]) }}" class="btn btn-info">Voir</a>
						<a href="{{ route('posts.edit', [$post->id]) }}" class="btn btn-primary">Editer</a>
						{!! Form::open(['method' => 'DELETE','route' => ['posts.destroy', $post->id]]) !!}
			            {!! Form::submit('Supprimer', ['class' => 'btn btn-danger']) !!}
			        {!! Form::close() !!}
					</td>
				</tr>

			@endforeach
		</tbody>
	</table>

@stop