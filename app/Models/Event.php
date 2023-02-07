<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    use HasUuids;

    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    public function members()
    {
        return $this->hasMany(EventMember::class);
    }
}
