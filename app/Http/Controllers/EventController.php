<?php

namespace App\Http\Controllers;

use App\Event;
use App\Tag;
use App\Photo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests\EventRequest;
class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::all();

        return view('cms.pages.event.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $tags = Tag::all();

        return view('cms.pages.event.create', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventRequest $request)
    {
        $event = Event::create([
            'title' => $request->get('titel'),
            'location' => $request->get('locatie'),
            'date' => $request->get('datum'),
            'description' => $request->get('beschrijving'),
            'time_start' => $request->get('starttijd'),
            'time_end' => $request->get('eindtijd'),
            'price' => $request->get('prijs'),
        ]);

        foreach($request->get('tag') as $tag){
            $event->tags()->attach($tag); 
        }

        return redirect('cms/event/' . $event->id . '/edit');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Event::find($id);
        return view('cms.pages.event.show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Event::find($id);
        $event_tags = $event->tags; // get all tags from event
        $tags = Tag::all(); // get all tags

        $not_selected = $tags->diff($event_tags); // alle niet-geselecteerde tags

        $selected = $event_tags->diff($not_selected); // alle geselecteerde tags

        $photo = Photo::where([
            ['model_id', $id],
            ['type', 'event']
        ])->first();


        return view('cms.pages.event.edit', compact(
            'event',
            'photo',
            'selected',
            'not_selected'
            ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EventRequest $request, $id)
    {
        Event::find($id)->update([
            'title' => $request->get('titel'),
            'location' => $request->get('locatie'),
            'date' => $request->get('datum'),
            'description' => $request->get('beschrijving'),
            'time_start' => $request->get('starttijd'),
            'time_end' => $request->get('eindtijd'),
            'price' => $request->get('prijs'),
        ]);

        Event::find($id)->tags()->detach();

        if(isset($request->get('tag')[0])){
            foreach($request->get('tag') as $tag){
                Event::find($id)->tags()->attach($tag); 
            }
        }

        
        
        

        return redirect('cms/event');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Event::find($id)->delete();
        return redirect('cms/event');
    }
}
