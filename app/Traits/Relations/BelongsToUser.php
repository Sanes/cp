<?php 

namespace App\Traits\Relations;

use App\Models\User;

trait BelongsToUser
{
	public function user()
	{
		return $this->belongsTo(User::class);
	}
}