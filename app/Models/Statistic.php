<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statistic extends Model
{
    use HasFactory;

    protected $fillable = ['assigned_to_id', 'count'];

    public function assignee()
    {
        return $this->belongsTo(User::class, 'assigned_to_id');
    }
}
