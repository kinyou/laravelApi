<?php

namespace App\Http\Controllers\Demo;

use App\Lesson;
use App\Transform\LessonTransform;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;

class LessonController extends Controller
{
    /**
     * @var LessonTransform
     */
    protected $lessonTransform;

    /**
     * LessonController constructor.
     * @param LessonTransform $transform
     */
    public function __construct(LessonTransform$transform)
    {
        $this->lessonTransform = $transform;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lessons = Lesson::all();

        return Response::json([
            'data'=>$this->lessonTransform->transformCollection($lessons),
        ],200);
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
        $lesson = Lesson::find($id);

        if (! $lesson) {
            return Response::json([
                'error'=>[
                    'message'=>'lesson is not exist',
                    'code'=>404
                ]
            ],404);
        }

        return Response::json([
            'data'=>$this->lessonTransform->transform($lesson->toArray()),
        ],200);
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
