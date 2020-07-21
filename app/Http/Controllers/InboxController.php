<?php

namespace App\Http\Controllers;

use App\Intervention;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Auth;
use App\Inbox;
use App\Locataire;
use App\User;
use App\Notifications\Message;
use Validator;

class InboxController extends Controller
{
    public function indexpro()
    {
        $messages = Inbox::where('user_id', Auth::user()->id)->get();
        return view('proprietaire.inbox.index', compact('messages'));
    }


    public function updateInbox(Request $request)
    {
        $mId = $request->msgId;

        $update = Inbox::where('id', $mId)->update(['status' => 0]);

        if ($update) {
            echo "Status Update successfully";
        }
    }

    public function store1(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'loc' => 'required',
            'sub' => 'required',
            'msg' => 'required|min:10|max:100',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $msg = new Inbox();
        $msg->subject = $request->sub;
        $msg->message = $request->msg;
        $msg->user_id = Auth::user()->id;
        $msg->loc_id = $request->loc;
        if ($msg->save()) {
            $locataire = Locataire::find($request->loc);
            $locataire->notify(new Message($request->sub, $request->msg, $request->loc));
        }
        $request->session()->flash('status', 'Envoyé avec succès');
        return redirect()->route('messages.index');
    }

    public function create1()
    {
        $loc = Locataire::where('user_id', Auth::user()->id)->get();
        return view('proprietaire.inbox.create', compact('loc'));

    }

    public function show($id)
    {
        $msg=Inbox::find($id);
        return view('proprietaire.inbox.repondre',compact('msg'));
    }

    public function show3($id)
    {
        $msg=Inbox::find($id);
        return view('proprietaire.inbox.repondreL3',compact('msg'));
    }

    public function repondre (Request $request){
        $validator = Validator::make($request->all(), [
            'msg' => 'required|min:10|max:100',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $msg = new Inbox();
        $msg->subject= 'Intervention pour la location'.$request->id;
        $msg->message=$request->msg;
        $msg->user_id = Auth::user()->id;
        $msg->loc_id = $request->loc;
        if ($msg->save()) {
            $locataire = Locataire::find($request->loc);
            $locataire->notify(new Message($request->sub, $msg->subject, $request->loc));
        }
        $request->session()->flash('status', 'Envoyé avec succès');
        return redirect()->route('messages.index');
    }


}
