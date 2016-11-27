<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['user_id', 'group_id', 'message_string'];

    public $timestamps = false;

    /**
     * Returns the Membership model associated with this Group instance
     * that are related through the memberships table
     *
     * @return Array
     */
    public function member(){
        return $this->belongsTo('App\Member');
    }
}
