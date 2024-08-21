@extends('layouts.base')

@section('title', "Compartilhe o seu Grupo de WhatsApp")

@section('javascripts')
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  <script src="/assets/js/pages/page-group-create.js"></script>
@endsection


@section('content')
<main>

  <div class="container col-md-9 col-sm-12 mt-5 mb-5">

    <div class="row">

      <div class="text-center mb-5">
        <h1 class="fw-semibold">Enviar Grupo</h1>
        <p>Compartilhe o seu grupo e comece a receber novos integrantes! 🤩</p>
      </div>

      <div class="col-md-4 mb-5">
        <div class="card">
          <img width="100%" height="200px" src="/assets/images/placeholder.png"
            class="group-image card-img-top object-fit-cover group-img" />
          <div class="card-body position-relative">

            <div class="position-absolute" style="margin-top: -30px;">
              <span class="badge bg-dark text-uppercase group-category-name">Categoria</span>
            </div>

            <h5 class="card-title group-name">Nome do Grupo</h5>
            <p class="card-text group-description">Descrição</p>
          </div>
        </div>
      </div>

      <div class="col-md-8">
        <div class="card">
          <div class="card-body">

            <form id="form-create-group">
              <div id="first-step" class="">
                <div class="mb-3">
                  <label class="form-label">Link do Grupo</label>
                  <input type="text" id="link" class="form-control form-control-lg" placeholder="ex: https://chat.whatsapp.com/..." required>
                </div>
              </div>

              <div id="second-step" class="d-none">
                <div class="mb-3">
                  <label class="form-label">Categoria</label>
                  <select class="form-control form-control-lg" id="id_category">
                    <option disabled selected>Escolha a categoria do grupo</option>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                  </select>
                  <div class="form-text">Selecione a categoria que mais se encaixa com o tema do seu grupo.</div>
                </div>

                <div class="mb-3">
                  <label class="form-label">Nome do grupo</label>
                  <input type="text" id="name" class="group-name form-control form-control-lg"
                    placeholder="Nome do grupo">
                </div>

                <div class="mb-3">
                  <label class="form-label">Descrição <small>(opcional)</small></label>
                  <textarea id="description" class="form-control form-control-lg" rows="3" placeholder="conte sobre o grupo"></textarea>
                </div>

                <div class="g-recaptcha mb-3" data-sitekey="{{ env('reCAPTCHA_public_key') }}"></div>
              </div>

              <!-- Warning -->
              <div id="warning-create-group" class="alert alert-warning d-none" role="alert"></div>

              <div class="text-center">
                <button type="submit" id="btn-submit" class="btn btn-lg btn-dark w-100">
                  <div id="loading" class="spinner-border text-light d-none" role="status"></div>
                  <span id="text">Validar link do Grupo</span>
                </button>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

</main>
@endsection