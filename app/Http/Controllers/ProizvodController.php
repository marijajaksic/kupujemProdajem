<?php

namespace App\Http\Controllers;

use App\Models\Proizvod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProizvodController extends Controller
{
    public function view($id){

        $pieces = explode("/", url()->current());
        $proizvod= Proizvod::findOrFail($pieces[count($pieces)-1]);
        return view('proizvod',['proizvod'=>$proizvod]);

    }
    public function create(Request $request){
        $proizvod= new Proizvod();
        $proizvod->naslov=$request->naslov;
        $proizvod->opis=$request->opis;
        $proizvod->cena=$request->cena;
        $proizvod->korisnik=$request->korisnik;
        $proizvod->url=$request->url;
        $proizvod->broj_telefona=$request->broj_telefona;
        $proizvod->kategorije_id=$request->kategorije_id;
        $proizvod->save();
        return redirect('/'.$request->kategorije_id.'/'.$request->id);
    }
    public function getAll(){

        return response()->json(Proizvod::all(),200);
    }
    public function getById($id){
        $proizvod=Proizvod::find($id);
        if(is_null($proizvod)){
            return response()->json(["message"=>"Proizvod ne postoji!"],404);
        }
        return response()->json($proizvod,200);
    }
    public function save(Request $request){

        $validator = Validator::make($request->all(), [
            'naslov'=>'required|min:2',
            'opis'=>'required|min:2',
            'cena'=>'required|min:2',
            'korisnik'=>'required|min:2',
            'url'=>'required|min:2',
            'broj_telefona'=>'required',
            'kategorije_id'=>'required',

        ]);

        if ($validator->fails()) {
            return response()->json(["message"=>"Sva polja su obavezna"],400);
        }
        $proizvod= Proizvod::create($request->all());
        return response()->json($proizvod, 201);
    }
    public function delete(Request $request, $id){
        $proizvod= Proizvod::find($id);

        if(is_null($proizvod)){
            return response()->json(["message"=>"Proizvod ne postoji!"],404);
        }
        $proizvod->delete();
        return response()->json(null,204);
    }
}
