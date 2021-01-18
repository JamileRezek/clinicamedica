<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paciente;
use App\Models\Convenio;
class PacienteController extends Controller
{
    private $objPaciente;
    private $objConvenio;

    public function __construct()
    {
        $this->objPaciente=new Paciente();
        $this->objConvenio=new Convenio();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paciente=$this->objPaciente->all();
        return view('paciente.index',compact('paciente'));
        //return view('paciente.sidebar');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $paciente=$this->objPaciente->all();
        $convenio=$this->objConvenio->all();
        return view('paciente.create', compact('paciente'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cad=$this->objPaciente->create([
            //21
            'sexo'=>$request->sexo,
            'cidade'=>$request->cidade,
            'email'=>$request->email,
            'complemento'=>$request->complemento,
            'cpf'=>$request->cpf,
            'rg'=>$request->rg,
            'nome'=>$request->nome,
            'longradouro'=>$request->longradouro,
            'contato'=>$request->contato,
            'bairro'=>$request->bairro,
            'uf'=>$request->uf,
            'cep'=>$request->cep,
            'data_nascimento'=>$request->data_nascimento,
            'foto'=>$request->foto,
            'altura'=>$request->altura,
            'pressao'=>$request->pressao,
            'numero'=>$request->numero,
            'peso'=>$request->peso,
            'nomepai'=>$request->nomepai,
            'nomemae'=>$request->nomemae,
            'fk_convenio'=>$request->fk_convenio
            
        ]);
        if($cad){
            return redirect('paciente');
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
        $paciente= $this->objPaciente->find($id);
        return view('paciente.show',compact('paciente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
