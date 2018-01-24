@extends('layout')

@section('title') Projetos @endsection

@section('css')
    <link rel="stylesheet" href="/css/project.css">
@endsection

@section('navigation')
    <li class="breadcrumb-item" aria-current="page"><a href="{{ route('home') }}">Página inicial</a></li>
    <li class="breadcrumb-item active" aria-current="page">Projetos</li>
@endsection

@section('content')
    <form action="" method="get" class="form">
        <div class="form-row">
            <div class="col">
                <input type="text" name="q" class="form-control form-control-lg block" value="{{ $q }}" placeholder="Buscar projetos..." autofocus="true">
            </div>
            <div class="col">
                <input type="submit" value="buscar" class="btn btn-lg btn-primary">
            </div>
        </div>
    </form>
    <div class="container projects-container">
        <table class="table table-striped">
            <thead>
                <tr>
                    <td>Projeto</td>
                    <td>Autor</td>
                    <td>Valores</td>
                    <td>Prazo</td>
                </tr>
            </thead>
            <tbody>
                @foreach($projects as $p)
                    <tr>
                        <td><a href="{{ route('display', ['id'=>$p->id]) }}">{{ $p->title }}</a></td>
                        <td>{{ $p->author->name }}</td>
                        <td>R$ {{ sprintf("%.2f", $p->donated_amount()/100.0) }} / R$ {{ sprintf("%.2f", $p->cost/100.0) }}</td>
                        <td>{{ date_format(date_create($p->deadline), 'd/m/Y') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection