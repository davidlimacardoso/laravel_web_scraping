@extends('layouts/main')

@section('title', 'Resultado da Pesquisa.')

@section('body-content')

<div class="container mt-5">
    <h3>Resultados da pesquisa: "{{$keyword}}"</h3>
</div>
    <div class="container my-5">
    <!--ALERT-->
        @include('partials/_msg')

        <div class="row">

        @foreach ( array_combine($title, $url) as $titulo => $link)

        <div class="col-sm-6 my-2">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $titulo }}</h5>
                    <a href="{{ $link }}" class="btn btn-primary">Ver artigo</a>
                </div>
            </div>
        </div>
        @endforeach
        </div>
    </div>
    @parent
@endsection

