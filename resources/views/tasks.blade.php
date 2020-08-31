@extends('layouts.app')
@section('content')
    <div class="panel-body">
        <!-- バリデーションエラーの表示に使用するエラーファイル-->
    @include('common.errors')
    <!-- タスク登録フォーム -->
        <form action="{{ route('tasks.store') }}" method="POST" class="form-horizontal">
            @csrf
            <div class="form-group">
                <!-- タスク名 -->
                <div class="col-sm-6">
                    <label for="task" class="col-sm-3 control-label">Task</label>
                    <input type="text" name="task" id="task" class="form-control">
                </div>
            </div>
            <!-- タスク登録ボタン -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </form>
        <!-- この下に登録済みタスクリストを表示 -->
        <!-- 表示領域 -->
        @if (count($tasks) > 0)
            <div class="panel panel-default">
                <div class="panel-heading">タスクリスト</div>
                <div class="panel-body">
                    <table class="table table-striped task-table">
                        <!-- テーブルヘッダ -->
                        <thead>
                        <th>タスク</th>
                        </thead>
                        <!-- テーブル本体 -->
                        <tbody>
                        @foreach ($tasks as $task)
                            <tr>
                                <td class="table-text">
                                    <div>{{ $task->task }}</div>
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
@endsection
