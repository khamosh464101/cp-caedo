<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\Storage;

class Vacancy extends Model
{
    use HasFactory;

    protected $fillable = [
        'vacancy_number',
        'title',
        'post_date',
        'close_date',
        'file',
        'is_vacancy',
        'published'
    ];

    public function getFileAttribute($value)
    {
        return $value ? asset("storage/$value") : asset('import/assets/post-pic-dummy.png');
    }

    public static function boot()
    {
        parent::boot();
        static::updating(function ($vacancy) {

            if ($vacancy->isDirty('file') && !is_null($vacancy->getRawOriginal('file'))) {
                Storage::delete($vacancy->getRawOriginal('file'));
            }
        });
        static::deleting(function ($vacancy) {
            if (!is_null($vacancy->getRawOriginal('file'))) {
                Storage::delete($vacancy->getRawOriginal('file'));
            }
        });
    }

}
