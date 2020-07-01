<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //
    protected $fillable = ['task_name','created_by', 'assignt_to', 'status', 'description'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function($query)
        {
            $user = Auth::user()->name;
            $query->created_by = $user;
        });
    }

}
