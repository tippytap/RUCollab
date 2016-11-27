<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    /**
     * These are the fields we can allow a user to insert into the DB
     */
    protected $fillable = ['user_id', 'group_id'];

    protected $primaryKey = ['user_id', 'group_id'];

    /**
     * Keeps timestamps from being automatically created when a new
     * Group record is inserted
     */
    public $timestamps = false;

    /**
     * Returns the Group instance this member belongs to
     *
     * @return Group
     */
    public function group(){
        return $this->belongsTo('App\Group');
    }

    /**
     * Returns the User instance this member belongs to
     *
     * @return User
     */
    public function user(){
        return $this->belongsTo('App\User');
    }
}
