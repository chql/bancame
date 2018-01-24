@extends('layout')


@section('title') @parent Cadastro @endsection

@section('css')
    @parent
    <link rel="stylesheet" href="/css/auth.css">
@endsection

@section('navigation')
    <li class="breadcrumb-item" aria-current="page"><a href="{{ route('home') }}">Página inicial</a></li>
    <li class="breadcrumb-item active" aria-current="page">Cadastro</li>
@endsection

@section('content')
    <div id="auth-container" class="container">
        <h1>Novo Cadastro</h1>
        @if($errors->any())
            <div class="alert alert-primary">
                Alguns problemas foram encontrados:
                <ul>
                    @foreach($errors->all() as $message)
                        <li>{{ $message }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form id="register-form" method="post">
            <div class="form-group">
                <label for="name">Nome</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}">
            </div>
            <div class="form-group">
                <label for="username">Usuário</label>
                <input type="text" name="username" class="form-control" value="{{ old('username') }}">
            </div>
            <div class="form-group">
                <label for="password">Senha</label>
                <input type="password" name="password" class="form-control">
            </div>
            <div class="form-group">
                <label for="password_confirmation">Confirme a senha</label>
                <input type="password" name="password_confirmation" class="form-control">
            </div>
            {{ csrf_field() }}
            <input type="submit" value="Cadastrar" class="btn btn-lg btn-primary">
        </form>
    </div>
@endsection
