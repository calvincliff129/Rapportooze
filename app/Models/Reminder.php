<?php

namespace App\Models;

// use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Reminder extends Model
{
    // use SoftDeletes;
    use HasFactory;

    protected $guarded = [];

    public function contact() 
    {
        return $this->belongsTo(Contact::class);
    }
}
