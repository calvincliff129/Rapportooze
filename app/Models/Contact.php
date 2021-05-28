<?php

namespace App\Models;

use App\Models\Activity;
use App\Models\Reminder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Laratrust\Traits\LaratrustUserTrait;

class Contact extends Model
{
    use LaratrustUserTrait;
    use SoftDeletes;
    use HasFactory;

    public function activities()
    {
        return $this->belongToMany(Activity::class);
    }

    public function reminders()
    {
        return $this->hasMany(Reminder::class)
                    ->orderByDesc('id');
    }
}