<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use App\Models\Gloves;

class Actions extends Model
{
    use HasFactory;

    //////////////////////
    // CUSTOM FUNCTIONS //
    //////////////////////

    // Defining the Relationship of Actions to Gloves.
    // An action should only be belong to one glove.
    public function glove(): BelongsTo {

        return $this->belongsTo(Gloves::class);

    }
}
