<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;

class FindSectionsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($slug)
    {

        $parameters = explode('/', $slug);

        $searches = [];

        $prev = "";
        for($i = 0; $i < count($parameters); $i++){
            if($i % 2 == 0){
                $searches[$parameters[$i]] = "";
                $prev = $parameters[$i];
            }else{
                $searches[$prev] = $parameters[$i];
            }
        }

        $page = Page::where(
            $searches
            )->get();


        // $projects = $hours->unique()->map(function($hour){
        //     return $hour->project;
        // })->unique();

        return response()->json($page, 200);
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
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
