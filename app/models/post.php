<?php

use Carbon\Carbon;

class Post extends BaseModel
{
	public static $rules = array(
    'title'      => 'required|max:100',
    'body'       => 'required|max:10000'
	);

    protected $table = 'posts';

	public function getCreatedAtAttribute($value)
	{
	    $utc = Carbon::createFromFormat($this->getDateFormat(), $value);
	    return $utc->setTimezone('America/Chicago');
	}

}

