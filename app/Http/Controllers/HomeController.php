<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\DatabaseNotification;

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
    public function index()
    {
        return view('home');
    }
    public function indexprofile()
    {
        return view('proprietaire.Profile.update');
    }
    public function UpdatePass(Request $request){
        $validator = Validator::make($request->all(), [
            'password' => 'confirmed',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $user= Auth::user();
        $user->update([
            'password' => Hash::make($request->password),
        ]);
        $request->session()->flash('status','Sauvegardé avec succès');
        return back();
    }
    public function Updateprofile(Request $request){
        $user= Auth::user();
        $user->update([
            'name' => $request->name,
            'adresse' => $request->adresse,
            'tele' => $request->tele,
            'email' => $request->email,
        ]);
        $request->session()->flash('status','Sauvegardé avec succès');
        return back();
    }
    public function update(Request $request, DatabaseNotification $notification)
    {
        $notification->markAsRead();
        if($request->user()->unreadNotifications->isEmpty()) {
            return redirect()->route('home');
        }
        return back();
    }

}
