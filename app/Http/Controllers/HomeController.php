<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paciente;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function create()
    {
        $currentUser = Auth::user();

        //dd($currentUser);

        return view('paciente/create');
    } 

    
    public function edit($id)
    {
        return view('paciente/edit',compact('id'));
    } 

    public function delete($id)
    {
        return view('paciente/confirm_delete',compact('id'));
    } 
}
