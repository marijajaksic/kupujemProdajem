<?php

namespace App\Http\Controllers;

use App\Models\Kategorija;
use App\Models\Proizvod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class KategorijeController extends Controller
{
    public function all(){
        $kategorije=Kategorija::all();
        $proizvodi= Proizvod::all();
        foreach ($kategorije as $kategorija){
            $add=[];
            foreach ($proizvodi as $proizvod){
                if($proizvod->kategorije_id==$kategorija->id){
                    if(count($add)>3){
                        break;
                    }
                    $add[count($add)]=$proizvod;
                }
            }
            $kategorija->proizvodi=$add;
        }
        return view('pocetna', [
            'kategorije'=>$kategorije
        ]);

    }
    public function view($id){
        $kategorija= Kategorija::findOrFail($id);
        $proizvodi= Proizvod::all();
        $add=[];
        foreach ($proizvodi as $proizvod) {
            if ($proizvod->kategorije_id == $kategorija->id) {
                $add[count($add)] = $proizvod;
            }
        }
        $kategorija->proizvodi=$add;
        return view('kategorija',['kategorija'=>$kategorija]);

    }
    public function create(Request $request){
        $kategorija= new Kategorija();
        $kategorija->naziv=$request->naziv;
        $kategorija->save();
        return redirect('/'.$request->id);
    }
    public function save(Request $request){

        $validator = Validator::make($request->all(), [
            'naziv'=>'required|min:2'
        ]);

        if ($validator->fails()) {
            return response()->json(["message"=>"Naziv je obavezan i mora biti veci od 2 karaktera"],400);
        }
        $kategorija= Kategorija::create($request->all());
        return response()->json($kategorija, 201);
    }
    public function delete(Request $request, $id){
        $kategorija=Kategorija::find($id);
        if(is_null($kategorija)){
            return response()->json(["message"=>"Kategorija ne postoji!"],404);
        }

        $kategorija->delete();
        return response()->json(null,204);
    }
    public function getAll(){
        $kategorije=Kategorija::all();
        $proizvodi=Proizvod::all();
        foreach ($kategorije as $kategorija) {
            $add=[];
            foreach ($proizvodi as $proizvod) {
                if ($proizvod->kategorije_id == $kategorija->id){
                    $add[count($add)]=$proizvod;
                }
            }
            $kategorija->proizvodi=$add;
        }

        return response()->json($kategorije,200);
    }
    public function getById($id){
        $kategorija=Kategorija::find($id);
        $proizvodi=Proizvod::all();
        if(is_null($kategorija)){
            return response()->json(["message"=>"Kategorija ne postoji!"],404);
        }
        $add=[];
        foreach ($proizvodi as $proizvod) {
            if ($proizvod->kategorije_id == $kategorija->id){
                $add[count($add)]=$proizvod;
            }
        }
        $kategorija->proizvodi=$add;
        return response()->json($kategorija,200);
    }
}
