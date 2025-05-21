@extends('front.app')

@section('title', 'CEI - Contact')

@section('main_section')

<div class="section-title mb-0">
    <h4 class="m-0 text-uppercase font-weight-bold">
      Contactez nous !
    </h4>
  </div>
  <div class="bg-white border border-top-0 p-4 mb-3">
    <div class="mb-4">
      <h6 class="text-uppercase font-weight-bold">Nos contacts</h6>

      <div class="mb-3">
        <div class="d-flex align-items-center mb-2">
          <i class="fa fa-map-marker-alt text-info mr-2"></i>
          <h6 class="font-weight-bold mb-0">Notre siege</h6>
        </div>
        <p class="m-0">{{ $global_settings->adress }}</p>
      </div>
      <div class="mb-3">
        <div class="d-flex align-items-center mb-2">
          <i class="fa fa-envelope-open text-info mr-2"></i>
          <h6 class="font-weight-bold mb-0">Envoyez nous un email</h6>
        </div>
        <p class="m-0">{{ $global_settings->email }}</p>
      </div>
      <div class="mb-3">
        <div class="d-flex align-items-center mb-2">
          <i class="fa fa-phone-alt text-info mr-2"></i>
          <h6 class="font-weight-bold mb-0">Appelez-nous</h6>
        </div>
        <p class="m-0">{{ $global_settings->phone }}</p>
      </div>
    </div>
    <h6 class="text-uppercase font-weight-bold mb-3">
      Contactez-nous
    </h6>

@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Succès !</strong> {{ session('success') }}
</div>
@endif

    <form  action="{{ route('contact.send') }}" method="POST">
      <div class="form-row">
        @csrf
        <div class="col-md-6">
          <div class="form-group">
            <input
              type="text"
              class="form-control p-4" 
              name="name"
              placeholder="Votre nom"
              required="required"
            />
            @error('name')
            <div class="alert alert-danger mt-2">
                {{ $message }}
                
            @enderror



          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <input
              type="email"
              class="form-control p-4"
                name="email"
              placeholder="votre email"
              required="required"
            />
            @error('email')
            <div class="alert alert-danger mt-2">
                {{ $message }}
                
            @enderror
          </div>
        </div>
      </div>
      <div class="form-group">
        <input
          type="text"
          class="form-control p-4"
            name="subject"
          placeholder="Sujet"
          required="required"
        />
        @error('subject')
            <div class="alert alert-danger mt-2">
                {{ $message }}
                
            @enderror
      </div>
      <div class="form-group">
        <textarea
          class="form-control"
          rows="4"
          placeholder="Message"
            name="message"
          required="required"
        ></textarea>
        @error('message')
            <div class="alert alert-danger mt-2">
                {{ $message }}
                
            @enderror
      </div>
      <div>
        <button
          class="btn btn-info font-weight-semi-bold px-4"
          style="height: 50px"
          type="submit"
        >
          Envoyer un message
        </button>
      </div>
    </form>
  </div>
@endsection
