<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Subject;
use App\Request as TableRequest;

class RequestController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); //autentica user logado
    }

    public function index() //pagina inicial de request
    {
        $subjects = Subject::all();
        $requests = TableRequest::join('subjects','requests.subject_id','=','subjects.id')
                                ->select('requests.id', 'requests.description', 'requests.date', 'requests.subject_id','subjects.name','subjects.price')
                                ->where('requests.user_id',Auth::user()->type)
                                ->orderBy('requests.date','desc')->orderBy('subjects.name','asc')
                                ->get();
        return view('/request.index')->with('requests', $requests)->with('subjects', $subjects);
    }

    public function create() //pagina de criar request
    {
        if(Auth::user()->type == 1){
            $subjects = Subject::orderBy('name')->get();
            return view('/request/create')->with('subjects', $subjects);
        }
    }

    public function store(Request $request) //Salva no BD
    {
        $validatedData = $request->validate([ //Valida dados
            'user_id' => 'required|exists:users,id',
            'subject_id' => 'required|exists:subjects,id',
            'description' => 'required',
            'date' => 'required|date',
        ]);
        TableRequest::create($request->all());
        session()->flash('mensagem', 'Requerimento criado com sucesso!');
		return redirect()->route('request.index');
    }

    public function edit(TableRequest $request) //Pagina de editar request
    {
        $subjects = Subject::all();
        return view('request.edit')->with('request',$request)->with('subjects',$subjects);
    }

    public function update(Request $request, $req) //Atualiza tupla no BD
    {   
        $validatedData = $request->validate([ //Valida dados
            'subject_id' => 'required|exists:subjects,id',
            'description' => 'required',
            'date' => 'required|date',
        ]);
        $New = TableRequest::findOrFail($req);
        $New->subject_id = $request->subject_id;
        $New->date = $request->date;
        $New->description = $request->description;
        $New->save();
        session()->flash('mensagem', "Requerimento atualizado com sucesso!");
        return redirect()->route('request.index');
    }

    public function destroy(TableRequest $request) //apaga tupla
    {
        $request->delete();
        session()->flash('mensagem', 'Requerimento excluido com sucesso!');
        return redirect()->route('request.index');
    }
}
