<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subject extends Model
{
    use HasFactory , SoftDeletes;

    protected $primaryKey = 'id';

    protected $fillable = ['subject_name','short_desc',
        'long_desc','price','is_locked', 'class_id'];

    public function class()
    {
        return $this->belongsTo(Classes::class, 'class_id');
    }
    public function files()
    {
        return $this->hasMany(File::class, 'subject_id');
    }
    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps()->withPivot('price');
    }
}