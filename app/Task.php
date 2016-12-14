<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['task_string', 'due_date'];

    public $timestamps = false;

	/**
     * Returns the User models associated with this Group instance
     * that are related through the memberships table
     *
     * @return Array
     */
	public function membership(){
        return $this->hasMany('App\Membership');
    }
	
}
