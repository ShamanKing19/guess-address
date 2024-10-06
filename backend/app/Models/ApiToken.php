<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ApiToken extends Model
{
    use HasFactory;

    protected $table = 'api_tokens';

    public $timestamps = false;

    public function usages(): HasMany
    {
        return $this->hasMany(ApiTokenUsage::class, 'token_id', 'id');
    }
}
