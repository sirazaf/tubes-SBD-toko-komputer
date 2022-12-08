@extends('komputer.layout')

@section('content')

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
        @foreach($errors->all() as $error)

            <li>{{ $error }}</li>

        @endforeach
        </ul>
    </div>
@endif

<div class="card mt-4">
	<div class="card-body">

        <h5 class="card-title fw-bolder mb-3">Tambah Komputer</h5>

		<form method="post" action="{{ route('komputer.store') }}">
			@csrf
            <div class="mb-3">
                <label for="id_komp" class="form-label">ID komp</label>
                <input type="text" class="form-control" id="id_komp" name="id_komp">
            </div>
			<div class="mb-3">
                <label for="nama_komp" class="form-label">Nama komputer</label>
                <input type="text" class="form-control" id="nama_komp" name="nama_komp">
            </div>
            <div class="mb-3">
                <label for="stok" class="form-label">Stok</label>
                <input type="text" class="form-control" id="stok" name="stok">
            </div>
            <div class="mb-3">
                <label for="harga_jual" class="form-label">Harga Jual</label>
                <input type="text" class="form-control" id="harga_jual" name="harga_jual">
            </div>
			<div class="text-center">
				<input type="submit" class="btn btn-primary" value="Tambah" />
			</div>
		</form>
	</div>
</div>

@stop