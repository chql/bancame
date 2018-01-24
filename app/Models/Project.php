<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title', 'content', 'cost', 'deadline', 'project_author'
    ];

    public function author()
    {
        return $this->belongsTo('App\Models\User', 'project_author');
    }

    public function donations()
    {
        return $this->hasMany('App\Models\Donation', 'project');
    }

    public function donated_amount()
    {
        return $this->donations->sum('value');
    }
}
