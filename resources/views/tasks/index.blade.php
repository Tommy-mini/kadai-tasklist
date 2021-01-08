@extends('layouts.app')

@section('content')

<!-- ここにページ毎のコンテンツを書く -->
    @if(Auth::check())
        <h1>{{ Auth::user()->name }}さんのタスク一覧</h1>
        
        @if (count($tasks) > 0 )
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>id</th>
                    <th>タスク</th>
                    <th>ステータス</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tasks as $task)
                <tr>
                    {{-- タスク詳細ページへのリンク　--}}
                    <td>{!! link_to_route('tasks.show', $task->id, ['task' => $task->id]) !!}</td>
                    <td>{{ $task->content }}</td>
                    <td>{{ $task->status }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{-- タスク作成ページへのリンク --}}
        <ul class="navbar-nav">
            <li class="nav-item">{!! link_to_route('tasks.create', '新規タスクの作成', [], ['class' => 'btn btn-primary']) !!}</li>
        </ul>
        @endif
    @else
    {{--　ユーザ登録ページへのリンク--}}
    {!! link_to_route('signup.get', 'ユーザ登録', [], ['class' => 'btn btn-primary']) !!} 
    @endif
    
@endsection