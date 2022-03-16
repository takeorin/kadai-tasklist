@extends('layouts.app')

@section('content')

   <h1>タスク一覧</h1>

@if (\Auth::check())
    @if (count($tasks_x) > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>id</th>
                    <th>タスク</th>
                    <th>status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tasks_x as $task_a)
                <tr>
                     {{-- タスク詳細ページへのリンク --}}
                    <td>{!! link_to_route('tasks.show', $task_a->id, ['task' => $task_a->id]) !!}</td>
                    <td>{{ $task_a->content }}</td>
                    <td>{{ $task_a->status}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
    
    {{-- ページネーションのリンク --}}
    {{ $tasks_x->links() }}
    
    {{-- タスク作成ページへのリンク --}}
    {!! link_to_route('tasks.create', '新規タスクの投稿', [], ['class' => 'btn btn-primary']) !!}

@endif

@guest
    {{-- ユーザー登録ページへのリンク --}}
     <div class="center jumbotron">
        <div class="text-center">
            {{-- <h1>Welcome to the TaskList</h1> --}}
            {{-- ユーザ登録ページへのリンク --}}
            {!! link_to_route('signup.get', 'Sign up now!', [], ['class' => 'btn btn-lg btn-primary']) !!}
        </div>
    </div>
@endguest
    
@endsection