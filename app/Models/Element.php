<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Element extends Model
{
    use HasFactory;
    

    protected $fillable = [
        'type',
        'name',
        'content',
        'page_id',
        'custom1',
        'custom2',
        'custom3',
        
    ];
    public static $types = [
        "image", 'text', 'select', 'radio', 'checkbox' 
    ];

    public function page() {
        return $this->belongs(Page::class, 'page_id');
    }
}
