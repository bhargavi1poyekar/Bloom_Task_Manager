<!-- resources/views/create.blade.php -->
@extends('layouts.app') <!-- Assuming you have a main layout -->

@section('content')
<div class="container">
    <h1>Create Task</h1>

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

    <!-- Task Creation Form -->
    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf <!-- CSRF token for security -->
        
        <div class="form-group">
            <label for="title">Task Title:</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>

        <div class="form-group">
            <label for="description">Task Description:</label>
            <textarea class="form-control" id="description" name="description"></textarea>
        </div>

        <div class="form-group">
            <label for="status">Task Status:</label>
            <select class="form-control" id="status" name="status" required>
                <option value="Pending">Pending</option>
                <option value="Completed">Completed</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Create Task</button>
    </form>
</div>
@endsection
