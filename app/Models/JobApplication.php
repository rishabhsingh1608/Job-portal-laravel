<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JobApplication extends Model
{
    use HasFactory;
    protected $fillable = ['joblisting_id', 'user_id', 'expected_salary', 'cv_path'];



    public function job(): BelongsTo
    {
        return $this->belongsTo(Joblisting::class, 'joblisting_id');
    }


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
