@extends('layouts.admin')

@section('content')
    <div class="toolbar">
        <h2>Empresa</h2>
        <div></div>
    </div>

    <p>Rellena los campos con la información de tu empresa</p>

    <div class="d-flex justify-content-center mb-4">
        <ul class="nav nav-pills">
            <li class="nav-item"><a data-bs-toggle="tab" class="nav-link active" href="#tab-general">General</a></li>
            <li class="nav-item"><a data-bs-toggle="tab" class="nav-link" href="#tab-contact">Contacto</a></li>
            <li class="nav-item"><a data-bs-toggle="tab" class="nav-link" href="#tab-location">Ubicación</a></li>
            <li class="nav-item"><a data-bs-toggle="tab" class="nav-link" href="#tab-social">Redes sociales</a></li>
        </ul>
    </div>

    <form class="main" method="POST" action="{{ route('company.update') }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="tab-content">
            <div class="tab-pane active" id="tab-general">
                <div class="form-group">
                    <label for="_logo">Logo (Opcional)</label>
                    <input type="file"
                        id="_logo"
                        name="_logo"
                        class="form-control @error('logo') is-invalid @enderror"
                        accept="image/png"
                        data-file="{{ $company->logo }}"
                        >
                </div>
                
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text"
                        id="name"
                        name="name"
                        value="{{ $company->name }}"
                        class="form-control @error('name') is-invalid @enderror"
                        autofocus
                        max="128"
                        >
                </div>

                <div class="form-group">
                    <label for="schedule">Horario (Opcional)</label>
                    <textarea
                        id="schedule"
                        name="schedule"
                        class="form-control @error('schedule') is-invalid @enderror"
                        >{{ $company->schedule }}</textarea>
                </div>        
            </div>

            <div class="tab-pane" id="tab-contact">
                <div class="form-group">
                    <label for="name">Email (Opcional)</label>
                    <input type="email"
                        id="email"
                        name="email"
                        value="{{ $company->email }}"
                        class="form-control @error('email') is-invalid @enderror"
                        max="64"
                        >
                </div>
        
                <div class="form-group">
                    <label for="phone">Teléfono (Opcional)</label>
                    <input type="text"
                        id="phone"
                        name="phone"
                        value="{{ $company->phone }}"
                        class="form-control @error('phone') is-invalid @enderror"
                        max="64"
                        >
                </div>
        
                <div class="form-group">
                    <label for="whatsapp">WhatsApp (Opcional)</label>
                    <input type="text"
                        id="whatsapp"
                        name="whatsapp"
                        value="{{ $company->whatsapp }}"
                        class="form-control @error('whatsapp') is-invalid @enderror"
                        max="64"
                        >
                </div>
            </div>

            <div class="tab-pane" id="tab-location">
                <div class="form-group">
                    <label for="address">Dirección (Opcional)</label>
                    <input type="text"
                        id="address"
                        name="address"
                        value="{{ $company->address }}"
                        class="form-control @error('address') is-invalid @enderror"
                        max="128"
                        >
                </div>
        
                <div class="form-group">
                    <label for="postal_code">Código postal (Opcional)</label>
                    <input type="text"
                        id="postal_code"
                        name="postal_code"
                        value="{{ $company->postal_code }}"
                        class="form-control @error('postal_code') is-invalid @enderror"
                        max="5"
                        >
                </div>
        
                <div class="form-group">
                    <label for="city">Ciudad (Opcional)</label>
                    <input type="text"
                        id="city"
                        name="city"
                        value="{{ $company->city }}"
                        class="form-control @error('city') is-invalid @enderror"
                        max="64"
                        >
                </div>
        
                <div class="form-group">
                    <label for="state">Provincia (Opcional)</label>
                    <input type="text"
                        id="state"
                        name="state"
                        value="{{ $company->state }}"
                        class="form-control @error('state') is-invalid @enderror"
                        max="64"
                        >
                </div>
        
                <div class="form-group">
                    <label for="country">País (Opcional)</label>
                    <input type="text"
                        id="country"
                        name="country"
                        value="{{ $company->country }}"
                        class="form-control @error('country') is-invalid @enderror"
                        max="64"
                        >
                </div>
            </div>
        
            <div class="tab-pane" id="tab-social">
                <div class="form-group">
                    <label for="social_facebook">Facebook (Opcional)</label>
                    <input type="text"
                        id="social_facebook"
                        name="social_facebook"
                        value="{{ $company->social_facebook }}"
                        class="form-control @error('social_facebook') is-invalid @enderror"
                        max="128"
                        >
                </div>
        
                <div class="form-group">
                    <label for="social_instagram">Instagram (Opcional)</label>
                    <input type="text"
                        id="social_instagram"
                        name="social_instagram"
                        value="{{ $company->social_instagram }}"
                        class="form-control @error('social_instagram') is-invalid @enderror"
                        max="128"
                        >
                </div>

                <div class="form-group">
                    <label for="social_twitter">Twitter (Opcional)</label>
                    <input type="text"
                        id="social_twitter"
                        name="social_twitter"
                        value="{{ $company->social_twitter }}"
                        class="form-control @error('social_twitter') is-invalid @enderror"
                        max="128"
                        >
                </div>

                <div class="form-group">
                    <label for="social_youtube">YouTube (Opcional)</label>
                    <input type="text"
                        id="social_youtube"
                        name="social_youtube"
                        value="{{ $company->social_youtube }}"
                        class="form-control @error('social_youtube') is-invalid @enderror"
                        max="128"
                        >
                </div>
            </div>
        </div>

        <x-submit-button></x-submit-button>
    </form>
@endsection