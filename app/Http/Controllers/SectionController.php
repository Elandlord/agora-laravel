<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;


// Models

use File;
use App\Page;
use App\Classes\Slot;
use App\Section;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page = Page::all();
        return view('cms.core.sections.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pages = Page::pluck('name', 'id');
        return view('cms.core.sections.create', compact('pages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $section = Section::create($request->all());
        return redirect('cms/page/' . $section->page_id . '/edit');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('cms.core.sections.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $section = Section::find($id);
        $sectionSlots = $section->page->availableSlots();

        // de huidige page_position er aan toevoegen
        if($section->page_position != 0) {
            $slot = new Slot();
            $slot->position = $section->page_position;
            $slot->setPage($section->page);
            $sectionSlots->prepend($slot);
        }

        $data = [
            'section' => $section,
            'page_positions' => $sectionSlots->pluck('position', 'position'),
        ];

        return view('cms.core.sections.edit', compact('data'));
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
        $section = Section::find($id);
        $section->update($request->all());
        return redirect('cms/page/' . $section->page_id . '/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $section = Section::find($id);
        $page_id = $section->page_id;
        $section->delete();
        return redirect('cms/page/' . $page_id . '/edit');
    }
}
