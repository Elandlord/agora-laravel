<?php

namespace App;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HasPhotos;

class News extends Model
{
    use HasPhotos;

	protected $appends = [
		'publish_year',
		'publish_month',
		'publish_day',
		'month_name',
        'day_name',
        'landscape',
        'portrait',
	];

    protected $fillable = [
      'title',
      'location',
      'body',
      'author',
      'publish_date',
      'occurence_date',
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

    public function getDayNameAttribute() {
      setlocale(LC_TIME, 'Dutch');
      $date = Carbon::createFromDate($this->publish_year, $this->publish_month, $this->publish_day);
      return $date->formatLocalized('%A');
    }

    public function getPublishYearAttribute()
    {
    	return explode('-', $this->publish_date)[0];
    }

    public function getPublishMonthAttribute()
    {
    	return explode('-', $this->publish_date)[1];
    }


	public function getPublishDayAttribute()
    {
    	return explode('-', $this->publish_date)[2];
    }

    public function getMonthNameAttribute(){
    	return $this->months[$this->publish_month];
    }

    public function photo() {
        return Photo::where([
            ['model_id', $this->id],
            ['type', 'news'],
        ])->first();
    }

    public function getThumbnailAttribute()
    {
        if($this->photo() != null){
            return "/images/news/{$this->id}/16x11/{$this->photo()->filename}";
        }else{
            return "https://www.bakkerijkosters.nl/afbeeldingen/geen_afbeelding_beschikbaar_gr.gif";
        }

    }

    public function getSquareAttribute()
    {
        if($this->photo() != null){
            return "/images/news/{$this->id}/1x1/{$this->photo()->filename}";
        }else{
            return "https://www.bakkerijkosters.nl/afbeeldingen/geen_afbeelding_beschikbaar_gr.gif";
        }

    }


}
