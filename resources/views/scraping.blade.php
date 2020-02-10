@extends('layouts/main')

@section('title', 'Pesquisar Artigos.')

@push('styles')
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
@endpush
@section('body-content')

    <div class="container mt-5">
    <h4>Bem vindo {{ session()->get('user') }}.</h4>

    <!--ALERT-->
        @include('partials/_msg')

        <!--ALERT VALIDAÇÃO USUÁRIO-->
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mt-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="/pesquisatitulo" method="POST">
        @csrf
            <div class="form-group">
                <label>Pesquise por Título</label>
                <input type="text" name="titulo" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Pesquisar</button>
        </form>
    </div>

    @parent
@endsection

