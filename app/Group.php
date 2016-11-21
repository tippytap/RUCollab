<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    /**
     * These are the fields we can allow a user to insert into the DB
     */
    protected $fillable = ['url', 'group_name', 'group_leader_id'];

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
