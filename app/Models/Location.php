<?php

// In your Location model (app/Models/Location.php)

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = ['district', 'upazila', 'village', 'parent_id'];

    // Define a relationship for child locations
    public function children()
    {
        return $this->hasMany(Location::class, 'parent_id');
    }
}

