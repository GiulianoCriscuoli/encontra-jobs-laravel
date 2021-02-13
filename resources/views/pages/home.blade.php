@extends('layouts.app')

<div  id="top-container"class="container-fluid">
    <h1 id="main-title" class="text-center">Aqui você encontra a vaga dos seus sonhos</h1>
    <p id="main-subtitle" class="text-center">Somos o site com mais vagas de programadores do mercado, direcionado para o trabalho remoto.</p>
    <form id="search-form" class="form-inline" action="">
        <div class="form-group col-md-10">
            <input type="text" class="form-control" id="job-form" placeholder="Informe a vaga que está buscando..." />
        </div> 

        <div class="col-md-2">
            <button type="submit" class="btn btn-warning">Procurar</button>
        </div>
    </form>
</div>
@section('content')
<main>
    <div id="jobs-container" class="container">
        <div class="row">
            <div class="col-md-12" id="content">
                <h2 id="job-list-title">Veja as nossas vagas em destaque</h2>
                <ul id="job-list" class="list-group">
                    @foreach($jobs as $job)
                        <li class="list-group-item new-job">
                            <img src="img/home.svg"  alt="{{$job->nameCompany}}"/>
                            <p>{{ $job->name }}</p>
                            <h2>{{ $job->title }}</h2>
                            <p>$RS {{ $job->salary }}</p>
                            <span class="new-job-label">Nova</span>
                            <a href="{{ route('jobs.show', $job->id)}}" class="btn btn-primary">Ver vaga</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</main>
@endsection
