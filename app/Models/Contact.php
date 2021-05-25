<?php

namespace App\Models;

use App\Models\Activity;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Thomasjohnkane\Snooze\Traits\SnoozeNotifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Laratrust\Traits\LaratrustUserTrait;

class Contact extends Model
{
    use LaratrustUserTrait;
    use SnoozeNotifiable;
    use SoftDeletes;
    use HasFactory;

    public function activities(){
        return $this->belongToMany(Activity::class);
    }
}