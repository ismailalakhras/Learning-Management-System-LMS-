<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ['instructor_id', 'title', 'short_description', 'long_description', 'thumbnail', 'price'];

    public function instructor()
    {
        return $this->belongsTo(User::class, 'instructor_id');
    }

    public function students()
    {
        return $this->belongsToMany(User::class, 'enrollments', 'course_id', 'student_id');
    }



    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }


    public function getTotalDurationAttribute()
    {
        return $this->lessons()->sum('duration_minutes');
    }

    public function getAverageRatingAttribute()
    {
        return round($this->reviews()->avg('rating'), 1) ?? 0;
    }
}
