<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subject extends Model
{
    use HasFactory , SoftDeletes;

    protected $primaryKey = 'id';

    protected $fillable = ['subject_name', 'class_id'];

    public function class()
    {
        return $this->belongsTo(Classes::class, 'class_id');
    }
    public function files()
    {
        return $this->hasMany(File::class, 'subject_id');
    }
}