@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="panel-body">
            <!-- バリデーションエラーの表示に使用するエラーファイル-->
        @include('common.errors')
        <!-- タスク登録フォーム -->
            <div class="card mb-3">
                <form action="{{ route('tasks.store') }}" method="POST" class="form-horizontal">
                    <div class="card-header">タスク登録フォーム</div>

                    <div class="card-body">

                        @csrf
                        <div class="form-group row">
                            <!-- タスク名 -->
                            <div class="col-sm-6">
                                <label for="task" class="col-sm-3 control-label">Task</label>
                                <input type="text" name="task" id="task" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <!-- deadline -->
                            <div class="col-sm-6">
                                <label for="deadline" class="col-sm-3 control-label">Deadline</label>
                                <input type="date" name="deadline" id="deadline" class="form-control">
                            </div>
                        </div>
                        <!-- comment -->
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="comment" class="col-sm-3 control-label">Comment</label>
                                <input type="text" name="comment" id="comment" class="form-control">
                            </div>
                        </div>
                        <!-- タスク登録ボタン -->
                    </div>

                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- この下に登録済みタスクリストを表示 -->
        <!-- 表示領域 -->
        @if (count($tasks) > 0)
            <div class="card">

                <div class="card-header">タスクリスト</div>
                <div class="card-body">
                    <table class="table table-striped task-table table-bordered">
                        <!-- テーブルヘッダ -->
                        <thead>
                        <th>タスク</th>
                        <th>締め切り</th>
                        <th>コメント</th>
                        <th>更新</th>
                        <th>削除</th>

                        </thead>
                        <!-- テーブル本体 -->
                        <tbody>
                        @foreach ($tasks as $task)
                            <tr>
                                <td class="table-text">
                                    <div>{{ $task->task }}</div>
                                </td>
                                <td class="table-text">
                                    <div>{{ $task->deadline }}</div>
                                </td>
                                <td class="table-text">
                                    <div>{{ $task->comment }}</div>
                                </td>
                                <td>
                                    <form action="{{ route('tasks.edit',$task->id) }}" method="GET">
                                        @csrf
                                        <button type="submit" class="btn btn-primary">更新</button>
                                    </form>
                                </td>
                                <td>
                                    <!-- 削除ボタン -->
                                    <form action="{{ route('tasks.destroy',$task->id) }}" method="POST">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-danger">削除</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
    @endif
    <!-- ここまでタスクリスト -->
    </div>
    </div>
@endsection
