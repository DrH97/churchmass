<?php

namespace App\Models;

use App\StaticTableName;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Mass extends Model
{
    /** @use HasFactory<\Database\Factories\MassFactory> */
    use HasFactory;
    use StaticTableName;

    protected $fillable = ['day','time', 'language'];

    public function church(): BelongsTo
    {
        return $this->belongsTo(Church::class);
    }
}
