<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\ArticleController;
use App\Models\Article;
use Illuminate\Support\Facades\DB;


class ArticleController extends Controller
{
    public function show(){
    	//$articles=DB::table('articles')->orderBy('id','DESC')->get();
    	$articles=Article::all();

    	return view('list')->with(compact('articles'));
    }
    public function addArticle(){
    	

    	return view('add');

    }
    public function saveArticle(Request $request){
    	$validator=Validator::make($request->all(),[
    		'name'=> 'required|max:225',
    		'description'=> 'required',

    	]);
    	if($validator->passes()){
    		//insert record in db
    		$article= new Article;
    		$article->name = $request->name;
    		$article->description = $request->description;
    		$article->save();

    		$request->session()->flash('msg','list saved successfully');
    		return redirect ('articles');

    	}else{
    		return redirect('articles/add')->withErrors($validator)->withInput();
    		//return with error

    	}
    	
    }
    
    public function editArticle($id,Request $request){
    	//fetch a record from database
    	$article=Article::where('id',$id)->first();
    	if(!$article){
    		$request->session()->flash('errorMsg','Record not found');
    		return redirect ('articles');
    	}
    	

    	return view('edit')->with(compact('article'));
    	

    }
    public function updateArticle($id,Request $request){
    	$validator=Validator::make($request->all(),[
    		'name'=> 'required|max:225',
    		'description'=> 'required',

    	]);
    	if($validator->passes()){
    		//insert record in db
    		$article=Article::find($id);
    		$article->name = $request->name;
    		$article->description = $request->description;
    		$article->save();

    		$request->session()->flash('msg','list updated successfully');
    		return redirect ('articles');

    	}else{
    		return redirect('articles/edit/'.$id)->withErrors($validator)->withInput();
    		//return with error

    	}

    }
    public function deleteArticle($id,Request $request){
    	$article=Article::where('id',$id)->first();
    	if(!$article){
    		$request->session()->flash('errorMsg','Record not found');
    		return redirect ('articles');
    	}
    	Article::where('id',$id)->delete();
    	$request->session()->flash('msg','Record has been deleted successfully');
    	return redirect ('articles');
    }
}
