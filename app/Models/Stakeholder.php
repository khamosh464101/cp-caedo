<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\Storage;

class Stakeholder extends Model
{
    use HasFactory;

    protected $fillable = [
        'category',
        'image',
        'url',
        'published'
        
    ];

    const categories = [
        "Stakeholder", 'Donor', 'Partner', 'Advisory Partner',
    ];

    public function getImageAttribute($value)
    {
        return $value ? asset("storage/$value") : asset('import/assets/post-pic-dummy.png');
    }


    public static function boot()
    {
        parent::boot();
        static::updating(function ($stakeholder) {
            if ($stakeholder->isDirty('image') && !is_null($stakeholder->getRawOriginal('image'))) {
                Storage::delete($stakeholder->getRawOriginal('image'));
            }
        });
        static::deleting(function ($stakeholder) {
            if (!is_null($stakeholder->getRawOriginal('image'))) {
                Storage::delete($stakeholder->getRawOriginal('image'));
            }
    
        });
    }
}
