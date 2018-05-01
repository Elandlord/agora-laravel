<?php

namespace App;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HasPhotos;

class Event extends Model
{
    use HasPhotos;

	protected $appends = [
		'year',
		'month',
		'day',
		'month_name',
    'thumbnail',
    'day_name',
	];

    protected $fillable = [
      'title',
      'location',
      'date',
      'description',
      'time_start',
      'time_end',
      'price',
    ];

    protected $months = [
      '01' => 'januari',
      '02' => 'februari',
      '03' => 'maart',
      '04' => 'april',
      '05' => 'mei',
      '06' => 'juni',
      '07' => 'juli',
      '08' => 'augustus',
      '09' => 'september',
      '10' => 'oktober',
      '11' => 'november',
      '12' => 'december',
    ];

    public function tags()
    {
      return $this->belongsToMany('App\Tag');
    }

    public function getDayNameAttribute() {
      setlocale(LC_TIME, 'Dutch');
      $date = Carbon::createFromDate($this->year, $this->month, $this->day);
      return $date->formatLocalized('%A');
    }

    public function getYearAttribute()
    {
    	return explode('-', $this->date)[0];
    }

    public function getMonthAttribute()
    {
    	return explode('-', $this->date)[1];
    }


	public function getDayAttribute()
    {
    	return explode('-', $this->date)[2];
    }

    public function getMonthNameAttribute(){
    	return $this->months[$this->month];
    }

    public function photo() {
        return Photo::where([
            ['model_id', $this->id],
            ['type', 'event'],
        ])->first();
    }

    public function getThumbnailAttribute()
    {
        if($this->photo() != null){
            return "/images/event/{$this->id}/16x11/{$this->photo()->filename}";
        }else{
            return "https://www.bakkerijkosters.nl/afbeeldingen/geen_afbeelding_beschikbaar_gr.gif";
        }

    }

    public function getSquareAttribute()
    {
        if($this->photo() != null){
            return "/images/event/{$this->id}/1x1/{$this->photo()->filename}";
        }else{
            return "https://www.bakkerijkosters.nl/afbeeldingen/geen_afbeelding_beschikbaar_gr.gif";
        }

    }
}
