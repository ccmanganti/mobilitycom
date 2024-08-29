<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Readings extends Model
{
    use HasFactory;

    //////////////////////
    // CUSTOM FUNCTIONS //
    //////////////////////

    // Defining the Relationship of Readings to Glove.
    // A reading can be belong to one glove only.
    public function glove(): BelongsTo {

        return $this->belongsTo(Gloves::class);

    }
    
}
