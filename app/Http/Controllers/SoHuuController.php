<?php

namespace App\Http\Controllers;

use App\Models\SoHuu;
use Illuminate\Http\Request;

class SoHuuController extends Controller
{
    public function index(){
        $sohuu = SoHuu::all();
        return view('sohuu.index',['sohuu'=>$sohuu]);
    }
    public function create(){
        return view('sohuu.create');
    }
    public function store(Request $request){
        $request->validate([
            'tenchusohuu'=>'required',
        ]);
        SoHuu::create([
            'tenchusohuu' => $request->input('tenchusohuu'),
        ]);
        return redirect('/Admin/sohuu')->with('message','Thêm thành công!');
    }
    public function edit($id){
        $sohuu = SoHuu::findOrFail($id);
        return view('sohuu.update',['sohuu'=>$sohuu]);
    }
    public function update(Request $request, $id){
        $request->validate([
            'tenchusohuu'=>'required',
        ]);
        $sohuu = SoHuu::findOrFail($id);
        $sohuu->tenchusohuu = $request->input('tenchusohuu');
        $sohuu->save();
        return redirect('/Admin/sohuu')->with('sohuu',$sohuu);
    }
    public function delete($id){
        $sohuu = SoHuu::findOrFail($id);
        $sohuu->delete();
        return view('sohuu.index');
    }
}
