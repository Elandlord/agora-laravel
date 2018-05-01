<?php 

namespace App\Classes\PhotoUploader;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Carbon\Carbon;
use App\Photo;
use Image;

class PhotoUploader {

	private $id;
	private $fileName;
	private $modelType;
	private $modelId;
	private $directory;

	public function __construct()
	{

	}

	public function create(Request $request) 
	{	
		$this->modelType = $request->get('model_type');
		$this->modelId = $request->get('model_id');
		$file = $request->file('file');

		// generate a unique filename
		$this->generateUniqueFileName($file);

		// builds the directory where the image is stored.
		$this->buildDirectory();


		if($request->get('multi')) {
			$photo = Photo::create([
				'filename' => $this->fileName,
				'type' => $this->modelType,
				'model_id' => $this->modelId,
			]);
		} else {
			$photo = Photo::updateOrCreate(
				['type' => $this->modelType, 'model_id' => $this->modelId],
				['filename' => $this->fileName]
			);
		}

		// create the image 
		$this->createImage($file);
		return $photo;
	}




	private function createImage(UploadedFile $file)
	{
		Image::make($file)->encode('png', 35)->save($this->directory() . $this->fileName);
	}


	private function generateUniqueFileName(UploadedFile $file)
	{
		$this->fileName = Carbon::now()->toDateString() . ' ' .Carbon::now()->second . '-' . $file->getClientOriginalName();
	}

	private  function buildDirectory()
	{
		$directory = $this->directory();
		// make the directory
		if(!is_dir($directory)) {		
			mkdir($directory, 0777, true);
		}
		// return the directory
		$this->directory = $directory;
	}


	private function directory()
	{
		return public_path() . '/images/' . $this->modelType . '/' . $this->modelId . '/';
	}

}