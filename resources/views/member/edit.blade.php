@extends('layouts.master')

@section('content')
			<h1>Edit Data</h1>
			@if(session('sukses'))
				<div class="alert alert-success" role="alert">
					{{session('sukses')}}
				</div>
			@endif
			<div class="row">
				<div class="col-lg-12">
				<form action="/member/{{$member->id}}/update" method="POST">
						{{csrf_field()}}
					<div class="mb-3">
						<label for="exampleInputEmail1" class="form-label">Nama Depan</label>
						<input name="nama_depan" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Depan" value="{{$member->nama_depan}}">
					</div>

				 	<div class="mb-3">
				    	<label for="exampleInputEmail1" class="form-label">Nama Belakang</label>
				    	<input name="nama_belakang" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Belakang" value="{{$member->nama_belakang}}">
				    </div>

					<div class="mb-3">
				   		<label for="exampleInputEmail1" class="form-label">Posisi</label>
				    	<input name="posisi" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Posisi" value="{{$member->posisi}}">
					</div>

					<div class="mb-3">
				   		<label for="exampleInputEmail1" class="form-label">Domisili</label>
				    	<input name="domisili" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Domisilis" value="{{$member->domisili}}">
					</div>
					<button type="submit" class="btn btn-warning">Update</button>
				</form>
				</div>
			</div>
@endsection