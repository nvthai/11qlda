<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Class extends BaseModel
{
    protected $primaryKey = 'id';
	protected $table = 'classes';
	protected $fillable = array('TeacherId', 'Code', 'ClassName');
}
