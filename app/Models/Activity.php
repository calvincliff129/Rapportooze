<?php

namespace App\Models;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function Contact(){
        return $this->belongsTo('App\Models\Contact');
    }
}
