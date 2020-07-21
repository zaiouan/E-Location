<?php

namespace App\Http\Controllers;
use App\Invitation;
use App\Locataire;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class InviteController extends Controller
{

    public function showRegistrationForm($token)
    {
             $invitation = Invitation::where('token', $token)->firstOrFail();
             $email = $invitation->email;
             $locataire=Locataire::where('email',$email)->first();
             return view('register-invite', compact('email','locataire'));
    }

    public function validator(array $data)
    {
        return Validator::make($data, [
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }
    public function update(array $data)
    {
        return Locataire::update([
            'password' => Hash::make($data['password']),
        ]);
    }
    public function updateLocataire(Request $request,$id)
    {
        $this->validator($request->all())->validate();
        DB::table('locataires')
            ->where('id', $id)
            ->update(['password' => Hash::make($request->get('password'))]);
        $locataire=Locataire::find($id);
        Invitation::whereId($locataire->invitation->id)->update([
            'status' => 'connecter',
        ]);
        return redirect()->to('/login/locataire');
    }
}
