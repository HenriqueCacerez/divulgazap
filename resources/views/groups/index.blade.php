@extends('layouts.base')

@section('title', env('APP_NAME'))

@section('content')
<main>
    <!-- Header -->
    <header class="bg-dark py-5">
        <div class="container px-4 px-lg-5 my-2">
            <div class="text-center text-white">
                @if ($category)
                    <h1 class="display-4 fw-bolder text-white">{{ $category->name }}</h1>
                    <p class="lead fw-normal text-white-50 mb-0">( {{ count($groups) }} ) grupos encontrados</p>
                @else
                    <h1 class="display-4 fw-bolder text-white">{{ env('APP_NAME') }}</h1>
                    <p class="lead fw-normal text-white-50 mb-0">Encontre ou compartilhe grupos de WhatsApp</p>
                @endif
                <div class="d-grid gap-2 d-sm-flex justify-content-sm-center mt-4">
                    <a href="/categories" class="btn btn-outline-secondary btn-lg px-4">Categorias</a>
                </div>
            </div>
        </div>
    </header>
    <!--// Header -->

    <!-- Listing Groups -->
    <section class="bg-light py-2">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-1 row-cols-md-2 row-cols-xl-3 row-cols-xl-4 justify-content-center">
                @foreach($groups as $group)
                <div class="col mb-5">
                    <!-- Card -->
                    <div class="card position-relative card-group">
                        <img src="/assets/images/groups/{{ $group->image }}" onerror="this.src='/assets/images/placeholder.png'" class="card-img-top" />
                        <div class="card-body">
                            <a href="/?category={{ $group->category->name }}" class="category-name badge bg-dark text-uppercase text-decoration-none">{{ $group->category->name }}</a>
                            <h5 class="card-title mb-3">{{ $group->name }}</h5>
                            <a href="/group/{{ $group->uri }}" class="btn btn-success btn-group-join w-100">Entrar no Grupo</a>
                        </div>
                    </div>
                    <!--// Card -->
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- // Listing Groups -->

    <section class="d-flex justify-content-center flex-nowrap">
        {{ $groups->onEachSide(3)->links() }}
    </section>

</main>
@endsection