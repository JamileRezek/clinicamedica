<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TecnicoSaude extends Model
{
    protected $table='tecnicos_saude';
    protected $fillable = ['cpf','uf','longradouro','bairro','salario','especialidade','cep','contato','email','foto','complemento','nome','rg','cidade'];

    //OBS: NÃO TEM MAIS NENHUMA MASCARA PARA COLOCAR

    //Retorna (0,N) Relatorio Paciente
    public function relRelatorio()
    {
        return $this->hasMany('App\Models\Relatorio', 'fk_tecnico_saude');
    }

    //Retorna (1,N) Despesa Financeira
    public function relDespesaFinanceira()
    {
        return $this->hasMany('App\Models\DespesaFinanceira', 'fk_tecnico_saude');
    }

    //Retorna (1,N) ProcedimentoTecnico
    public function relProcedimentoTecnico()
    {
        return $this->hasMany('App\Models\ProcedimentoTecnico', 'fk_tecnico');
    }


    //OK - CERTO
    public function getCpfAttribute()
    {
        //999.777.555-66
        $cpf=$this->attributes['cpf'];
        $cpf=str_replace('.', '', $cpf);
        $cpf=str_replace('-', '', $cpf);
        $cpf=str_replace(' ', '', $cpf);

        return substr($cpf, 0, 3). '.' .substr($cpf, 3, 3). '.' .substr($cpf, 6, 3). '-' .substr($cpf, -2);
    }

    //OK - CERTO
    public function getContatoAttribute()
    {
        //(95) 8112-4455
        $contato=$this->attributes['contato'];
        $contato=str_replace('(', '', $contato);
        $contato=str_replace(')', '', $contato);
        $contato=str_replace('-', '', $contato);
        $contato=str_replace(' ', '', $contato);

        return "(" . substr($contato, 0, 2) . ") " . substr($contato, 2, 4) . "-". substr($contato, -4);

    }

    //OK - CERTO
    public function getCepAttribute()
    {
        //44556-999
        $cep=$this->attributes['cep'];
        $cep=str_replace('-', '', $cep);

        return substr($cep, 0, 5). "-". substr($cep, -3);

    }

    //OK - CERTO
    public function getRgAttribute()
    {
        //09.666.777-11
        $rg=$this->attributes['rg'];
        $rg=str_replace('.', '', $rg);
        $rg=str_replace('-', '', $rg);

        return substr($rg, 0, 2). '.' .substr($rg, 2, 3). '.' .substr($rg, 5, 3). '-' .substr($rg, -2);

    }

}
