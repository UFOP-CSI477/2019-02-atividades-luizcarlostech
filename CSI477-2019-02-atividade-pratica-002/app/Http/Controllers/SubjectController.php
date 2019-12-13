<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Subject;
use App\Request as TableRequest;

class SubjectController extends Controller
{
    public function __construct()
    {
        // Valida usuario autenticado
        $this->middleware('auth');
    }

    public function index()
    {
        if(Auth::user()->type == 1){    //Somente acesso a administradores
            $subjects = Subject::all();
            $requests = TableRequest::all();
            return view('subject.index')->with('subjects', $subjects)->with('requests', $requests);
        }else{
            session()->flash('mensagem', 'Acesso restrito a administradores!');
            return redirect()->route('home');
        }
    }

    public function create() //Pagina de criar subject
    {
        if(Auth::user()->type == 1){   //Somente acesso a administradores
            $subjects = Subject::all();
            return view('subject.create')->with('subjects', $subjects);
        }else{
            session()->flash('mensagem', 'Acesso restrito a administradores!');
            return redirect()->route('home');
        }
    }

    public function store(Request $request) //Salva no BD
    {
        $validatedData = $request->validate([ //Valida dados
            'name' => 'required',
            'price' => 'required',
        ]);
        Subject::create($request->all()); 
        session()->flash('mensagem', 'Protocolo criado com sucesso!');
		return redirect()->route('subject.index');
    }

    public function edit(Subject $subject) //pagina de editar subject
    {
        return view('subject.edit')->with('subject',$subject);
    }

    public function update(Request $request, $sub) //Update no BD
    {
        $validatedData = $request->validate([ //Valida dados
            'name' => 'required',
            'price' => 'required',
        ]);
        $New = Subject::findOrFail($sub); //Procura a tupla a ser editada
        $New->name = $request->name;
        $New->price = $request->price;
        $New->save(); 
        session()->flash('mensagem', "Protocolo atualizado com sucesso!");
        return redirect()->route('subject.index');
    }

    public function destroy(Subject $subject) //Apaga tupla
    {
        $subject->delete();
        session()->flash('mensagem', 'Protocolo excluido com sucesso!');
        return redirect()->route('subject.index');
    }
}
