<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Account extends Model
{
    /**
     * Get users associated with the account.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

    /**
     * Get organizations associated with the account.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function organizations(): HasMany
    {
        return $this->hasMany(Organization::class);
    }
}
