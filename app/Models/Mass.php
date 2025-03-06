<?php

namespace App\Models;

use App\StaticTableName;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Mass extends Model
{
    /** @use HasFactory<\Database\Factories\MassFactory> */
    use HasFactory;
    use StaticTableName;

    protected $fillable = ['day','time', 'language'];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['formatted_time'];

    public function church(): BelongsTo
    {
        return $this->belongsTo(Church::class);
    }

    protected function formattedTime(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value, array $attributes) => Carbon::createFromFormat('Hi', str_pad($attributes['time'], 4, '0', STR_PAD_LEFT))->format('h:i a'),
        );
    }

}
