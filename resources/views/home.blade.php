@extends('layout')

@section('title') Página inicial @endsection

@section('css')
    @parent
    <link rel="stylesheet" href="/css/home.css">
@endsection

@section('navigation')
    <li class="breadcrumb-item active" aria-current="page">Página inicial</li>
@endsection

@section('content')
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="title m-b-md">BancaMe</div>
            <div class="links">
                <a href="{{ route('projects') }}">Projetos</a>
                @if (Route::has('login'))
                    @auth
                        <a href="{{ route('newproject') }}">Criar projeto</a>
                        <a href="{{ route('logout') }}">Sair</a>
                    @else
                        <a href="{{ route('login') }}">Entrar</a>
                        <a href="{{ route('register') }}">Cadastre-se</a>
                    @endauth
                @endif
            </div>
        </div>
    </div>
@endsection