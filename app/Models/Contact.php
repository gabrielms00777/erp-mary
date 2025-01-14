<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    /** @use HasFactory<\Database\Factories\ContactFactory> */
    use HasFactory;

    protected $fillable = [
        'person_id', 'name', 'email', 'phone', 'observation',
    ];

    public function person()
    {
        return $this->belongsTo(Person::class);
    }
}
