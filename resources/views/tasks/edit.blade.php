<!-- resources/views/edit.blade.php -->
@extends('layouts.app') <!-- Assuming you have a main layout -->

@section('content')
<div class="container">
    <h1>Edit Task</h1>

    <!-- Display Validation Errors -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Task Edit Form -->
    <form action="{{ route('tasks.update', $task->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- Specify the PUT method for updates -->

        <div class="form-group">
            <label for="title">Task Title:</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $task->title) }}" required>
        </div>

        <div class="form-group">
            <label for="description">Task Description:</label>
            <textarea class="form-control" id="description" name="description">{{ old('description', $task->description) }}</textarea>
        </div>

        <div class="form-group">
            <label for="status">Task Status:</label>
            <select class="form-control" id="status" name="status" required>
                <option value="Pending" {{ $task->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                <option value="Completed" {{ $task->status == 'Completed' ? 'selected' : '' }}>Completed</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update Task</button>
    </form>
</div>
@endsection
