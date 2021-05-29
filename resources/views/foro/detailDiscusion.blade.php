@extends('layouts.appForo')

<style type="text/css">
	.bg{
		/*border: 1px solid black;*/
		/*color: black;*/
		font-size: 1rem;
		margin-top: 1.6rem;
	}

	.dbg1{
		margin-top: 0.9rem;
		float: right;	
	}
</style>

@section('content')
	<div class="panel panel-default">
		<div class="col-md bg">
			<div class="card" style="margin-bottom: 2rem;">
				<div class="card-header">
					<div class="row">
					<div class="col-md-1">
						<a href="{{ url('foro') }}">
							<img src="{{ url('img/flecha.png') }}" width="50" height="50" class="rounded-circle">
						</a>
					</div>
					<div class="col-md-9">
						<h3>{{ $discussion->title }}</h3> 
						<span class="badge badge-title" style="background-color: {{ $discussion->category->color }};">{{ $discussion->category->name }}</span>
					</div>
					</div>
				</div>
			</div>
			@if(Session::has('success'))
				<div class="col-md">
					<div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-top: 0.8rem;">
					  	<strong>Exito!.</strong> {{ Session::get('success') }}
					</div>
				</div>
			@endif
			@foreach($posts as $post)
				<div class="conteiner-fluid" style="margin-top: 1rem;margin-bottom: 1rem;">
					<hr noshade="noshade" />
					<div class="row">
						<div class="col-md-1">
							<img class="rounded-circle z-depth-2" width="70" height="70" src="https://ui-avatars.com/api/?name={{ $post->user->name }}&background=random" data-holder-rendered="true">
						</div>
						<div class="col-md-11">
							<h6>{{ $post->user->name }} <span class="badge bg-secondary">{{ \Carbon\Carbon::createFromTimeStamp(strtotime($post->created_at))->diffForHumans() }}</span></h6>
							<div class="col-md">
								@if($post->markdown)
					        		<pre class="chatter_body_md">{{ $post->body }}</pre>
					        			<?= App\Helpers\ChatterHelper::demoteHtmlHeaderTags( GrahamCampbell\Markdown\Facades\Markdown::convertToHtml( $post->body ) ); ?>
					        	@else
					        		<?= $post->body; ?>
					        	@endif
							</div>
						</div>
					</div>
					<hr noshade="noshade" />
				</div>
			@endforeach
			
			<div id="pagination">{{ $posts->links() }}</div>
			
			<div class="conteiner-fluid">
				<div class="row">
					@if(!Auth::guest())
						<div class="conteiner-fluid" style="margin-top: 1rem;margin-bottom: 1rem;">
							<div class="row">
								<div class="col-md-1">
									<img class="rounded-circle z-depth-2" width="70" height="70" src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}&background=random" data-holder-rendered="true">
								</div>
								<div class="col-md-11">
									<form action="{{ url('foro/discusion/post') }}" method="POST">
										@csrf
										<div class="form-group">
											<textarea name="body" class="form-control" id="comment"></textarea>
											<input type="hidden" name="chatter_discussion_id" value="{{ $discussion->id }}">
										</div>
										<div class="col-md dbg1">
											<div class="form-group align-items-center">
												<input type="submit" class="btn btn-success" name="guardar" value="Comentar">
											</div>
										</div>
									</div>
									</form>
								</div>
							</div>
						</div>
					@else 
						<div class="alert alert-primary" role="alert">
						 	<p>Por favor <a href="{{ url('foro/login') }}">Inicie Sesion</a> o <a href="{{ url('foro/register') }}">Registrese </a> para poder responder.</p>
						</div>
					@endif
				</div>
			</div>
		</div>
	</div>
@endsection