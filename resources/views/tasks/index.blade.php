@extends('layouts.app')

@section('content')
<div class="container">
    <div class="page-header d-flex justify-content-between align-items-center mb-4">
        <h1>Minhas Tasks</h1>
        <a href="{{ route('tasks.create') }}" class="btn btn-primary">Adicionar Nova Task</a>
    </div>

    @if ($tasks->isEmpty())
        <p class="alert alert-info">Não existe nenhuma tasks. </p>
    @else
        <ul class="list-group">
            @foreach ($tasks as $task)
                <li class="list-group-item {{ $task->is_completed ? 'completed' : '' }} d-flex justify-content-between align-items-center">
                    <div>
                        <h5>{{ $task->title }}</h5>
                        <p>{{ $task->description }}</p>
                        @if ($task->is_completed)
                            <span class="badge bg-success">Completada</span>
                        @else
                            <form method="POST" action="{{ route('tasks.complete', $task) }}" style="display:inline;">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-success btn-sm">Marcar vencida</button>
                            </form>
                        @endif
                    </div>
                    <div>
                        <a href="{{ route('tasks.edit', $task) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form method="POST" action="{{ route('tasks.destroy', $task) }}" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
    @endif
</div>
@endsection