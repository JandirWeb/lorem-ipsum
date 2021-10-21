<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Projeto;

class projetoController extends Controller
{

    public function index(){

        $projetos = Projeto::all();

        return view('welcome', ['projetos' => $projetos]);
    }
    
    public function create(){
        return view('projetos.create');
    }

    public function store(Request $request){

        $projeto = new Projeto;

        $projeto->name = $request->name;
        $projeto->dataIni = $request->dataIni;
        $projeto->dataFim = $request->dataFim;
        $projeto->valor = $request->valor;
        $projeto->risco = $request->risco;
        $projeto->participantes = $request->participantes;

        $projeto->save();

        return redirect('/')->with('msg', 'Projeto cadastrado com sucesso!');
    }

    public function edit($id){

        $projeto = Projeto::findOrFail($id);

        return view('projetos.edit', ['projeto' => $projeto]);
    }

    public function update(Request $request){

        Projeto::findOrFail($request->id)->update($request->all());

        return redirect('/')->with('msg', 'Projeto editado com sucesso!');

    }

    public function destroy($id){

        Projeto::findOrFail($id)->delete();

        return redirect('/')->with('msg', 'Projeto excluído com sucesso!');

    }
}
