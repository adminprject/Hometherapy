@extends('layoutsAdmin.app')

<style type="text/css">
	.btn-flotante {
		text-transform: uppercase; /* Texto en mayusculas */
		font-weight: bold; /* Fuente en negrita o bold */
		color: #ffffff; /* Color del texto */
		border-radius: 5px; /* Borde del boton */
		letter-spacing: 2px; /* Espacio entre letras */
		background-color: #3C9B1F; /* Color de fondo */
		padding: 18px 30px; /* Relleno del boton */
		position: fixed;
		bottom: 40px;
		right: 40px;
		transition: all 300ms ease 0ms;
		box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);
		z-index: 99;
	}
	.btn-flotante:hover {
		background-color: #3C9B1F; /* Color de fondo al pasar el cursor */
		box-shadow: 0px 15px 20px rgba(0, 0, 0, 0.3);
		transform: translateY(-7px);
	}
	@media only screen and (max-width: 600px) {
	 	.btn-flotante {
			font-size: 14px;
			padding: 12px 20px;
			bottom: 110px;
			right: 20px;
		}
	} 
</style>

@section('content')
	<div class="container-fluid p-0">
		<div class="mb-12">
			<h1 class="h3 d-inline align-middle">@section('title','Categorias del Foro')</h1>
		</div>
		<div class="card">
			<div class="card-header">
				<h5 class="card-title">Listado</h5>
			</div>
			<div class="card-body">
				@if(Session::has('success'))
					<div class="col-md">
						<div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-top: 0.8rem;">
						  	<strong>Exito!.</strong> {{ Session::get('success') }}
						</div>
					</div>
				@endif
				<table class="table table-striped table-hover table-responsive">
					<thead>
						<tr>
							<td>Orden</td>
							<td>Nombre</td>
							<td>Color</td>
							<td>Fecha Creacion</td>
							<td>Fecha Modificacion</td>
							<td>Acciones</td>
						</tr>
					</thead>
					<tbody>
						@foreach($categories as $category)
							<tr>
								<td>{{ $category->order }}</td>
								<td>{{ $category->name }}</td>
								<td><input type="color" value="{{ $category->color }}" readonly disabled /></td>
								<?php
									$start_date = date_create($category->created_at);
									$fecha_create = date_format($start_date,"Y-m-d H:i:s"); 
									$end_date = date_create($category->updated_at); 
									$fecha_update = date_format($end_date,"Y/m/d");
								 ?>
								<td>{{ $fecha_create }}</td>
								<td>{{ $fecha_update }}</td>
								<td>
									<a href="{{ url('admin/categories/forum') }}/{{ $category->id }}/edit" 
									class="btn btn-secondary" id="edit"><i class="align-middle" data-feather="edit-3"></i></a>
									<!-- <a class="delete btn btn-danger" data-id="{{ $category->id }}" 
										href="javascript:void(0)">
										<i class="align-middle" data-feather="trash-2"></i>
									</a> -->
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
				{{ $categories->links() }}
			</div>
			<a href="{{ url('admin/categories/forum/create') }}" class="btn-flotante"><i class="align-middle" data-feather="plus"></i></a>
		</div>
	</div>		
		
@endsection