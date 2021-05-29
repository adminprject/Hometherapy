@extends('layouts.app')

@section('content')
	<main id="main" data-aos="fade-up">
		<!-- ======= Breadcrumbs Section ======= -->
	    <section class="breadcrumbs">
	      <div class="container">
	        <div class="d-flex justify-content-between align-items-center">
	          <h2>Detalle del Producto</h2>
	        </div>
	      </div>
	    </section>
	    <!-- Breadcrumbs Section -->

	    <!-- ======= Portfolio Details Section ======= -->
	    <section id="portfolio-details" class="portfolio-details">
	      <div class="container">

	        <div class="row gy-4">

	          <div class="col-lg-8">
	            <div class="portfolio-details-slider swiper-container">
	              <div class="swiper-wrapper align-items-center">

	                <div class="swiper-slide">
	                  <img src="{{ url('img/portfolio/portfolio-details-1.jpg') }}" alt="">
	                </div>

	                <div class="swiper-slide">
	                  <img src="{{ url('img/portfolio/portfolio-details-2.jpg') }}" alt="">
	                </div>

	                <div class="swiper-slide">
	                  <img src="{{ url('img/portfolio/portfolio-details-3.jpg') }}" alt="">
	                </div>

	              </div>
	              <div class="swiper-pagination"></div>
	            </div>
	          </div>

	          <div class="col-lg-4">
	            <div class="portfolio-info">
	              <h3>Informacion</h3>
	              <ul>
	                <li><strong>Categoria</strong>: {{ $producto->Categoria->nombre }}</li>
	                <li><strong>Producto</strong>: {{ $producto->nombre }}</li>
	                <li><strong>Precio</strong>: {{ $producto->precio }}</li>
	                <li><strong>Fecha de Registro</strong>
	                	: {{ date_format($producto->created_at,"Y/m/d") }}
	                </li>
	              </ul>
	            </div>
	            <div class="portfolio-description">
	              <h2>Descripcion</h2>
	              <p>
	                {{ $producto->description }}
	              </p>
	            </div>
	          </div>

	        </div>

	      </div>
	    </section>
	    <!-- End Portfolio Details Section -->
	</main>
@endsection