@extends('layouts.app')
@section('templates_title')
	Home
@endsection

@section('content')
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-12">
				<div class="card">
					<div class="card-header">
						<div style="display: flex; justify-content: space-between; align-items: center;">
							<span id="card-title">
								<h2>Belajar CRUD</h2>
							</span>

							<div class="float-right">
								<a href="{{ route('Crud.create') }}" class="btn btn-primary btn-sm float-right" data-placement="left"><i class="fa fa-pencil fa-fw"></i>  Input Data</a>
								|
								<a href="{{ url('Trash') }}" class="btn btn-info btn-sm float-right" data-placement="left"><i class="fa fa-trash-o fa-fw"></i>  Recycle Bin</a>
							</div>
						</div>
					</div>
					@if($message = Session::get('success'))
						<div class="alert alert-success">
							<p>{{ $message }}</p>
						</div>
					@endif

					@if(!empty($data))
					<div class="card-body">
						<div class="table-reponsive">
							<table class="table table-striped table-hover">
								<thead class="thead">
									<tr>
										<th><center>No</center></th>
										<th><center>ID</center></th>
										<th><center>Title</center></th>
										<th><center>Slug</center></th>
										<th><center>Image</center></th>
										<th><center>Content</center></th>
										<th><center>View_Count</center></th>
										<th width="175px"><center>Action</center></th>
									</tr>
								</thead>
								<tbody>
									<?php $no = 1 ?>
									@foreach($data as $d)
										<tr align="center">
											<td>{{ $no++ }}</td>
											<td>{{ $d->id }}</td>
											<td>{{ $d->title }}</td>
											<td>{{ $d->slug }}</td>
											<td><img width="150px" src="{{ url('/image/'.$d->image) }}"></td>
											<td>{{ $d->content }}</td>
											<td>{{ $d->view_count }}</td>
											<td>
												<form action="{{ route('Crud.destroy', $d->id) }}" method="POST">
													<a class="btn btn-success btn-sm" href="{{ route('Crud.edit', $d->id) }}"><i class="fa fa-edit fa-fw"></i>  Edit</a>
													@csrf
													@method('DELETE')
													<button type="submit" class="btn btn-danger btn-sm">
														<i class="fa fa-trash fa-fw"></i>  Delete
													</button>
												</form>
											</td>
										</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
					@else
					@endif
				</div>
			</div>
		</div>
	</div>
@endsection