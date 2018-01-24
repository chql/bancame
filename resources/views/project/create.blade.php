@extends('layout')

@section('title') Novo projeto @endsection

@section('css')
    <link rel="stylesheet" href="/css/project.css">
@endsection

@section('javascript')
    <script src="https://cdn.ckeditor.com/4.8.0/standard/ckeditor.js"></script>
@endsection

@section('navigation')
    <li class="breadcrumb-item" aria-current="page"><a href="{{ route('home') }}">Página inicial</a></li>
    <li class="breadcrumb-item" aria-current="page"><a href="{{ route('projects') }}">Projetos</a></li>
    <li class="breadcrumb-item active" aria-current="page">Novo projeto</li>
@endsection

@section('script')<script>CKEDITOR.replace( 'project-editor', { language: 'pt-br' } );</script>@endsection

@section('content')
    <h1>Novo projeto</h1>
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
    <form action="" method="post" id="newproject-form">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="title">Título do projeto</label>
                    <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                </div>
            </div>
            <div class="col-md-3">
                <label for="cost">Custo</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">R$</div>
                    </div>
                    <input type="numeric" step="0.01" class="form-control" name="cost" value="{{ old('cost') }}">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="deadline">Prazo</label>
                    <input type="date" class="form-control" name="deadline" value="{{ old('deadline') }}">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div>
                <label for="content">Descrição do projeto</label>
            </div>
            <textarea name="content" id="project-editor" class="form-control">{{ old('content') }}</textarea>
        </div>
        {{ csrf_field() }}
        <input type="submit" class="btn btn-lg btn-primary" value="Submeter projeto">
    </form>
@endsection