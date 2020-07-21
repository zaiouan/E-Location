<?php

namespace App\Http\Controllers;


use App\Finance;
use App\Intervention;
use App\Inbox;
use App\Locataire;
use App\Location;
use App\Notifications\Message;
use App\User;
use Illuminate\Http\Request;
use Auth;
use Validator;


class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:locataire');
    }

    public function indexprop()
    {
        $user = Locataire::where('id', Auth::guard('locataire')->id())->get();
        return view('locataire.indexPro', compact('user'));
    }

    public function indexloc()
    {
        $locations = Location::where('locataire_id', Auth::guard('locataire')->id())->get();
        return view('locataire.indexLocation', compact('locations'));
    }

    public function indexfin()
    {
        if(!isset(Auth::guard('locataire')->user()->location->id)){
            $finances=[];
            return view('locataire.finance.index', compact('finances'));
        }else{
            $finances = Finance::where('location_id', Auth::guard('locataire')->user()->location->id)->get();
        return view('locataire.finance.index', compact('finances'));
        }

    }

    public function index()
    {
        $messages = Inbox::where('loc_id', Auth::guard('locataire')->user()->id)->get();
        return view('locataire.inbox.index', compact('messages'));
    }

    public function store2(Request $request)
    {
        $msg = new Inbox();
        $msg->subject = $request->sub;
        $msg->message = $request->msg;
        $msg->user_id = $request->loc;
        $msg->loc_id = Auth::guard('locataire')->user()->id;
        if($msg->save()){
            $prp = User::find($request->loc);
            $prp->notify(new Message($request->sub,$request->msg,Auth::guard('locataire')->user()->id));
        }
        $request->session()->flash('status','Sauvegardé avec succès');
        return redirect()->route('messages1.index');
    }

    public function create2()
    {
        $loc = Locataire::where('id', Auth::guard('locataire')->user()->id)->get();
        return view('locataire.inbox.create', compact('loc'));
    }

    public function index1()
    {
        $inter = Intervention::where('loct_id', Auth::guard('locataire')->user()->id)->get();
        return view('locataire.intervention.index', compact('inter'));
    }

    public function create1()
    {
        $loc = Location::all();
        return view('locataire.intervention.create', compact('loc'));
    }

    public function store1(Request $request)
    {
        $inter = new Intervention();
        $interM = new Inbox();
        $inter->subject = $request->sub;
        $inter->desc = $request->desc;
        $inter->type = $request->type;
        $inter->date = $request->date;
        $inter->lct_id = $request->lct_id;
        $inter->loct_id = Auth::guard('locataire')->user()->id;
        $interM->subject = 'Nouvelle intervention pour LOCATION ' . $request->lct_id;
        $interM->message = '';
        $interM->user_id = $request->id;
        $interM->loc_id = Auth::guard('locataire')->user()->id;
        if ($inter->save()) {
            if ($interM->save()) {
                $prp = User::find($request->id);
                $prp->notify(new \App\Notifications\Intervention($interM->subject, Auth::guard('locataire')->user()->id));
            }
        }
        $request->session()->flash('status','Sauvegardé avec succès');
        return redirect()->route('interventions.index');
    }

    public function indexprofile(){
        $locataire=Auth::guard('locataire')->user();
        return view('proprietaire.locataire.update',compact('locataire'));
    }

    public function Updateprofile(Request $request,$id)
    {
        $locataire=Locataire::find($id);
        $locataire->update([
            'name' =>$request->name,
            'prenom' =>$request->prenom,
            'date' =>$request->date,
            'identite' =>$request->identite,
            'email' =>$request->email,
            'tele' =>$request->tele,
            'adresse' =>$request->adresse
        ]);
        return '\locataire';
    }

    public function showL($id)
    {
        $msg=Inbox::find($id);
        return view('locataire.inbox.repondreL',compact('msg'));
    }

    public function showL2($id)
    {
        $msg=Inbox::find($id);
        return view('locataire.inbox.repondreL2',compact('msg'));
    }

    public function repondreL (Request $request){
        $validator = Validator::make($request->all(), [
            'msg' => 'required|min:10|max:100',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $msg = new Inbox();
        $msg->subject= 'Intervention pour la location'.$request->id;
        $msg->message=$request->msg;
        $msg->user_id = $request->loc;
        $msg->loc_id = Auth::guard('locataire')->user()->id;
        if ($msg->save()) {
            $prp = User::find($request->loc);
            $prp->notify(new Message($request->sub, $msg->msg, Auth::guard('locataire')->user()->id));
        }
        $request->session()->flash('status', 'Envoyé avec succès');
        return redirect()->route('messages1.index');
    }
    public function ajoutmsg (Request $request){
        $validator = Validator::make($request->all(), [
            'sub' => 'required',
            'msg' => 'required|min:10|max:100',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $msg = new Inbox();
        $msg->subject= $request->sub;
        $msg->message=$request->msg;
        $msg->user_id = $request->loc;
        $msg->loc_id = Auth::guard('locataire')->user()->id;
        if ($msg->save()) {
            $prp = User::find($request->loc);
            $prp->notify(new Message($request->sub, $msg->msg, Auth::guard('locataire')->user()->id));
        }
        $request->session()->flash('status', 'Envoyé avec succès');
        return redirect()->route('messages1.index');
    }


}
