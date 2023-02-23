<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>{{ $company->name }}</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Noto+Serif+Toto:wght@400;700&family=Raleway:wght@100;300;400&display=swap" rel="stylesheet">

	<!-- Map -->
	<link rel = "stylesheet" href = "http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.css" />
    <script src = "http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.js"></script>

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">

    @vite(['resources/css/frontend/app.scss', 'resources/js/frontend.js'])
</head>

<body style="background-image: url({{ Vite::asset('resources/images/frontend/bg/light2.jpg') }}">
	
	<div id="app">
		<header>
			<div class="contact">
				@if($company->phone)<a href="tel:{{ $company->phone }}"><i class="bi bi-telephone-fill"></i> {{ $company->phone }}</a>@endif
				@if($company->email)<a href="mailto:{{ $company->email }}"><i class="bi bi-envelope"></i> {{ $company->email }}</a>@endif
				@if($company->whatsapp)<a href="https://wa.me/{{ $company->whatsapp }}"><i class="bi bi-whatsapp"></i> {{ $company->whatsapp }}</a>@endif
			</div>
			<div class="social">
				@if($company->social_facebook)<a href="{{ $company->social_facebook }}"><i class="bi bi-facebook"></i></a>@endif
				@if($company->social_instagram)<a href="{{ $company->social_instagram }}"><i class="bi bi-instagram"></i></a>@endif
				@if($company->social_twitter)<a href="{{ $company->social_twitter }}"><i class="bi bi-twitter"></i></a>@endif
				@if($company->social_youtube)<a href="{{ $company->social_youtube }}"><i class="bi bi-youtube"></i></a>@endif
			</div>
		</header>
		
		<section data-layout="hero">
			@if ($company->logo)
				<img class="logo" src="/img/logo/{{ $company->logo }}">
			@else
				<h1 class="hero">{{ $company->name }}</h1>
			@endif
		</section>
		
		<section class="intro" data-layout="content" data-cols="1">
			<div class="content-wrapper text-center">
				<h3>British seasonal ingredients through an Italian lens</h3>
				<p>Lorem ipsum dolor sit amet tetra vector</p>
			</div>
		</section>
		
		<section class="menu" data-layout="menu" data-cols="1">
			<div class="content">
				<div class="content-wrapper-sm text-center">
					<div class="vue-menu"><menu></menu></div>
				</div>
			</div>
		</section>
		
		<section class="restaurant" data-layout="textandimage-image">
			<div class="image">
				<img class="logo" src="{{ Vite::asset('resources/images/frontend/misc/local.jpg') }}" loading="lazy">
			</div>
			<div class="content">
				<div class="content-wrapper-sm text-center">
					<h2 class="section-title">Restaurante</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
						sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
					</p>
					<p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi 
						ut aliquip ex ea commodo consequat.
					</p>
				</div>
			</div>
		</section>
		
		<section class="experience" data-layout="textandimage-image">
			<div class="content">
				<div class="content-wrapper-sm text-center">
					<h2 class="section-title">Experiencia</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
						sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
					</p>
					<p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi 
						ut aliquip ex ea commodo consequat.
					</p>
					<p><a href="#" class="btn-default ">Button</a></p>
				</div>
			</div>
			<div class="image">
				<img class="logo" src="{{ Vite::asset('resources/images/frontend/misc/platos.jpg') }}" loading="lazy">
			</div>
		</section>

		<section class="review" data-layout="content">
			<div class="content">
				<div class="content-wrapper-sm text-center">
					<h2>Lorem ipsum dolor sit amet</h2>
					<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem 
						accusantium doloremque laudantium, totam rem aperiam.</p>
				</div>
			</div>
		</section>
		
		<section class="map-info" data-layout="content-map">
			<div id="my-map" class="map" data-address="{{ $company->full_address }}"></div>
			<div class="content">
				<div class="content-wrapper-sm text-center">
					<h2 class="section-title">Horario y ubicación</h2>
					@if ($company->schedule)
						<h4 class="section-subtitle">Horario</h4>
						<p>{!! nl2br($company->schedule) !!}</p>
					@endif
					@if ($company->address)
						<h4 class="section-subtitle">Ubicación</h4>
						<p>
							{{ $company->address }}
							<br>
							{{ $company->postal_code }} {{ $company->city }}
							<br>
							{{ $company->state }} {{ $company->country }}
						</p>
					@endif
				</div>
			</div>
		</section>
		
		@if($company->email)
			<section class="contact" data-layout="content" data-bg="dark">
				<div class="content">
					<div class="content-wrapper-sm">
						<form id="form-contact">
							@csrf
							<h2 class="section-title">Contactar</h2>
							<div class="alert alert-danger hidden">Por favor, revisa los campos marcados en rojo</div>
							<div class="alert alert-success hidden">Mensaje enviado correctamente. Nos pondremos encontacto contigo en la mayor brevedad posible</div>
							<div class="form-group">
								<label for="name">Nombre</label>
								<input type="text" class="form-control" id="name" name="name">
							</div>
							<div class="form-group">
								<label for="email">Email</label>
								<input type="email" class="form-control" id="email" name="email">
							</div>
							<div class="form-group">
								<label for="phone">Teléfono</label>
								<input type="text" class="form-control" id="phone" name="phone">
							</div>
							<div class="form-group">
								<label for="message">Mensaje</label>
								<textarea class="form-control" id="message" name="message"></textarea>
							</div>
							<div class="form-group text-center">
								<input type="submit" class="btn-default btn-light" data-value="Enviar" data-sending-value="Enviando...">
							</div>
						</form>
					</div>
				</div>
			</section>
		@endif
		
		<footer>
			<div class="social">
				@if($company->social_facebook)<a href="{{ $company->social_facebook }}"><i class="bi bi-facebook"></i></a>@endif
				@if($company->social_instagram)<a href="{{ $company->social_instagram }}"><i class="bi bi-instagram"></i></a>@endif
				@if($company->social_twitter)<a href="{{ $company->social_twitter }}"><i class="bi bi-twitter"></i></a>@endif
				@if($company->social_youtube)<a href="{{ $company->social_youtube }}"><i class="bi bi-youtube"></i></a>@endif
			</div>
			<div class="links">
				<a href="#">Política de privacidad y aviso legal</a><a href="#">Política de Cookies</a>
			</div>
			<div class="copyright">Desarrollado por Fran Rodríguez <?php echo date('Y') ?></div>
		</footer>
	</div>
</body>

</html>