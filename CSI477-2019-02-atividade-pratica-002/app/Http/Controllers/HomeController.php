<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Request as TableRequest;
use App\User;
use App\Subject;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //Geral não necessita autenticação, todas as outras sim
        $this->middleware('auth',['except'=>['geral']]);
    }

    
    public function index()
    {
        return view('home');
    }

    public function geral()
    {
        $subjects = Subject::orderBy('name')->get();
        return view('/geral/geral')->with('subjects', $subjects);
    }
}
