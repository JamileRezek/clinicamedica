@extends('templates.template')

@section('content')


<!-- Página do crud  -->
    <div id="content" class="p-4 p-md-5 pt-5">
    <h1 class="text-center">Lista de Procedimentos Medicos Cadastrados</h1><hr>

    <div class="text-center">
        <a href="{{'procedimentomedico/create'}}">
            <button class="btn btn-success mt-3 mb-4">Cadastrar Procedimento Medico</button>
        </a>
    </div>

    <div class="col-12 m-auto">
        @csrf
        <table class="table text-center">
            <thead class="thead-dark">
              <tr>
                <th scope="col">Id</th>
                <th scope="col">Procedimento</th></th></th>
                <th scope="col">Medico</th>
                <th scope="col">Ação</th>
              </tr>
            </thead>
            <tbody>
                
                @foreach ($procedimentoMedico as $procedimentoMedicos)
                    @php
                        //$paciente=$pacientes->find($pacientes->id)->relPacientes;
                        $procedimento=$procedimentoMedicos->find($procedimentoMedicos->id)->relProcedimento;

                        $medico=$procedimentoMedicos->find($procedimentoMedicos->id)->relMedico;
                    @endphp
                    <tr>
                        
                        <td>{{$procedimentoMedicos->id}}</td>
                        <td>{{$procedimento->nome}}</td>
                        <td>{{$medico->nome}}</td>
                        <td>
                            <a href="{{url("procedimentomedico/$procedimentoMedicos->id")}}">
                                <button class="btn btn-dark">Visualizar</button>
                            </a>
                            <a href="{{url("procedimentomedico/$procedimentoMedicos->id/edit")}}">
                                <button class="btn btn-primary">Editar</button>
                            </a>
                            <form action="{{route('procedimentomedico.destroy', $procedimentoMedicos->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Deletar</button>
                            </form>
                        </td>
                      </tr>
                @endforeach
                    
            </tbody>
          </table>
          
    </div>
</div>
@endsection