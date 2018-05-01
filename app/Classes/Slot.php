<?php
namespace App\Classes;

use App\Section;

class Slot
{
	public $position;
	private $page;

    public function setPage($page)
    {
        $this->page = $page;
    }

	public static function slotSpaces($page)
    {
    	$totalSlotSpaces =  substr_count( $page->getContents() , 'text-inject' );
    	$slotSpaces = [];

    	for($i = 0; $i <= $totalSlotSpaces; $i++) {
    		if ($i != 0) {
    			$slot = new Slot();
    			$slot->position = $i;
    			$slot->page = $page;
	    		$slotSpaces[$i] = $slot;
    		}
    	}

    	return collect($slotSpaces);
    }

    public function isAvailable()
    {

    	$section = Section::where([
    		['page_id', $this->page->id],
    		['page_position', $this->position]
    	])->get();

    	return $section->isEmpty();
    }

}