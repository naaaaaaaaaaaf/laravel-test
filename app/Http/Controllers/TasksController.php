<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Task;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tasks = Task::orderBy('deadline', 'asc')->get();
        return response(view('tasks', [
            'tasks' => $tasks
        ]));
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
        // バリデーション
        $validator = Validator::make($request->all(), [
            'task' => 'required|max:255',
            'deadline' => 'required',
        ]);
        // バリデーション:エラー
        if ($validator->fails()) {
            return response(redirect()
                ->route('tasks.index')
                ->withInput()
                ->withErrors($validator));
        }
        // Eloquentモデル
        $task = new Task;
        $task->task = $request->task;
        $task->deadline = $request->deadline;
        $task->comment = $request->comment;
        $task->save();
        // ルーティング「tasks.index」にリクエスト送信（一覧ページに移動）
        return response(redirect()->route('tasks.index'));
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
        $task = Task::find($id);
        $task->delete();
        return response(redirect()->route('tasks.index'));
    }
}
