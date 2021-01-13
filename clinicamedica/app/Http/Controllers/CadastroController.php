<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cadastra;
use App\Models\Paciente;
use App\Models\Secretaria;
use App\Models\Administradora;

class CadastroController extends Controller
{
    private $objCadastra;
    private $objPaciente;
    private $objSecretaria;
    private $objAdministradora;

    public function __construct()
    {
        $this->objCadastra=new Cadastra();
        $this->objPaciente=new Paciente();
        $this->objSecretaria=new Secretaria();
        $this->objAdministradora=new Administradora();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cadastro=$this->objCadastra->all();
        return view('cadastro.index',compact('cadastro'));

        //dd($this->objCadastra->all());
        //dd($this->objPaciente->all());
        //dd($this->objSecretaria->all());
        //dd($this->objAdministradora->all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
