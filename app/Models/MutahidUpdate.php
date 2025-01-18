<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\Storage;

class MutahidUpdate extends Model
{
    use HasFactory;
    protected $fillable = [
        'year',
        'file',
        'is_mutahid_dfi',
        'image',
        'published'
    ];


    public function getFileAttribute($value)
    {
        return $value ? asset("storage/$value") : asset('import/assets/post-pic-dummy.png');
    }

    public function getImageAttribute($value)
    {
        return $value ? asset("storage/$value") : asset('import/assets/post-pic-dummy.png');
    }


    public static function boot()
    {
        parent::boot();
        static::updating(function ($mu) {

            if ($mu->isDirty('file') && !is_null($mu->getRawOriginal('file'))) {
                Storage::delete($mu->getRawOriginal('file'));
            }

            if ($mu->isDirty('image') && !is_null($mu->getRawOriginal('image'))) {
                Storage::delete($mu->getRawOriginal('image'));
            }
        });
        static::deleting(function ($mu) {
            if (!is_null($mu->getRawOriginal('file'))) {
                Storage::delete($mu->getRawOriginal('file'));
            }
        });
        static::deleting(function ($mu) {
            if (!is_null($mu->getRawOriginal('image'))) {
                Storage::delete($mu->getRawOriginal('image'));
            }
        });
    }
}
