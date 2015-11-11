<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends BaseModel
{
    protected $primaryKey = 'id';
	protected $table = 'courses';
	protected $fillable = array('TeacherId', 'Code', 'ClassName');
}
