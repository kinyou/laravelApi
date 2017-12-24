<?php
/**
 * Desc  功能说明
 * User: maogou
 * Date: 2017/12/23
 * Time: 下午10:14
 */
namespace App\Transform;

abstract class Transform {

    /**
     * 回调处理数据
     * @param $items
     * @return array
     */
    public function transformCollection($items){
        $items = is_array($items) ? $items : $items->toArray();
        return array_map([$this,'transform'],$items);
    }

    /**
     * 抽象方法所有子类实现
     * @param $item
     * @return mixed
     */
    public abstract function transform($item);
}