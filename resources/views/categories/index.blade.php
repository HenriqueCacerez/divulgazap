@extends('layouts.base')

@section('title', "Categorias")

@section('content')
<main>
    <!-- Header -->
    <header class="bg-dark py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder text-white">Categorias</h1>
                <p class="lead fw-normal text-white-50 mb-0">Lista de temas específicos em Grupos do WhatsApp</p>
            </div>
        </div>
    </header>
    <!--// Header -->

    <!-- Listing Categories -->
    <section class="container mt-5">
        <div class="list-group mb-5">
        <div class="row">
            @foreach ($categories as $category)
            <!-- Category Item -->
            <div class="col-md-4 mb-3 text-center">
                <a href="/?category={{ $category->name }}" class="text-center list-group-item list-group-item-action">
                    <img src="/assets/images/icons/categories/{{ $category->icon }}" width="45" />
                    <span class="d-block text-muted text-decoration-none">{{ $category->name }}</span>
                    <span class="badge rounded-pill bg-success">{{ $category->groups_count }}</span>
                </a>
            </div>
            <!--// Category Item -->
            @endforeach
        </div>
        </div>
    </section>
    <!-- // Listing Categories -->
</main>
@endsection