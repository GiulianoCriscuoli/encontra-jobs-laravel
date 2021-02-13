@extends('layouts.app')

@section('content')
<div id="add-form-container" class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center">Divulgue sua vaga na plataforma</h1>
        </div>
        <div id="form-box" class="col-md-12">
            <h2>Preencha os dados necessários</h2>  

            @if($errors->all())
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger">{{ $error }}</div>
                @endforeach
            @endif

            <form method="POST">
                @csrf
                <div class="form-group">
                    <label for="title">Título da vaga:</label>
                    <input type="text"
                    class="form-control"
                    id="title" 
                    name="title"
                    placeholder="Digite o título da vaga"
                     />
                    <small id="titleHelp" class="form-text text-muted">O título é muito importante, seja claro e objetivo!</small>
                </div>
                <div class="form-group">
                    <label for="description">Descrição da vaga:</label>
                    <textarea type="description"
                    class="form-control"
                    id="description"
                    name="description" 
                    placeholder="Descreva as atividades do desenvolvedor..."
                    ></textarea>
                </div>
                <div class="form-group">
                    <label for="nameCompany">Empresa contratante:</label>
                    <input type="text" 
                    class="form-control"
                    id="nameCompany"
                    name="nameCompany"
                    placeholder="Digite a empresa que vai contratar..."
                     />
                </div>
                <div class="form-group">
                    <label for="email">Email para o contato:</label>
                    <input type="email"
                    class="form-control"
                    id="email"
                    name="email"
                    placeholder="Digite o email para contato..."
                    />
                </div>
                <div class="form-group">
                    <label>Salario oferecido:</label>
                    <input type="text"
                    class="form-control"
                    id="salary"
                    name="salary"
                    placeholder="Digite o salário oferecido..."
                     />
                </div>
                {{-- <input type="hidden" name="new_job" value="1" /> --}}
                <button type="submit" class="btn btn-primary">Cadastrar a vaga</button>
            </form>
        </div>
    </div>
</div>
@endsection
