<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Readings extends Model
{
    use HasFactory;

    protected $fillable = [
        'glove_id',
        'finger_1',
        'finger_2',
        'finger_3',
        'finger_4',
        'finger_5',
    ];

    //////////////////////
    // CUSTOM FUNCTIONS //
    //////////////////////

    // Defining the Relationship of Readings to Glove.
    // A reading can be belong to one glove only.
    public function readings(): BelongsTo {

        return $this->belongsTo(Gloves::class);

    }
    
}
