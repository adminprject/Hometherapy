@extends('layouts.appForo')
<style type="text/css">
	.dbg{
		margin-top: 0.9rem;
	}

	.dbg1{
		margin-top: 0.9rem;
		float: right;	
	}

</style>

@section('content')
	<div class="content-fluid">
		<div class="row">
			<div class="col-md">
				<div class="form-group" style="margin-top: 0.9rem;">
					@if(count($errors) > 0)
	                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
	                        <strong>Aviso</strong>
	                        <ul>
	                            @foreach ($errors->all() as $message)
	                                <li>{{ $message }}</li>
	                            @endforeach
	                        </ul>
	                    </div>
	                @endif
	                @if(Session::has('duplicate'))
						<div class="col-md">
							<div class="alert alert-danger alert-dismissible fade show" role="alert" style="margin-top: 0.8rem;">
							  	<strong>Exito!.</strong> {{ Session::get('duplicate') }}
							</div>
						</div>
					@endif
					<div class="card">
						<div class="card-header">
							Registro de la Nueva Discusión
						</div>
						<div class="card-body">
							<form method="post" action="{{ url('foro/postRegisterDiscusion') }}">
							@csrf
								<div class="form-group dbg">
									<label for="title">Titulo de la Discusión</label>
									<input type="text" class="form-control" name="title" maxlength="190" required>
								</div>
								<div class="form-group dbg">
									<label for="chatter_category_id">Categoria de la Discusión</label>
									<select name="chatter_category_id" class="form-control">
										<option value=""></option>
										@foreach($categories as $category)
											<option value="{{ $category->id }}">{{ $category->name }}</option>
										@endforeach
									</select>
								</div>
								<div class="form-group dbg">
									<label for="body">Descripcion para la Discusion</label>
									<textarea name="body" class="form-control" rows="6" id="body"></textarea>
								</div>
								<div class="col-md dbg1">
									<div class="form-group align-items-center">
										<a href="{{ url('foro') }}" class="btn btn-danger">Cancelar</a>
										<input type="submit" class="btn btn-success" name="guardar" value="Registrar">
									</div>
								</div>
							</form>	
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection