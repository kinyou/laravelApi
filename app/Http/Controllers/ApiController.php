<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class ApiController extends Controller
{
    /**
     * 默认状态码
     * @var int
     */
    private $statusCode = 200;

    /**
     * 设置状态码
     * @param $code
     * @return $this
     */
    public function setStatusCode($code) {
        $this->statusCode = $code;
        return $this;
    }

    /**
     * 返回状态码
     * @return int
     */
    public function getStatusCode(){
        return $this->statusCode;
    }

    /**
     * 404未发现
     * @param string $message
     * @return mixed
     */
    public function responseNotFound($message = 'Not Found'){
        return $this->setStatusCode(404)->responseWithError($message);
    }

    /**
     * 服务器内部错误
     * @param string $message
     * @return mixed
     */
    public function responseInternalError($message = 'Internal Error'){
        return $this->setStatusCode(500)->responseWithError($message);
    }

    /**
     * 错误信息返回
     * @param $data
     * @return mixed
     */
    public function responseWithError($data){
        return $this->response([
           'data'=>[
               'message'=>$data,
               'code'=>$this->getStatusCode()
           ]
        ]);
    }

    /**
     * 成功响应的
     * @param $data
     * @return mixed
     */
    public function responseWithSuccess($data){
        return $this->$this->response([
            'data'=>[
                'message'=>$data,
                'code'=>$this->getStatusCode()
            ]
        ]);
    }

    /**
     * 统一响应数据
     * @param $data
     * @param array $header
     * @return mixed
     */
    private function response($data,array $header=[]){
        return Response::json($data,$this->getStatusCode(),$header);
    }
}
