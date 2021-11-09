@extends('layouts.scaffold')
@section('content')
<div class="form-container">
<form action=" {!! url('/new') !!}" method="POST" class="todo-form">
@csrf
    <h3>new todo</h3>
    <input type="text" name="name" id="" class="in" placeholder="todo name" required>
    <textarea type="text" name="activity" id="" class="in" placeholder="todo activity/description" required></textarea>
    <input type="date" name="dateline" id="" class="in" placeholder="dateline" required>
    <input type="submit" value="create todo" class="submit-btn">
</form>
</div>
@endsection