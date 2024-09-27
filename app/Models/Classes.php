<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Classes extends Model
{
    use HasFactory, SoftDeletes;

    protected $primaryKey = 'id';

    protected $fillable = ['class_name', 'level_id'];

    public function level()
    {
        return $this->belongsTo(Level::class);
    }
    public function subjects()
    {
        return $this->hasMany(Subject::class, 'class_id');
    }
}