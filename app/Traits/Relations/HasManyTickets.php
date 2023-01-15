<?php 

namespace App\Traits\Relations;

use App\Models\Ticket;

trait HasManyTickets
{
	public function tickets()
	{
		return $this->hasMany(Ticket::class);
	}
}