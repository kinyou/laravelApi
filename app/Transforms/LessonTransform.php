<?php
/**
 * Desc  功能说明
 * User: maogou
 * Date: 2017/12/23
 * Time: 下午10:18
 */

namespace App\Transform;


class LessonTransform extends Transform{

    /**
     * 规定返回lesson的数据字段
     * @param $lesson
     * @return array
     */
    public function transform($lesson){
        return [
            'title' => $lesson['title'],
            'body' => $lesson['body'],
            'status' => $lesson['status'],
        ];
    }

}