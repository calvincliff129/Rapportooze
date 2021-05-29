<?php

namespace App\Models;

use App\Models\Contact;
use App\Models\PetType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    use HasFactory;
    protected $table = 'pets';
    protected $connection = 'pgsql';

    public function contacts(){
        return $this->belongsTo(Contact::class);
    }

    public function pet_types(){
        return $this->belongsTo(PetType::class);
    }
}
