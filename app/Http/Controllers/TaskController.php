<?php

namespace App\Http\Controllers;

use App\Http\Controllers\helpers\HelperController;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('loops.task');
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
        try {
            $data = [
                'title' => $request->title,
                'date' => $request->date,
                'time' => $request->time,
                'detail' => $request->detail,
            ];
            Task::create(array_merge($data));
            $res = HelperController::success('Task created successfully!');
            return response()->json($res, 200);
        } catch (\Throwable $th) {
            $res = HelperController::fail($th->getMessage());
            return response()->json($res, 500);
        }
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

    public function fetch()
    {
        try {
            $task = Task::with('sub_tasks')->latest()->get();
            $res = [
                'status' => 200,
                'tasks' => $task
            ];
            return response()->json($res, 200);
        } catch (\Throwable $th) {
            $res = [
                'status' => 500,
                'tasks' => $th->getMessage()
            ];
            return response()->json($res, 500);
        }
    }
}