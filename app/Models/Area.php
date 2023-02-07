<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;
    use HasUuids;

    public function prefecture()
    {
        return $this->belongsTo(Prefecture::class);
    }

    public function groups()
    {
        return $this->hasMany(Group::class);
    }

    public function users()
    {
        return $this->hasManyThrough(User::class, Group::class);
    }

    public function events()
    {
        return $this->hasMany(Event::class);
    }
}
