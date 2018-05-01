<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [
    	'name',
    	'project_id',
    ];

    /**
     * TODO
     * @return type
     */
    public function project()
    {
    	return $this->belongsTo('App\Project');
    }
}
