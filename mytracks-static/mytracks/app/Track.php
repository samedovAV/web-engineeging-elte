<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Track extends Model
{
    protected $fillable = ['name', 'filename', 'color'];
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
    public function filters()
    {
        return $this->belongsToMany(Filter::class)->withTimestamps();
    }
}
