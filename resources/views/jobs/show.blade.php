@extends('layouts.app')

@section('content')
<div id="job-view-container" class="container">
    <div class="row text-center">
        <a class="back-link main-color" href="{{ route('home') }}">Voltar</a>
       
        <div class="col-md-12" id="job-content">
         <h1 class="main-color"></h1>
            <p class="bold">Quem a empresa está buscando:</p>
            <p><span class="job-desc">{{ $job->description }}</span></p>
            <p><span class="bold">O salário é de: {{ $job->salary }}</span>R$</p>
            <p>
                Para trabalhar na empresa <span class="bold main-color">{{ $job->nameCompany }}</span>.
                Envie um email para <a href="mail:to">{{ $job->email }}</a>
            </p>
        </div>
    </div>
</div>
@endsection