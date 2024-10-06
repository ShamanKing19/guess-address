<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApiTokenUsage extends Model
{
    use HasFactory;

    protected $table = 'api_tokens_usage';

    public $timestamps = false;

    protected $fillable = [
        'token_id',
        'query',
        'response_status'
    ];

    public static function boot()
    {
        parent::boot();
        static::creating(static function ($model) {
            $model->created_at = $model->freshTimestamp();
        });
    }

    public function token()
    {
        return $this->belongsTo(ApiToken::class, 'token_id', 'id');
    }
}
