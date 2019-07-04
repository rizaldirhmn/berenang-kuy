@extends('layouts.dashboard')
@section('content')
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Produk
				<small>Control panel</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Dashboard</li></a>
				<li>Produk</li>
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

			<div class="box box-primary">
				<div class="box-header">
					<h3 class="box-title">Cari Product</h3>
				</div>
				<div class="box-body">
					<div class="row">
						<form action="{{ route('dashboard.product.cari') }}" method="GET">
							<div class="col-md-4 col-sm-12">
								<div class="form-group">
									<input type="text" name="name" class="form-control" id="" placeholder="Nama Produk">
								</div>
							</div>
							<div class="col-md-4 col-sm-12">
								<div class="form-group">
									<select name="id_kategori" id="" class="form-control">
										<option disabled selected>Pilih Kategori</option>
										<option value="1">Kartu</option>
										<option value="2">Obat Herbal</option>
									</select>
								</div>
							</div>
							<div class="col-md-4 col-sm-12 pull-left">
								<input type="submit" value="Cari" class="btn btn-primary">
							</div>
						</form>
					</div>
				</div>
				<div class="box-footer">
					<div class="row">
						<div class="col-md-12 text-center">
							<a href="{{ route('dashboard.product.create') }}" class="btn btn-default">+ Tambah</a>
						</div>
					</div>
				</div>
			</div>
			
			@foreach ($product as $item)
				<div class="col-md-6">
					<div class="row">
						<div class="col-md-12">
							<div class="panel panel-default">
								<div class="panel-body">
									<div class="col-md-12 panelTop">	
										<div class="col-md-4">
											<img class="img-responsive" src="{{ asset('uploads/product/'.$item->path) }}" alt=""/>
										</div>
										<div class="col-md-6">	
											<h4>{{ $item->name }}</h4>
											<table class="table">
												<tr>
													<td><small class="label bg-blue">{{ $item->getKategori->name }}</small></td>
												</tr>
											</table>
										</div>
									</div>
								</div>
								<div class="panel-footer">
									<div class="panel-title text-center">
										<a href="{{ route('dashboard.product.edit', $item->slug) }}" class="edit_artikel"><img src="{{ asset('image/edit.png') }}" width="20" height="20" alt="" data-placement="top" data-toggle="tooltip" title="Edit Artikel"></a>
										<a href="{{ route('dashboard.product.delete', $item->slug) }}" class="hapus_artikel" onclick="return confirm('Apakah anda yakin?')"><img src="{{ asset('image/garbage.png') }}" width="20" height="20" alt="" data-placement="top" data-toggle="tooltip" title="Hapus Artikel"></a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			@endforeach
			
			<div class="row">
				<div class="col-md-12">
					<div class="text-center">
						{{ $product->links() }}
					</div>
				</div>
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