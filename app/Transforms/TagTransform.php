<?php
/**
 * Desc  功能说明
 * User: maogou
 * Date: 2017/12/24
 * Time: 下午1:46
 */

namespace App\Transform;


class TagTransform extends Transform
{

    /**
     * 返回标签的名称
     * @param $tag
     * @return array
     */
    public function transform($tag)
    {
        return [
          'name'=>$tag['name']
        ];
    }
}