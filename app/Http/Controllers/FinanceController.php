<?php

namespace App\Http\Controllers;

use App\Finance;
use App\Location;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Validator;
class FinanceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $finances=Finance::All();
        return view('Proprietaire.finance.index',compact('finances'));
    }
    public function create()
    {
        $location=Location::All();
        return view('Proprietaire.Finance.create',compact('location'));
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'loyer' => 'required|integer',
            'TVA' => 'required|between:0,10',
            'type' => 'required',
            'location' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $finance=new Finance();
        $finance->montant =$request->loyer;
        $finance->TVA =$this->TVA($request->TVA,$request->loyer);
        $finance->type =$request->type;
        $finance->location_id =$request->location;
        $finance->date=Carbon::now();
      //  $finance->assu =$request->assu;
      //  $finance->status =$request->status;
        $finance->save();
        $request->session()->flash('status','Sauvegardé avec succès');
        return redirect()->route('finances.index');
    }
    public function edit(Finance $finance)
    {
        $location=Location::All();
        return view('Proprietaire.finance.update',compact('finance','location'));
    }
    public function update(Request $request, Finance $finance)
    {
        $validator = Validator::make($request->all(), [
             'loyer' => 'integer',
            'TVA' => 'between:0,10',

          ]);
          if ($validator->fails()) {
              return back()->withErrors($validator)->withInput();
           }
        $finance->update([
            'montant' =>$request->loyer,
            'TVA' =>$request->TVA,
            'status'=>$request->status,
            'type' =>$request->type,
           // 'assu'=>$request->assu,
           // 'location' =>$request->location,
        ]);
        $request->session()->flash('status','Sauvegardé avec succès');
        return redirect()->route('finances.index');
    }
    public function destroy(Finance $finance)
    {
        try {
            $finance->delete();
        } catch (\Exception $e) {
            abort(404);
        }
        session()->flash('status','Supprimer avec succès');
        return redirect()->to(route('finances.index'));
    }
    public function TVA($porcentage,$loyer){
        $prix=$porcentage*$loyer/100;
        return $prix;
    }
    public function updatstat(Request $request,$id){
        $fin=Finance::find($id);
        $fin->status=$request->status;
        $fin->save();
        session()->flash('status','Sauvegardé avec succès');
        return back();
    }

}
