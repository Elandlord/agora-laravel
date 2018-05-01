<?php 

namespace App\Classes;

use File;

/**
 * Class for controlling templates
 */
class Template 
{
	public $file;
	public $location;
	public $name;
	
	private $normalizeRules = [
		'.html' => '',
		'-' => ' ',
		'.php' => '',
	];

	private function normalize($value)
	{

		foreach($this->normalizeRules as $normalizeRule => $replaceValue) {
			$value = str_replace($normalizeRule, $replaceValue, $value);
		}

		return $value;
	}

	public function __construct($file)
	{
		if (!file_exists($file)) {
			abort(404, 'File not found.');	
		}

		$this->location = $file->getPath() . '/' . $file->getFileName();
		$this->name = $this->normalize($file->getFileName());
		$this->contents = File::get($file);
	}

	public function render()
	{	

	}

}