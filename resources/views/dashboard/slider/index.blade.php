@extends('layouts.dashboard')
@section('content')
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Slider
				<small>Control panel</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Dashboard</li></a>
				<li>Slider</li>
			</ol>
		</section>

		<!-- Main content -->
		<section class="content">
			@if ( $errors->any() )
				<div class="alert alert-danger" role="alert">
					<button type="button" class="close" data-dismiss="alert">×</button>
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>  
					@endforeach
				</div>
			@endif

			@if ( session('success') )
				<div class="alert alert-success" role="alert">
					<button type="button" class="close" data-dismiss="alert">×</button>
					{{ session('success') }}
				</div>
			@elseif ( session('error') )
				<div class="alert alert-danger" role="alert">
					<button type="button" class="close" data-dismiss="alert">×</button>
					{{ session('error') }}
				</div>
			@endif

			<div class="box">
					<div class="box-header with-border">
						<h3 class="box-title">Slider</h3>
						<div class="box-tools pull-right">
							{{-- <a href=""><span class="label label-primary">+ Tambah</span></a> --}}
							<a href="{{ route('dashboard.slider.create') }}" class="btn btn-primary">+ Tambah</a>
						</div>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<table id="slider" class="table table-bordered table-striped">
							<thead>
							<tr>
								<th>No</th>
								<th>Gambar</th>
								<th>Deskripsi</th>
								<th>Aksi</th>
							</tr>
							</thead>
							@php
									$no =1;
							@endphp
							<tbody>
								@foreach ($slider as $item)
									<tr>
										<td>{{ $no++ }}</td>
										<td><img src="{{ asset($item->path) }}" class="img-responsive" width="300" alt=""></td>
										<td>{{ $item->deskripsi }}</td>
										<td>
											<a href="{{ route('dashboard.slider.delete', \Crypt::encrypt($item->id)) }}" onclick="return confirm('Apakah anda yakin?')">
												<img src="{{ asset('image/delete.png') }}" data-toggle="tooltip" data-placement="top" title="Hapus">
											</a>
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
					<!-- /.box-body -->
				</div>

		</section>
		<!-- /.content -->
	</div>
@endsection
@section('script')
<!-- DataTables -->
<script src="{{ asset('adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<script>
	$(function () {
		$('#slider').DataTable()
	})
</script>
@endsection