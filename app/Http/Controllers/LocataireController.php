<?php

namespace App\Http\Controllers;

use App\Intervention;
use App\Locataire;
use Illuminate\Http\Request;
use App\Invitation;
use App\Mail\InviteCreated;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL;
use Session;
use Illuminate\Http\Response;
use Validator;
if(!isset($_SESSION))
    {
        session_start();
    }



class LocataireController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $locataires=Locataire::all();
        return view('proprietaire.locataire.index',compact('locataires'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('proprietaire.locataire.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|alpha',
            'prenom' => 'required|alpha',
            'date' => 'required|date',
            'identite' => 'required|max:10',
            'email' => 'required|email',
            'tele' => 'required|regex:/(0)[0-9]{9}/',
            "adresse" => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

       $locataire=new Locataire();
       $locataire->name=$request->name;
       $locataire->prenom=$request->prenom;
       $locataire->date=$request->date;
       $locataire->identite=$request->identite;
       $locataire->email=$request->email;
       $locataire->user_id=Auth::user()->id;
       $locataire->tele=$request->tele;
       $locataire->adresse=$request->adresse;
       if($locataire->save()){
            Session::put('invit', $locataire->id);
            if ($request->invit==1) {
                do {
                    $token = Str::random(12);
                }
                while (Invitation::where('token', $token)->first());
                $invite=new Invitation();
                $invite->email = $request->email;
                $invite->token = $token;
                $invite->locataire_id =Session::get('invit');
                $invite->save();
                Mail::to($request->email)->send(new InviteCreated($invite));
                $request->session()->flash('invit','Invitation envoyé avec succès');
           }
       }
        $request->session()->flash('status','Sauvegardé avec succès');
        return redirect()->to(route('locataires.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Locataire  $locataire
     * @return \Illuminate\Http\Response
     */
    public function show(Locataire $locataire)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Locataire  $locataire
     * @return \Illuminate\Http\Response
     */
    public function edit(Locataire $locataire)
    {
        return view('proprietaire.locataire.update',compact('locataire'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Locataire  $locataire
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Locataire $locataire)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'alpha',
            'prenom' => 'alpha',
            'date' => 'date',
            'identite' => 'max:10',
            'email' => 'email',
            "adresse" => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $locataire->update([
        'name' =>$request->name,
        'prenom' =>$request->prenom,
        'date' =>$request->date,
        'identite' =>$request->identite,
        'email' =>$request->email,
        'tele' =>$request->tele,
        'adresse' =>$request->adresse
        ]);
        $request->session()->flash('status','Sauvegardé avec succès');
        return redirect()->to(route('locataires.index'));
    }


    public function destroy(Locataire $locataire)
    {
        if($locataire->location){
            session()->flash('error','Le Locataire ne peut pas être supprimé. Veuillez supprimer la Location d’abord.');
        }else{
            $locataire->delete();
            session()->flash('status','Supprimer avec succès');
        }
        return redirect()->to(route('locataires.index'));
    }
    public function process($id)
    {
         do {
             //generate a random string using Laravel's str_random helper
             $token = Str::random(12);
         } //check if the token already exists and if it does, try again
         while (Invitation::where('token', $token)->first());
         $locataire=Locataire::find($id);
         //create a new invite record
         $invite = Invitation::create([
             'email' => $locataire->email,
             'token' => $token,
             'locataire_id' =>$locataire->id,
         ]);
        Mail::to($locataire->email)->send(new InviteCreated($invite));
       session()->flash('status','Invitation envoyé avec succès');
        return redirect()->to(route('locataires.index'));
    }

    public function reinvite($id)
    {
         $invite=Invitation::findorfail($id);
         Mail::to($invite->email)->send(new InviteCreated($invite));
        session()->flash('status','Invitation réenvoyé avec succès');
         return back();
    }

    public function indexinter()
    {
        $inter=Intervention::all();
        return view('proprietaire.Intervention.index',compact('inter'));
    }
    public function updatstatus(Request $request,$id){
        $fin=Intervention::find($id);
        $fin->statu=$request->status;
        $fin->save();
        session()->flash('status','Sauvegardé avec succès');
        return back();
    }







}
