@extends('layouts.app')

@section('content')
<div class="task-form">
    <h2>Editar Task</h2>
    <form method="POST" action="{{ route('tasks.update', $task) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Titulo</label>
            <input id="title" type="text" name="title" class="form-control" value="{{ $task->title }}" required>
        </div>

        <div class="form-group">
            <label for="description">Descrição</label>
            <textarea id="description" name="description" class="form-control">{{ $task->description }}</textarea>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Update Task</button>
        </div>
    </form>
</div>
@endsection