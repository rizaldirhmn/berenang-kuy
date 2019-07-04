@extends('layouts.dashboard')
@section('content')
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Artikel
			<small>Control panel</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Dashboard</li></a>
			<li>Artikel</li>
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
		<div class="row">
			<div class="col-md-6">
				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title">Upload</h3>
					</div>
					<!-- /.box-header -->
					<!-- form start -->
					<form role="form" action="{{ route('dashboard.artikel.edit.patch', $artikel->slug) }}" enctype="multipart/form-data" method="POST">
						@csrf
						@method('PATCH')
						<div class="box-body">
							<div class="form-group">
								<label for="judul">Judul Artikel</label>
								<input type="text" name="judul" class="form-control" placeholder="Masukan Judul Artikel" value="{{ $artikel->judul }}">
							</div>
							<div class="form-group">
								<label for="caption">Caption Artikel</label>
								<input type="text" name="caption" class="form-control" placeholder="Masukan Caption Artikel" value="{{ $artikel->caption }}">
							</div>
							<div class="form-group">
								<label for="exampleInputPassword1">Deskripsi</label>
								<textarea name="deskripsi" class="form-control" placeholder="Isi Deskripsi Slider (Optional)" id="editor1" cols="30" rows="10">{{ $artikel->deskripsi }}</textarea>
							</div>
							<div class="form-group">
								<label for="kategori">Kategori Artikel</label>
								<select name="id_kategori" class="form-control">
									@foreach ($kategori as $item)
										<option value="{{ $item->id }}" @if($artikel->kategori == $item->id) selected @endif>{{ $item->name }}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group">
								<label for="exampleInputFile">Banner</label>
								<input type="file" id="inp" name="image" id="image" class="form-control">

								<p class="help-block">Ukuran file 1366 x 575</p>
							</div>
							<label for="video">Video</label>
							<div class="input-group">
								<span class="input-group-addon">www.youtube.com/</span>
								<input type="text" name="video" class="form-control" placeholder="Masukan kode video (optional)" value="{{ $artikel->video }}">
							</div>
						</div>
						<!-- /.box-body -->

						<div class="box-footer">
							<button type="submit" class="btn btn-primary">Submit</button>
						</div>
					</form>
				</div>
			</div>
			<div class="col-md-6">
				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title">Image</h3>
					</div>
					<!-- /.box-header -->
					<!-- form start -->
					<div class="box-body">
						<img id="img" src="{{ asset('uploads/artikel/'.$artikel->path) }}" class="img-responsive" alt="">
						<input type="hidden" name="foto" id="b64">
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- /.content -->
</div>
@endsection
@section('script')
<script>
	function readFile() {
  
  if (this.files && this.files[0]) {
    
			var FR= new FileReader();
			
			FR.addEventListener("load", function(e) {
				document.getElementById("img").src       = e.target.result;
				document.getElementById("b64").value = e.target.result;
			}); 
			
			FR.readAsDataURL( this.files[0] );
		}
		
	}

	document.getElementById("inp").addEventListener("change", readFile);
</script>
<!-- CK Editor -->
<script src="{{ asset('adminlte/bower_components/ckeditor/ckeditor.js') }}"></script>
<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1')
  })
</script>
@endsection