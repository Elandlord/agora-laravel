<?php 

namespace  App\Classes;

use File;

class FileHelper
{

	private $files;
	private $contents;

	public function getFiles()
	{
		return $this->files;
	}

	private function __construct($files){ 
		$this->files = $files;
	}

	public static function getFilesFromDirectory($dir)
	{			
		$filesInDirectory = collect(File::allFiles(trim(base_path() . $dir)))
		->filter(function($file) use ($dir) {
			return $file->getPath() == trim( base_path() . $dir );
		});

		return new FileHelper($filesInDirectory);	
	}	

	public static function getFileContents($directory, $filename)
	{
		$filePath = trim(base_path() . $directory); 
        $fileLocation = sprintf($filePath . '%s' . $filename, '/');
        if ( !file_exists( $fileLocation ) ) {
            return "";
        }

        return File::get($fileLocation);
	}
	

}