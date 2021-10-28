<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use App\Models\SoHuu;
use Illuminate\Http\Request;

class BusController extends Controller
{
    public function index(){
        $bus = Bus::all();
        return view('bus.index',['bus'=>$bus]);
    }
    public function create(){
        $sohuu = SoHuu::all();
        return view('bus.create',['sohuu'=>$sohuu]);
    }
    public function store(Request $request){
        $request->validate([
            'tenxe'=>'required',
            'diemdau'=>'required',
            'diemcuoi'=>'required',
            'id_sohuu'=>'required'
        ]);
        Bus::create([
            'tenxe' => $request->input('tenxe'),
            'diemdau' => $request->input('diemdau'),
            'diemcuoi' => $request->input('diemcuoi'),
            'id_sohuu' => $request->input('id_sohuu'),
        ]);
        return redirect('/Admin/bus')->with('message','Thêm thành công!');
    }
    public function edit($id){
        $sohuu = SoHuu::all();
        $bus = Bus::findOrFail($id);
        return view('bus.update',['bus'=>$bus,'sohuu'=>$sohuu]);
    }
    public function update(Request $request, $id){
        $bus = Bus::findOrFail($id);
        $request->validate([
            'tenxe'=>'required',
            'diemdau'=>'required',
            'diemcuoi'=>'required',
            'id_sohuu'=>'required'
        ]);
        $bus->tenxe = $request->input('tenxe');
        $bus->diemdau = $request->input('diemdau');
        $bus->diemcuoi = $request->input('diemcuoi');
        $bus->id_sohuu = $request->input('id_sohuu');
        $bus->save();
        return redirect('/Admin/bus')->with('bus',$bus);
    }
    public function delete($id){
        $bus = Bus::findOrFail($id);
        $bus->delete();
        return view('Admin/bus');
    }
}
