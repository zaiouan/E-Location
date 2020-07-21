<?php

namespace App\Http\Controllers;

use App\Location;
use Illuminate\Http\Request;
use App\Bien;
use App\Finance;
use App\Locataire;
use Auth;
use Session;
use Validator;
if(!isset($_SESSION))
    {
        session_start();
    }
class LocationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locations=Location::all();
        return view('Proprietaire.Location.index',compact('locations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $biens=Bien::all();
        $locataires=Locataire::all();
        return view('proprietaire.location.create',compact('biens','locataires'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'locataire' => 'required',
            'type1' => 'required',
            'debut' => 'required|date',
            'fin' => 'required|date|after:debut',
            'bien' => 'required',
            'loyer' => 'required|integer',
            'TVA' => 'required|between:0,10',
            "charge" => 'required|integer',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $location=new Location();
        $finance=new Finance();
        $location->locataire_id=$request->locataire;
        $location->type=$request->type1;
        $location->debut=$request->debut;
        $location->fin=$request->fin;
        $location->bien_id=$request->bien;
        $location->user_id=Auth::user()->id;
        if($location->save()){
        Session::put('location_id', $location->id);
        $finance->TVA=$this->TVA($request->TVA,$request->loyer);
        $finance->montant=$request->loyer + $finance->TVA;
        $finance->charge=$request->charge;
        $finance->date=$request->debut;
        $finance->location_id=Session::get('location_id');
        $finance->save();
        }
        $request->session()->flash('status','Sauvegardé avec succès');

         return redirect()->route('locations.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function show(Location $location)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function edit(Location $location)
    {
        $biens=Bien::all();
        $locataires=Locataire::all();
        return view('proprietaire.location.update',compact('location','biens','locataires'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Location $location)
    {
        $location->update([
        'locataire_id'=>$request->locataire,
       'type'=>$request->type1,
        'debut'=>$request->debut,
        'fin'=>$request->fin,
        'bien_id'=>$request->bien,
        'loyer'=>$request->loyer,
        'charge'=>$request->charge,
        'TVA'=>$this->TVA($request->TVA,$request->loyer),
       ]);
        $request->session()->flash('status','Sauvegardé avec succès');
            return redirect()->to(route('locations.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function destroy(Location $location)
    {
        $location->delete();
        session()->flash('status','Sauvegardé avec succès');
        return redirect()->to(route('locations.index'));
    }

    public function TVA($porcentage,$loyer){
        $prix=$porcentage*$loyer/100;
        return $prix;
    }

}
