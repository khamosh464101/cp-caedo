<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectCategory extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'slug', 'user_id'];

    // One to many realtionship
    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    // One to many realtionship -> Users has many categories
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // I use this function to get Active Posts in the current category
    public function publishedProjects()
    {
        return SELF::projcets()->with(['user:id,name', 'category'])->published()->latest('created_at')->paginate(10);
    }
}
