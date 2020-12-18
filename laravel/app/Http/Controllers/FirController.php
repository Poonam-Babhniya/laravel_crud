<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\FirController;
use App\Models\Fir;
use Illuminate\Support\Facades\DB;


class FirController extends Controller
{
    public function show(){
    	$firs=Fir::all();

    	return view('list')->with(compact('firs'));
    }
    public function addFir(){
    	return view('add');
    }
    public function saveFir(Request $request){
    	$validator=Validator::make($request->all(),[
    		'cname'=> 'required|max:225',
    		'mno'=> 'required',
    		'address'=> 'required',
    		'caname'=> 'required',
    		'cano'=> 'required',
    		
    	]);
    	if($validator->passes()){
    		$firs= new Fir;
    		$firs->cname = $request->cname;
    		$firs->mno = $request->mno;
    		$firs->address = $request->address;
    		$firs->caname = $request->caname;
    		$firs->cano = $request->cano;
    		$firs->save();

    		$request->session()->flash('msg','Fir saved successfully');
    		return redirect ('firs');

    	}else{
    		return redirect('firs/add')->withErrors($validator)->withInput();
    	}

    }
    public function editFir($id,Request $request){
    	$fir=Fir::where('id',$id)->first();
    		if(!$fir){
    		$request->session()->flash('errorMsg','Record not found');
    		return redirect ('firs');
    	}
    	return view('edit')->with(compact('fir'));

    }
     public function updateFir($id,Request $request){
     	$validator=Validator::make($request->all(),[
    		'cname'=> 'required|max:225',
    		'mno'=> 'required',
    		'address'=> 'required',
    		'caname'=> 'required',
    		'cano'=> 'required',

    	]);
    	if($validator->passes()){
    		//insert record in db
    		$firs=Fir::find($id);
    		$firs->cname = $request->cname;
    		$firs->mno = $request->mno;
    		$firs->address = $request->address;
    		$firs->caname = $request->caname;
    		$firs->cano = $request->cano;
    		$firs->save();

    		$request->session()->flash('msg','list updated successfully');
    		return redirect ('firs');

    	}else{
    		return redirect('firs/edit/'.$id)->withErrors($validator)->withInput();
    		//return with error

    	}

    }
    public function deleteFir($id,Request $request){
    $fir=Fir::where('id',$id)->first();
    	if(!$fir){
    		$request->session()->flash('errorMsg','Record not found');
    		return redirect ('firs');
    	}
    	Fir::where('id',$id)->delete();
    	$request->session()->flash('msg','Record has been deleted successfully');
    	return redirect ('firs');
    }
}