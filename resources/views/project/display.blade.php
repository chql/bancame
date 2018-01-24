@extends('layout')

@section('title'){{ $project->title }}@endsection

@section('css')
    <link rel="stylesheet" href="/css/project.css">
@endsection

@section('navigation')
    <li class="breadcrumb-item" aria-current="page"><a href="{{ route('home') }}">Página inicial</a></li>
    <li class="breadcrumb-item" aria-current="page"><a href="{{ route('projects') }}">Projetos</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{ $project->title }}</li>
@endsection

@section('content')
    @if(session('donation'))
        <div class="alert alert-success" role="alert">
            <h3>Sua doação de R$ {{ sprintf("%.2f", session('donation')->value/100.0) }} para esse projeto foi efetuada!</h3>
        </div>
    @endif
    <h2 class="project-title">{{ $project->title }}
        <small class="text-muted">por {{ $project->author->name }}
            <small>| criado em {{ date_format($project->created_at, 'd/m/Y') }}</small>
        </small>
    </h2>
    <div class="row container">
        <div class="col-md-8">
            <div class="container" id="project-content">
                {!! $project->content !!}
            </div>
        </div>
        <div class="project-details col-md-4">
            <h3 class="text-center project-title">Detalhes</h3>
            <h5 class="text-center">R$ {{ sprintf("%.2f", $project->donated_amount()/100.0) }} <small>de</small> R$ {{ sprintf("%.2f", $project->cost/100.0) }}</h5>
            <h6 class="text-center">Prazo {{ date_format(date_create($project->deadline), 'd/m/Y') }}</h6>
            <div class="container project-progress">
                <div class="progress">
                    <div class="progress-bar" style="width: {{ min(100, (int)($project->donated_amount()/($project->cost/100.0))) }}%" role="progressbar"></div>
                </div>
            </div>
            <h4 class="text-center project-title">Ajudar</h4>
            <div class="row">
                <form method="post" action="/projects/{{ $project->id }}/donate" class="form-inline">
                    <div class="col-md-8">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">R$</div>
                            </div>
                            <input type="numeric" step="0.01" class="form-control" name="value">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <input type="submit" value="bancar" class="btn btn-lg btn-success">
                    </div>
                    {{ csrf_field() }}
                </form>
            </div>
        </div>
    </div>
@endsection