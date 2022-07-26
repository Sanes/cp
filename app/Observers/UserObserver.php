<?php

namespace App\Observers;

use App\Models\User;
use App\Models\Profile;


class UserObserver
{
     public function created(User $user)
     {        
        $profile = new Profile;
        $profile->user_id = $user->id;
        $profile->save();
        if ($user->id === 1) {
            $user->assignRole('admin');
        } 
     }
}
