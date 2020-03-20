@extends('layouts.app')
@section('templates_title')
	Create Data
@endsection

@section('content')
	<section class="content container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card card-default">
					<div class="card-header">
						<span class="card-title"><h2>Tambah Data</h2></span>
					</div>
					<div class="card-body">
						<form method="POST" action="{{ route('Crud.store') }}" role="form" enctype="multipart/form-data">
							{{ csrf_field() }}
							<div class="form-group">
								<label for="title">Title</label>
								<input type="text" id="title" class="form-control" name="title" required="required" placeholder="Masukan Judul ...">
							</div>
							<div class="form-group">
								<label for="slug">Slug</label>
								<input type="text" id="slug" class="form-control" name="slug" required="required" placeholder="Masukan Slug ...">
							</div>
							<div class="form-group">
								<label for="img">Image</label>
								<input type="file" id="img" class="form-control" name="image" required="required">
							</div>
							<div class="form-group">
								<label for="content">Content</label>
								<textarea id="content" class="form-control" name="content" required="required" placeholder="Masukan Content ..."></textarea>
							</div>
							<div class="form-group">
								<label for="view">View Count</label>
								<input type="text" id="view" class="form-control" name="view_count" required="required" placeholder="Masukan View Count ...">
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-success form-control" value="Simpan">TAMBAH</button>
							</div>
							<div class="form-group">
								<a href="{{ route('Crud.index') }}" class="btn btn-danger form-control">BATAL</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection