<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Assignment extends Model
{
    protected $guarded = [];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    public function teacher(): BelongsTo
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function students(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'assignment_students', 'assignment_id', 'student_id')
            ->withPivot(['status', 'submitted_at'])
            ->withTimestamps();
    }

    public function answers(): HasMany
    {
        return $this->hasMany(AssignmentAnswer::class);
    }
}
