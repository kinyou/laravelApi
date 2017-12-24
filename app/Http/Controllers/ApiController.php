<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
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
    public function respondNotFound($message = 'Not Found'){
        return $this->setStatusCode(404)->respondWithError($message);
    }

    /**
     * 服务器内部错误
     * @param string $message
     * @return mixed
     */
    public function respondInternalError($message = 'Internal Error'){
        return $this->setStatusCode(500)->respondWithError($message);
    }

    /**
     * 错误信息返回
     * @param $data
     * @return mixed
     */
    public function respondWithError($data){
        return $this->respond([
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
    public function respondWithSuccess($data){
        return $this->respond([
            'data'=>[
                'message'=>$data,
                'code'=>$this->getStatusCode()
            ]
        ]);
    }

    /**
     * 数据分页的响应
     * @param LengthAwarePaginator $paginate
     * @param array $data
     * @return mixed
     */
    public function respondWithPagination(LengthAwarePaginator $paginate,array $data){
        $data = array_merge($data,[
            'paginator'=>[
                'count'=>$paginate->total(),
                'pages'=>ceil($paginate->total() / $paginate->perPage()),
                'page'=>$paginate->currentPage(),
                'limit'=>$paginate->perPage(),
            ]
        ]);

        return $this->respond($data);
    }

    /**
     * 统一响应数据
     * @param $data
     * @param array $header
     * @return mixed
     */
    public function respond($data,array $header=[]){
        return Response::json($data,$this->getStatusCode(),$header);
    }
}
