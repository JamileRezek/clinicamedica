<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medicamento;
use App\Models\Medico;
class MedicamentoController extends Controller
{

    private $objMedicamento;
    private $objMedico;


    public function __construct()
    {
        $this->objMedicamento=new Medicamento();
        $this->objMedico=new Medico();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medicamento=$this->objMedicamento->all();
        return view('medicamento.index',compact('medicamento'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $medicamento=$this->objMedicamento->all();
        return view('medicamento.create', compact('medicamento'));

        $medico=$this->objMedico->all();
        return view('medico.create', compact('medico'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cad=$this->objMedicamento->create([
            'nome'=>$request->nome,
            'dose'=>$request->dose,
            'descricao'=>$request->descricao,
            'fk_medico'=>$request->fk_medico
            
        ]);
        if($cad){
            return redirect('medicamento');
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
        $medicamento= $this->objMedicamento->find($id);
        return view('medicamento.show',compact('medicamento'));

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
