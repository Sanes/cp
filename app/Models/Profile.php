<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Relations\BelongsToUser;

class Profile extends Model
{
    use HasFactory, BelongsToUser;

    public $timestamps = false;

    protected $fillable = [
        'phone',
        'about',
        'note',
    ];
    
}
