<?php

namespace App\Http\Controllers;

use App\Http\Requests\MedicoRequest;
use App\Models\Medico;

class MedicoController extends Controller
{
    private $objMedico;

    public function __construct()
    {
        $this->objMedico=new Medico();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medico=$this->objMedico->all();
        return view('medico.index',compact('medico'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $medicos=$this->objMedico->all();
        return view('medico.create',compact('medicos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MedicoRequest $request)
    {
        $cad=$this->objMedico->create([
            'sexo'=>$request->sexo,
            'cidade'=>$request->cidade,
            'email'=>$request->email,
            'bairro'=>$request->bairro,
            'salario'=>$request->salario,
            'complemento'=>$request->especialidade,
            'cep'=>$request->cep,
            'contato'=>$request->contato,
            //'email'=>$request->email,
            'foto'=>$request->foto,
            'nome'=>$request->nome,
            'rg'=>$request->rg,
            'cpf'=>$request->cpf,
            'longradouro'=>$request->longradouro,
            'uf	'=>$request->uf	,
            'datanascimento'=>$request->datanascimento,
            'crm'=>$request->crm,
            'crmuf'=>$request->crmuf,
            'especialidade'=>$request->especialidade,
            
            
            
        ]);
        if($cad){
            return redirect('medico');
        }
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $medico= $this->objMedico->find($id);
        return view('medico.show',compact('medico'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $medico=$this->objMedico->find($id);
        return view('medico.edit',compact('medico'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MedicoRequest $request, $id)
    {
        $this->objMedico->where(['id'=>$id])->update([
            'sexo'=>$request->sexo,
            'cidade'=>$request->cidade,
            'email'=>$request->email,
            'bairro'=>$request->bairro,
            'salario'=>$request->salario,
            'complemento'=>$request->especialidade,
            'cep'=>$request->cep,
            'contato'=>$request->contato,
            'email'=>$request->email,
            'foto'=>$request->foto,
            'nome'=>$request->nome,
            'rg'=>$request->rg,
            'cpf'=>$request->cpf,
            'longradouro'=>$request->longradouro,
            'uf'=>$request->uf,
            'datanascimento'=>$request->datanascimento,
            'crm'=>$request->crm,
            'crmuf'=>$request->crmuf,
            'especialidade'=>$request->especialidade,
            
            
            
        ]);
            return redirect('medico');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!$medico = $this->objMedico->where('id',$id)->first()){
            return redirect()->back();  
          }
          $medico->delete();
          return redirect('medico');
       //dd("deletando a consulta $id");

    }
}
