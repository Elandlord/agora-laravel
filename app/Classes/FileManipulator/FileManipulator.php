<?php 
namespace App\Classes\FileManipulator;


class FileManipulator
{
	private $file;
	private $handle;
	private $lineCount = 0;


	public function __construct($file)
	{
		$this->file = $file;
	}

	private function handle()
	{
		if(file_exists($this->file)) {

			$this->handle = fopen($this->file, "r");	

		}
	}

	private function closeHandle()
	{
		fclose($this->handle);
	}

	private function findNumberOfLines() 
	{
		
	}

	private function incrementLineCount()
	{
		$this->lineCount++;
	}

	private function getNextLine()
	{
		return fgets($this->handle);
	}

	private function simple($callback)
	{

	}


	private function handler($callback, $returnType = null)
	{	
		$temp = "";

		if($returnType == 'array') {
			$temp = [];
		}

		$this->handle();

		while(!feof($this->handle)){
		  	$this->incrementLineCount();
		  	$value = $callback($this->getNextLine(), $this->lineCount);
			if($value != "" && $value != false) {
				if(is_array($value)) {
					array_push($temp, $value);
				}else{
					$temp = $value;
				}
			}

		}

		$this->closeHandle();
		return $temp;
	}

	public function insertAt($lineNumber, $content){
		$lines = file( $this->file , FILE_IGNORE_NEW_LINES );
		$lines[$lineNumber-1] = $content;
		file_put_contents( $this->file , implode( "\n", $lines ) );
	}

	public function replace($search, $replacement){
		$contentLines = collect($this->findContentLines($search));

		$contentLines->each(function($contentLine) use ($replacement) {

			$this->insertAt($contentLine[0], $replacement);
		});
	}


	public function findContentLines($search)
	{
		return $this->handler(function($line, $lineCount) use ($search) {
			if (strpos( $line, $search ) !== false) {
				return [
					$lineCount,
				];
			}
		}, 'array');
	}

	public function has($content) 
	{	
		return $this->handler(function($line) use ($content){
			if($content != "" && strpos($line, $content ) !== false) {
				return true;
			}
			return false;
		});
	}

	public function contentByLineNumber($number)
	{	
		return $this->handler(function($line, $lineCount) use ($number) {
			if($number == $lineCount) {
				return $line;
			}
			return null;
		});
	}


}