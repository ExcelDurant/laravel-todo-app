@extends('layouts.scaffold')
@section('content')
<h2>incomplete todos</h2>
<div class="todos-container">
    @foreach($incompleted_todos as $todo)
    <div class="todo-container">
        <div class="todo-img-container"></div>
        <h4 class="todo-name">{{$todo->name}}</h4>
        <p class="activity">{{$todo->activity}}</p>
        <h5 class="dateline">dateline: {{$todo->dateline}}</h5>
        @if ($todo->completed)
        <button class="complete">completed</button>
        @else
        <form action=" {!! url('/complete/'.$todo->id) !!}" method="POST" class="complete-form">
            @csrf
            <button type="submit" class="complete action">mark as completed</button>
        </form>
        @endif
        <form action=" {!! url('/delete/'.$todo->id) !!}" method="POST" class="delete-form">
            @csrf
            <button type="submit" class="complete delete">delete</button>
        </form>
    </div>
    @endforeach
</div>

<h2>completed todos</h2>
<div class="todos-container">
    @foreach($completed_todos as $todo)
    <div class="todo-container">
        <div class="todo-img-container"></div>
        <h4 class="todo-name">{{$todo->name}}</h4>
        <p class="activity">{{$todo->activity}}</p>
        <h5 class="dateline">{{$todo->dateline}}</h5>
        @if ($todo->completed)
        <button class="complete">completed</button>
        @else
        <form action="" class="complete-form">
            <button type="submit" class="complete action">mark as completed</button>
        </form>
        @endif
        <form action=" {!! url('/delete/'.$todo->id) !!}" method="POST" class="delete-form">
            @csrf
            <button type="submit" class="complete delete">delete</button>
        </form>
    </div>
    @endforeach
</div>

<div class="prod-container">
    <div>
        <h4>Productivity:</h4>
        <h4>{{ $productivity }}</h4>
    </div>
</div>

@endsection