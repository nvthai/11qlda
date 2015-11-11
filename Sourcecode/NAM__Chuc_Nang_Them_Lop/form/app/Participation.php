<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participation extends BaseModel
{
    protected $primaryKey = 'id';
	protected $table = 'participations';
	protected $fillable = array('ClassId', 'TeacherId', 'PartnerId');
}
