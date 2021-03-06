@extends('templates.template')

@section('content')

@if(isset($errors) && count($errors)>0)
    <div class="text-center mt-4 mb-4 p-2 alert-danger">
        @foreach ($errors->all() as $erro)
          {{$erro}}<br>
        @endforeach
    </div>
  @endif
  @if (isset($estoque))
  <form class="col-6 m-auto" action="{{url("estoque/$estoque->id")}}" name="formEdit" id="formEdit" method="POST">
      @method('PUT')
  @else
  <form class="col-6 m-auto" action="{{url('estoque')}}" name="formCad" id="formCad" method="POST">

  @endif
  @csrf

<form class="col-6 m-auto">
  <h1 class="text-center">@if(isset($estoque))Editar @else Cadastrar @endif</h1><hr>

  <div class="form-row">
    <div class="form-group col-md-6">
        <label for="nome">Nome</label>
        <input type="text" class="form-control" id="nome" placeholder="Nome" name="nome"
        value="{{old('nome')}}">
      </div>
    
  </div>
  


  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="descricao">Descrição</label>
      <input type="text" class="form-control" id="descricao" placeholder="Descrição" name="descricao"
      value="{{old('descricao')}}">
    </div>

    <div class="form-group col-md-6">
        <label for="quantidade">Quantidade</label>
        <input type="number" class="form-control" id="quantidade" placeholder="Quantidade" name="quantidade"
        value="{{old('quantidade')}}">
      </div>


      <div class="form-group col-md-6">
        <label for="valor">Valor</label>
        <input type="double" class="form-control" id="valor" placeholder="Valor" name="valor"
        value="{{old('valor')}}">
      </div>


      <div class="form-group col-md-7">
        <label for="nomeAdministradora">Administradora</label>
      <select class="form-control" type="text" name="nomeAdministradora" id="nomeAdministradora">
        <option value="{{$estoque->relAdministradora->id ?? ''}}">{{$estoque->relAdministradora->nome ?? 'Selecione'}}</option>
        @foreach ($administradora as $administradoras)
          <option value="{{$administradoras->id}}">{{$administradoras->nome}}</option>
        @endforeach

      </select>
      </div>

      <div class="form-group col-md-4">
        <label for="tipo">Tipo</label>
        <select id="tipo" name="tipo" class="form-control">
          <option selected>{{old('tipo')}}</option>
          <option value="Tipo 1">Tipo 1</option>
          <option value="Tipo 2">Tipo 2</option>
          <option value="Tipo 3">Tipo 3</option>
        </select>
        
      </div>

      

      
  
  </div>

  <input class="btn btn-primary" type="submit" value="@if(isset($estoque))Editar @else Cadastrar @endif">

</form>



<a href="{{url('estoque')}}">
  <button class="btn btn-primary">Voltar</button>
</a>


@endsection