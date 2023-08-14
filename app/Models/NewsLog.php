<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NewsLog extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'uuid',
        'action',
        'title',
        'user_id',
        'news_id',
        'created_by'
    ];

    public $timestamps = true;
}
