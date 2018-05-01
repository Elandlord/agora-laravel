<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;
use App\Http\Requests\NewsRequest;
use App\Photo;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::all();
        return view('cms.pages.news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cms.pages.news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsRequest $request)
    {
        $news = News::create([
            'title' => $request->get('titel'),
            'body' => $request->get('beschrijving'),
            'author' => $request->get('auteur'),
            'publish_date' => $request->get('publicatiedatum'),
            'occurence_date' => $request->get('aanvangdatum'),
        ]);
        return redirect('cms/news/' . $news->id . '/edit');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $news = News::find($id);

        return view('cms.pages.news.show', compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news = News::find($id);

        $photo = Photo::where([
            ['model_id', $id],
            ['type', 'news']
        ])->first();


        return view('cms.pages.news.edit', compact(
            'news',
            'photo'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NewsRequest $request, $id)
    {
        $news = News::find($id)->update([
            'title' => $request->get('titel'),
            'body' => $request->get('beschrijving'),
            'author' => $request->get('auteur'),
            'publish_date' => $request->get('publicatiedatum'),
            'occurence_date' => $request->get('aanvangdatum'),
        ]);

        return redirect('cms/news');
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
        return redirect('cms/news');
    }
}
