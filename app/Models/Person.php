<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    /** @use HasFactory<\Database\Factories\PersonFactory> */
    use HasFactory;

    protected $fillable = [
        'name', 'document', 'phone', 'email', 'observation', 'user_type',
        'state', 'city', 'neighborhood', 'street', 'number', 'complement', 'zipcode',
        'contact_email', 'contact_name', 'contact_phone', 'contact_observation',
        'activation_date', 'deactivation_date',
    ];

    public function groups()
    {
        return $this->belongsToMany(Group::class);
    }

    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }
}
