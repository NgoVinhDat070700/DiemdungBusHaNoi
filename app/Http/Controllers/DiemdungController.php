<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use App\Models\Diemdung;
use Illuminate\Http\Request;

use function PHPSTORM_META\map;

class DiemdungController extends Controller
{
    public function index(){
        $diemdung = Diemdung::all();
        return view('diemdung.index',['diemdung'=>$diemdung]);
    }
    public function create(){
        $bus = Bus::all();
        return view('diemdung.create',['bus'=>$bus]);
    }
    public function store(Request $request){
        $request->validate([
            'tendiadiem'=>'required',
            'lat'=>'required',
            'lng'=>'required',
            'cactuyen'=>'required'
        ]);
        Diemdung::create([
            'tendiadiem' => $request->input('tendiadiem'),
            'lat' => $request->input('lat'),
            'lng' => $request->input('lng'),
            'cactuyen' => $request->input('cactuyen'),
        ]);
        return redirect('/Admin/diemdung')->with('message','Thêm thành công!');
    }
    public function edit($id){
        $bus = Bus::all();
        $diemdung = Diemdung::findOrFail($id);
        return view('diemdung/update',['diemdung'=>$diemdung,'bus'=>$bus]);
    }
    public function update(Request $request, $id){
        $diemdung = Diemdung::findOrFail($id);
        $request->validate([
            'tendiadiem'=>'required',
            'lat'=>'required',
            'lng'=>'required',
            'cactuyen'=>'required'
        ]);
        $diemdung->tendiadiem = $request->input('tendiadiem');
        $diemdung->lat = $request->input('lat');
        $diemdung->lng = $request->input('lng');
        $diemdung->cactuyen = $request->input('cactuyen');
        $diemdung->save();
        return redirect('/Admin/diemdung')->with('diemdung',$diemdung);
    }
    public function delete($id){
        $diemdung = Diemdung::findOrFail($id);
        $diemdung->delete();
        return view('diemdung.index');
    }
    public function apiData(){
        $mapss = Diemdung::all();
        $maps = array();
        foreach($mapss as $key=>$map){
            $maps[] = (object)array(
                "tendiadiem"=>$map->tendiadiem,
                'lat'=>$map->lat,
                'lng'=>$map->lng,
                'cactuyen'=>$map->cactuyen
            );
        }
        return response()->json($maps);
    }
    public function viewMap(){
        $mapss = Diemdung::all();
        return view('viewMap',['mapss'=>$mapss]);
    }
    public function searchMap(Request $request){
        $query = Diemdung::query();
        if($cactuyen = $request->input('cactuyen')){
            $query->whereRaw("cactuyen LIKE '%".$cactuyen."%'");
        }
        return $query->get();
    }
}
