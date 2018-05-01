<?php
namespace App\Classes;

use Illuminate\Support\Facades\Storage;

class files{

  private $fileName;
  private $map;

  public function __construct($fileName, $map)
  {
    $this->fileName = $fileName;
    $this->map = $map;
  }

  public function getType()
  {
    $allowedTypes = array(IMAGETYPE_PNG, IMAGETYPE_JPEG, IMAGETYPE_GIF);
    $detectedType = exif_imagetype(public_path() . $this->getUrl());
    if(in_array($detectedType, $allowedTypes)) {
      return $this->getUrl();
    } else {
      return '/images/cms/' . $this->getExtension() . '.png';
    }
  }

  public function getUrl()
  {

    $parts = explode('/', Storage::url($this->map->id . '/' . $this->getFileName()));
    array_shift($parts);
    array_shift($parts);
    array_shift($parts);
    $parts = implode('/', $parts);

    return '/' . $parts;
  }

  public function getExtension()
  {
    $parts = explode('.', $this->fileName);
    return $parts[count($parts) - 1];
  }

  public function getFileName()
  {
    $parts = explode('/', $this->fileName);

    return $parts[count($parts) - 1];
  }

  public function setFileName($fileName)
  {
    $this->fileName = $fileName;
  }

  public function getMapId()
  {
    return $this->mapId;
  }

  public function setMapId($mapId)
  {
    $this->mapId = $mapId;
  }

}