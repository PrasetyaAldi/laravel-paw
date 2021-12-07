@extends('layouts.master')
@section('title','Home | admin')
@section('admin','|| ADMIN')
@section('content')
			@if(session('success'))
				<div class="alert alert-success" role="alert">
					{{session('success')}}
				</div>
			@endif
			<div class="row">
				<div class="col-6"></div>
					<h1>Data Member</h1>
				</div>
				<div class="col-6">
					<button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
					  Tambah Data
					</button>
				</div>

				<table class="table table-hover">
					<tr>
						<th>Nama Depan</th>
						<th>Nama Belakang</th>
						<th>Posisi</th>
						<th>Alamat</th>
						<th>Aksi</th>
					</tr>
					@foreach($data_member as $member)
					<tr>
						<td>{{$member->nama_depan}}</td>
						<td>{{$member->nama_belakang}}</td>
						<td>{{$member->posisi}}</td>
						<td>{{$member->alamat}}</td>
						<td>
							<a href="/admin/{{$member->id}}/edit" class="btn btn-warning btn-sm">Edit
							<a href="/admin/{{$member->id}}/delete" class="btn btn-danger btn-sm" onclick="return confirm('Yakin mau di hapus?')">Delete</a>

						</td>
					</tr>
					@endforeach
				</table>
			</div>
		</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form action="{{ route('member.create') }}" method="POST">
						{{csrf_field()}}
					<div class="mb-3">
						<label for="exampleInputEmail1" class="form-label">Nama Depan</label>
						<input name="nama_depan" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Depan">
					</div>

				 	<div class="mb-3">
				    	<label for="exampleInputEmail1" class="form-label">Nama Belakang</label>
				    	<input name="nama_belakang" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Belakang">
				    </div>

					<div class="mb-3">
				   		<label for="exampleInputEmail1" class="form-label">Posisi</label>
				    	<input name="posisi" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Posisi">
					</div>

					<div class="mb-3">
				   		<label for="exampleInputEmail1" class="form-label">alamat</label>
				    	<input name="alamat" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Domisilis">
					</div>

					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Submit</button>
				</form>
			</div>
		</div>
	</div>
@endsection