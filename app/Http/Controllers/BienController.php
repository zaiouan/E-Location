<?php

namespace App\Http\Controllers;

use App\Bien;
use Illuminate\Http\Request;
use Validator;
use Auth;

class BienController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $biens = Bien::All();
        return view('Proprietaire.Bien.index', compact('biens'));
    }

    public function create()
    {
        return view('Proprietaire.Bien.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'ref' => 'required|between:5,20|unique:biens',
            'tdb' => 'required',
            'adresse' => 'required|max:100|min:10',
            'surface' => 'required|integer',
            'ndc' => 'required|integer',
            'description' => 'required|between:15,100',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $bien = new bien();
        $bien->ref = $request->ref;
        $bien->tdb = $request->tdb;
        $bien->surface = $request->surface;
        $bien->ndc = $request->ndc;
        $bien->description = $request->description;
        $bien->adresse = $request->adresse;
        $bien->user_id = Auth::user()->id;
        $bien->save();
        $request->session()->flash('status','Sauvegardé avec succès');
        return redirect()->route('biens.index');
    }

    public function show(Bien $bien)
    {
        //
    }

    public function edit(Bien $bien)
    {
        return view('proprietaire.bien.update', compact('bien'));
    }


    public function update(Request $request, Bien $bien)
    {
        $validator = Validator::make($request->all(), [
            'tdb' => 'required',
            'adresse' => 'required|max:100|min:10',
            'surface' => 'required|integer',
            'ndc' => 'required|integer',
            'description' => 'required|min:15|max:100',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $bien->update([
            'tdb' => $request->tdb,
            'adresse' => $request->adresse,
            'surface' => $request->surface,
            'ndc' => $request->ndc,
            'description' => $request->description,
            'tele' => $request->tele
        ]);
        $request->session()->flash('status','Sauvegardé avec succès');
        return redirect()->to(route('biens.index'));
    }


    public function destroy(Bien $bien)
    {
        if($bien->location){
            session()->flash('error','Le Bien ne peut pas être supprimé. Veuillez supprimer la Location d’abord.');
        }else{
            $bien->delete();
            session()->flash('status','Supprimer avec succès');
        }
        return redirect()->route('biens.index');
    }
}
