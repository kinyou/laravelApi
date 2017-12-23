<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LessonTag extends Model
{
    //取消created_at 和 updated_at的创建与自动维护
    public $timestamps = false;

    protected $fillable = [
        'lesson_id',
        'tag_id'
    ];
}
