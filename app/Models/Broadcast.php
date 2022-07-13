<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Broadcast extends Model
{
    use HasFactory;
    protected $fillable = [
        'stream_id',
        'name',
        'description',
        'date',
        'username',
        'preview',
        'response'
    ];
}
