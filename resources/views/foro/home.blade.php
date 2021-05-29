@extends('layouts.appForo')

@section('content')

<style type="text/css">
	.bg{
		/*border: 1px solid black;*/
		color: black;
		font-size: 1rem;
	}
</style>

<div class="panel panel-default">
	<div class="panel-body">
		@if(Session::has('success'))
			<div class="col-md">
				<div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-top: 0.8rem;">
				  	<strong>Exito!.</strong> {{ Session::get('success') }}
				</div>
			</div>
		@endif
		<div class="col-md">
			<ul class="discussions">
				@foreach($discussions as $discussion)
					<li id="link-d" style="list-style:none;margin-top: 0.8rem;">
						<div class="card">
							<div class="card-body">
								<a class="discussion_list" href="{{ url('foro') }}/discussion/{{ $discussion->slug }}">
									<div class="container">
										<div class="row">
											<div class="col-md-1 bg">
												<img class="rounded-circle z-depth-2" width="50" height="50" src="https://ui-avatars.com/api/?name={{ $discussion->user->name }}&background=random" data-holder-rendered="true">
											</div>
											<div class="col-md-9 bg">
												<h5>{{ $discussion->title }}</h5>
												@if($discussion->post[0]->markdown)
						        				<?php $discussion_body = GrahamCampbell\Markdown\Facades\Markdown::convertToHtml( $discussion->post[0]->body ); ?>
							        			@else
							        				<?php $discussion_body = $discussion->post[0]->body; ?>
							        			@endif
							        			<p>{{ substr(strip_tags($discussion_body), 0, 200) }}@if(strlen(strip_tags($discussion_body)) > 200){{ '...' }}@endif</p>
							        			Publicado por: <span>{{ ucfirst($discussion->user->name) }}</span>
											</div>
											<div class="col-md-2 bg">
												<span class="badge badge-title" style="background-color: {{ $discussion->category->color }};">{{ $discussion->category->name }}</span>
												<h3><i class='bx bxs-comment bx-md'></i> {{ $discussion->postsCount[0]->total }}</h3>
											</div>
										</div>
									</div>
								</a>
							</div>
						</div>
					</li>
				@endforeach
			</ul>
		</div>
	</div>

	<div id="pagination">
		{{ $discussions->links() }}
	</div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript">
	$(function() {
		// elementos de la lista
		var menues = $(".nav-link"); 
		// manejador de click sobre todos los elementos
		menues.click(function() {
			// eliminamos active de todos los elementos
			menues.removeClass("active");
			// activamos el elemento clicado.
			$(this).addClass("active");
		});
	});
</script>
@endsection