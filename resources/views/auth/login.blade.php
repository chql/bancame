@extends('layout')

@section('title') Login @endsection

@section('css')
    @parent
    <link rel="stylesheet" href="/css/auth.css">
@endsection

@section('navigation')
    <li class="breadcrumb-item" aria-current="page"><a href="{{ route('home') }}">Página inicial</a></li>
    <li class="breadcrumb-item active" aria-current="page">Login</li>
@endsection

@section('content')
    <div id="auth-container" class="container">
        <h1>Login</h1>
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
        <form id="login-form" method="post">
            <div class="form-group">
                <label for="username">Usuário</label>
                <input type="text" name="username" class="form-control">
            </div>
            <div class="form-group">
                <label for="password">Senha</label>
                <input type="password" class="form-control" name="password">
            </div>
            {{ csrf_field() }}
            <input type="submit" value="Login" class="btn btn-lg btn-primary">
        </form>
    </div>
@endsection
