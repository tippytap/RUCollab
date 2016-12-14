<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'task_id', 'group_id'
    ];

    public $timestamps = false;

	public function membership(){
		return $this->hasMany('App\Membership');
	}
	
	public function assignments(){
		return $this->hasMany('App\Task');
	}
}
