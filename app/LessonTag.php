<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LessonTag extends Model
{
    protected $table = 'lesson_tag';

    //取消created_at和updated_at字段的自动维护
    public $timestamps = false;

    //可填充的字段
    protected $fillable = [
        'lesson_id',
        'tag_id'
    ];
}
