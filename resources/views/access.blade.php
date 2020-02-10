@extends('layouts/main')

@section('title', 'Pesquisar Artigos.')

{{-- @push('styles')
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
@endpush --}}

@section('navbar')
@endsection

@section('body-content')

    <div class="">
        <div class="container mt-5">
            <!--ALERT VALIDAÇÃO USUÁRIO-->
            @if ($errors->any())
            <div class="alert alert-danger w-50">
                <ul class="mt-2">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <ul class="nav nav-pills mb-3 justify-content-center" id="pills-tab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-acesso" role="tab" aria-controls="pills-acesso" aria-selected="true">Acesso</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-registro" role="tab" aria-controls="pills-registro" aria-selected="false">Registro</a>
            </li>
            </ul>
            <div class="tab-content row d-flex justify-content-center mb-3" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-acesso" role="tabpanel" aria-labelledby="pills-acesso-tab">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title text-center">Acesso à WebScraping</h5>
                        <form action="/validaUserForm" method="GET">
                        @csrf
                            <div class="form-group">
                                <label for="usuario">Usuário</label>
                                <input type="text" name="user" class="form-control" placeholder="Entre com seu usuário">
                            </div>
                            <div class="form-group">
                                <label for="senha">Senha</label>
                                <input type="password" name="password" class="form-control" placeholder="Entre com sua senha">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Entrar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="pills-registro" role="tabpanel" aria-labelledby="pills-registro-tab">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title text-center">Registre-se à WebScraping</h5>
                        <form action="/registerUserForm" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="usuario">Usuário</label>
                                <input type="text" name="user" class="form-control" placeholder="Entre com seu usuário">
                            </div>
                            <div class="form-group">
                                <label for="senha">Senha</label>
                                <input type="password" name="password" class="form-control" placeholder="Entre com sua senha">
                            </div>
                            <div class="form-group">
                                <label for="senha">Confirme a senha</label>
                                <input type="password" name="confpassword" class="form-control" placeholder="Confirme a sua senha">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Registrar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            </div>
        </div>
        <div class="w-25 m-auto">
            <!--ALERT-->
                @include('partials/_msg')
            </div>
    </div>

    @parent
@endsection

@section('footer')
@endsection

@push('script-bottom')
    <script></script>
@endpush


{{-- <div class="container my-5">
<form action="/validaUserForm" method="POST">
    @csrf
    <input class="form-control" type="text" name="user">
    <input class="form-control" type="password" name="password">
    <button class="btn btn-primary" type="submit">Entrar</button>

</form>
</div>


<div class="container my-5">
<form action="/registerUserForm" method="get">
    @csrf
    <input class="form-control" type="text" name="user">
    <input class="form-control" type="password" name="password">
    <input class="form-control" type="password" name="confpassword">
    <button class="btn btn-primary" type="submit">Entrar</button>

</form>
</div> --}}
