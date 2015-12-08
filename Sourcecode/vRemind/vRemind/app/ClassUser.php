<?php

namespace vRemind;

use Illuminate\Database\Eloquent\Model;


// 22/11/15
//  LH
//  Thêm Model ClassUser
class ClassUser extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
     protected $table = 'class_users';

     protected $fillable = ['class_id', 'user_id', 'is_owner', 'participant_can_reply', 'message_under_13'];

     public $timestamps = false;

     public function ClassUser()
	{
    	return $this->hasMany('App\Classes');
	}
}
