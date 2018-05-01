<?php

namespace App\Classes;

class Iterator
{
  private $data;
  private $counter = 1;

  public function __construct($data)
  {
    $this->data = $data;
  }


  public function next()
  {
    if($this->counter <= count($this->data)) {
      $this->counter ++;
    }
  }

  public function __get($attribute)
  {
    if(!isset($this->data[$this->counter])) {
      return 'GEEN TEKST GEPLAATST';
    }
    return $this->data[$this->counter]->$attribute;
  }

}