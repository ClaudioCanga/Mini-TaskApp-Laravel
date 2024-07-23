@extends('layouts.app')

@section('content')
<div class="task-form">
    <h2>Criar Task</h2>
    <form method="POST" action="{{ route('tasks.store') }}">
        @csrf
        <div class="form-group">
            <label for="title">Titulo</label>
            <input id="title" type="text" name="title" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="description">Descrição</label>
            <textarea id="description" name="description" class="form-control"></textarea>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Criar Task</button>
        </div>
    </form>
</div>
@endsection