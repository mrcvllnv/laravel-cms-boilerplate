<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use SoftDeletes;

    /**
     * Get the organization that owns the contact.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function organization(): BelongsTo
    {
        return $this->belongsTo(Organization::class);
    }

    /**
     * Get contact's full name
     *
     * @return string
     */
    public function getFullNameAttribute(): string
    {
        return ucfirst($this->first_name . ' ' . $this->last_name);
    }

    /**
     * Get contact's initials
     *
     * @return string
     */
    public function getInitialsAttribute(): string
    {
        return mb_substr($this->first_name, 0, 1) .''. mb_substr($this->last_name, 0, 1);
    }
}
