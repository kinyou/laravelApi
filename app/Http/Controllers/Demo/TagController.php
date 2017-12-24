<?php

namespace App\Http\Controllers\Demo;

use App\Http\Controllers\ApiController;
use App\Lesson;
use App\Tag;
use App\Transform\TagTransform;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class TagController extends ApiController
{
    /**
     * @var TagTransform
     */
    protected $tagTransform;

    /**
     * 初始化tag的转换器
     * TagController constructor.
     * @param TagTransform $transform
     */
    public function __construct(TagTransform$transform)
    {
        $this->tagTransform = $transform;
    }

    /**
     * Display a listing of the resource.
     * @param null $lessonId
     * @return \Illuminate\Http\Response
     */
    public function index($lessonId = null)
    {
        try{
            $tags = $lessonId ? Lesson::findOrFail($lessonId)->tags : Tag::all();
        } catch(ModelNotFoundException$exception){
            $message = $exception->getMessage();
            return $this->respondNotFound($message);
        }

        $data = $this->tagTransform->transformCollection($tags);

        return $this->respondWithSuccess($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
