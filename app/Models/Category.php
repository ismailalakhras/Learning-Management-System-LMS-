<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'image',
        'number_of_courses'
    ];

    public function courses()
    {
        return $this->hasMany(Course::class, 'category_id');
    }
}
