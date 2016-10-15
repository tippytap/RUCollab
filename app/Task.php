<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['task_id', 'is_completed', 'task_string', 'due_date'];
}
