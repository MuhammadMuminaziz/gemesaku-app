<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Student extends Model
{
    use HasFactory, Sluggable;
    protected $guarded = [];

    public function school()
    {
        return $this->belongsTo(School::class);
    }

    public function sluggable(): array
    {
        return [
            'username' => [
                'source' => 'name'
            ]
        ];
    }

    public function getRouteKeyName()
    {
        return 'username';
    }
}
