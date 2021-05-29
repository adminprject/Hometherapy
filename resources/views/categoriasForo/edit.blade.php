@extends('layoutsAdmin.app')

@section('content')
	<div class="container-fluid p-0">
		<div class="mb-12">
			<h1 class="h3 d-inline align-middle">@section('title','Categorias del Foro')</h1>
		</div>
		<div class="card">
			<div class="card-header">
				<h5 class="card-title">Formulario de Actualizacion</h5>
			</div>
			<div class="card-body">
				<form action="{{ url('admin/categories/forum/') }}/{{ $category->id }}" method="post">
					{{ method_field('PUT') }}
    				{{ csrf_field() }}
					<div class="form-group col-md-6">
						<label for="name">Nombre</label>
						<input type="text" name="name" class="form-control" value="{{ $category->name }}">
						@if ($errors->has('name'))
						    <div class="alert alert-danger d-flex align-items-center" role="alert">
							  	<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
							  	<div>
							  		<ul>
							    	@foreach($errors->get('name') as $message)
									    <li>{{ $message }}</li>
									@endforeach
									</ul>
							  	</div>
							</div>
						@endif
					</div>
					<div class="form-group col-md-6">
						<label for="color">Color</label>
						<input type="color" name="color" class="form-control" value="{{ $category->color }}">
						@if ($errors->has('color'))
						    <div class="alert alert-danger d-flex align-items-center" role="alert">
							  	<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
							  	<div>
							  		<ul>
							    	@foreach($errors->get('color') as $message)
									    <li>{{ $message }}</li>
									@endforeach
									</ul>
							  	</div>
							</div>
						@endif
					</div>
					<br>
					<div class="form-group" style="margin-left: auto;">
						<a class="btn btn-danger" href="{{ url('admin/categories/forum') }}">Cancelar</a>
						<input class="btn btn-success" type="submit" name="Guardar" value="Guardar">
					</div>
				</form>
			</div>
		</div>	
	</div>
@endsection