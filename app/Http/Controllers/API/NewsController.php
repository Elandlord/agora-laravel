<?php
        
namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\News;

class NewsController extends Controller
{
    /**
        * Display a listing of the resource.
        *
        * @return \Illuminate\Http\Response
        */
    public function index()
    {
        
        $objects = News::all();
        
        return response()->json($objects);
    }
    
    /**
        * Show the form for creating a new resource.
        *
        * @return \Illuminate\Http\Response
        */
    public function create()
    {
        //
    }
    
    /**
        * Store a newly created resource in storage.
        *
        * @param  \Illuminate\Http\Request  $request
        * @return \Illuminate\Http\Response
        */
    public function store(Request $request)
    {
        $object = News::create($request->all());
        return response()->json($object, 200);
    }
    
    /**
        * Display the specified resource.
        *
        * @param  int  $id
        * @return \Illuminate\Http\Response
        */
    public function show($id)
    {
        //
    }
    
    /**
        * Show the form for editing the specified resource.
        *
        * @param  int  $id
        * @return \Illuminate\Http\Response
        */
    public function edit($id)
    {
        $object = News::find($id);
        return response()->json($object, 200);
    }
    
    /**
        * Update the specified resource in storage.
        *
        * @param  \Illuminate\Http\Request  $request
        * @param  int  $id
        * @return \Illuminate\Http\Response
        */
    public function update(Request $request, $id)
    {
        News::find($id)->update($request->all());
        return response()->json([], 200);
    }
    
    /**
        * Remove the specified resource from storage.
        *
        * @param  int  $id
        * @return \Illuminate\Http\Response
        */
    public function destroy($id)
    {
        News::find($id)->delete();
        return response()->json([], 200);
    }

    public function search(Request $request){
        $search = "%". $request->input('search') . "%";
        $news = News::where("title", "LIKE", $search)->get();
        return response()->json($news);
    }
}