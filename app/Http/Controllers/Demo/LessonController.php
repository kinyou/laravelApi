<?php

namespace App\Http\Controllers\Demo;

use App\Http\Controllers\ApiController;
use App\Lesson;
use App\Transform\LessonTransform;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class LessonController extends ApiController
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

        $data = $this->lessonTransform->transformCollection($lessons);

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
        $lesson = Lesson::find($id);

        if (! $lesson) {
            return $this->respondNotFound('lesson is not exist');
        }

        $data = $this->lessonTransform->transform($lesson->toArray());
        return $this->respondWithSuccess($data);
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
