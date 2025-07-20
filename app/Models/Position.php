<?php

namespace App\Models;

use App\Models\Division;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Position extends Model
{
    use HasFactory;

    protected $fillable = [
        'division_id',
        'title',
        'job_description',
        'requirements',
        'apply_link',
        'is_visible',
    ];

    public function division()
    {
        return $this->belongsTo(Division::class);
    }

    protected static function booted()
{
    static::creating(function ($position) {
        $position->slug = Str::slug($position->title);
    });

    static::updating(function ($position) {
        $position->slug = Str::slug($position->title);
    });
}
}
