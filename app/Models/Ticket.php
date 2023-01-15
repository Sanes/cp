<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Relations\BelongsToUser;

class Ticket extends Model
{
    use HasFactory, BelongsToUser;
}
