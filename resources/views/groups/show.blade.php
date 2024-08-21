@extends('layouts.base')

@section('title', "Detalhes do Grupo")

@section('content')
<main class="container col-md-9 col-sm-12 mt-5 mb-5">
  <div class="row">
    <h1 class="text-center mb-5">{{ $group->name }}</h1>
    <div class="col-md-6 mb-5">
      <div class="card">
        <img src="/assets/images/groups/{{ $group->image }}" onerror="this.src='/assets/images/placeholder.png'" class="card-img-top object-fit-cover group-img" width="100%" height="300px" />
        <div class="card-body">
          <div class="position-absolute" style="margin-top: -30px;">
            <a href="/?category={{ $group->category->name }}" class="badge bg-dark text-uppercase group-category-name text-decoration-none">{{ $group->category->name }}</a>
          </div>
          <h5 class="card-title fw-bold">{{ $group->name }}</h5>
          <p class="card-text">{{ $group->description }}</p>
          <div class="text-center d-sm-inline d-none">
            <a href="https://chat.whatsapp.com/{{ $group->invite_link }}" target="_blank" class="btn btn-success btn-group-join w-100">Entrar no Grupo</a>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="card card-body">
        <p class="card-text">Este grupo foi enviado em <strong>{{ \Carbon\Carbon::parse($group->created_at)->format('d/m/Y \à\s H:i') }}</strong>.</p>
        <div class="text-center d-sm-inline d-md-none">
          <a href="https://chat.whatsapp.com/{{ $group->invite_link }}" target="_blank" class="btn btn-success btn-group-join w-100">Entrar no Grupo</a>
        </div>
        <hr />
        <div class="text-center">
          <a href="/group/create" class="text-decoration-none">Envie o seu grupo</a> também e comece a receber novos integrantes!
        </div>
      </div>
    </div>
  </div>
</main>
@endsection