@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card mb-3">
            @include('common.errors')
            <form action="{{ route('tasks.update',$task->id) }}" method="POST"  class="form-horizontal">
                @method('PUT')
                @csrf
                <div class="card-header">タスク登録フォーム</div>

                <div class="card-body">

                    @csrf
                    <div class="form-group row">
                        <!-- タスク名 -->
                        <div class="col-sm-6">
                            <label for="task" class="col-sm-3 control-label">Task</label>
                            <input type="text" name="task" id="task" class="form-control" value="{{$task->task}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <!-- deadline -->
                        <div class="col-sm-6">
                            <label for="deadline" class="col-sm-3 control-label">Deadline</label>
                            <input type="date" name="deadline" id="deadline" class="form-control" value="{{$task->deadline}}">
                        </div>
                    </div>
                    <!-- comment -->
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label for="comment" class="col-sm-3 control-label">Comment</label>
                            <input type="text" name="comment" id="comment" class="form-control" value="{{$task->comment}}">
                        </div>
                    </div>
                    <!-- タスク登録ボタン -->
                </div>

                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a class="btn btn-link pull-right" href="{{ route('tasks.index') }}">Back</a>

                </div>
            </form>
        </div>
    </div>
@endsection
