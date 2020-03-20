@extends('layouts.app')
@section('templates_title')
	Edit Data
@endsection

@section('content')
	<section class="content container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card card-default">
					<div class="card-header">
						<span class="card-title"><h2>Edit Data</h2></span>
					</div>
					<div class="card-body">
						@foreach($data as $d)
						<form method="POST" action="{{ route('Crud.update', $d->id) }}" role="form" enctype="multipart/form-data">
							{{ method_field('PUT') }}
							{{ csrf_field() }}
							<div class="form-group">
								<label for="id">ID</label>
								<input type="text" id="id" class="form-control" disabled="" name="id" value="{{ $d->id }}">
							</div>
							<div class="form-group">
								<label for="title">Title</label>
								<input type="text" id="title" class="form-control" name="title" required="required" value="{{ $d->title }}">
							</div>
							<div class="form-group">
								<label for="slug">Slug</label>
								<input type="text" id="slug" class="form-control" name="slug" required="required" value="{{ $d->slug }}">
							</div>
							<div class="form-group">
								<label for="img">Image</label>
								<div class="form-group">
									<img width="150px" src="{{ url('/image/'.$d->image) }}" style="padding-bottom: 5px;">
									<input type="file" id="img" class="form-control" name="image" required="required" value="{{ url('/image/'.$d->image) }}">
								</div>
							</div>
							<div class="form-group">
								<label for="content">Content</label>
								<textarea id="content" class="form-control" name="content" required="required">{{ $d->content }}</textarea>
							</div>
							<div class="form-group">
								<label for="view">View Count</label>
								<input type="text" id="view" class="form-control" name="view_count" required="required" value="{{ $d->view_count }}">
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-success form-control">SIMPAN</button>
							</div>
							<div class="form-group">
								<a href="{{ route('Crud.index') }}" class="btn btn-danger form-control">BATAL</a>
							</div>
						</form>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection