@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between">
        <h2>Task List</h2>
        <a class="btn btn-success" href="{{ route('tasks.create') }}">Add Task</a>
    </div>

    <!-- Search form -->
    <form action="{{ route('tasks.index') }}" method="GET" class="form-inline mt-3 mb-3">
        <input type="text" name="search" class="form-control mr-2" placeholder="Search by title or status"
               value="{{ request()->input('search') }}">
        <button type="submit" class="btn btn-primary">Search</button>
    </form>
    
    <table class="table mt-4">
        <thead>
            <tr>
                <th>Title</th>
                <th>Created At</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tasks as $task)
                <tr class="{{ $task->status == 'Completed' ? 'table-success' : 'table-warning' }}">
                    <td>{{ $task->title }}</td>
                    <td>{{ $task->created_at->format('d M Y') }}</td>
                    <td>
                        <form action="{{ route('tasks.updateStatus', $task->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('PATCH')
                            <select name="status" class="form-control" onchange="this.form.submit()">
                                <option value="Pending" {{ $task->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                                <option value="Completed" {{ $task->status == 'Completed' ? 'selected' : '' }}>Completed</option>
                            </select>
                        </form>
                    </td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="{{ route('tasks.edit', $task->id) }}">Edit</a>
                        
                        <!-- Button to trigger the modal -->
                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal{{ $task->id }}">
                            Delete
                        </button>

                        <!-- Confirmation Modal -->
                        <div class="modal fade" id="deleteModal{{ $task->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure you want to delete this task?
                                    </div>
                                    <div class="modal-footer">
                                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
     <!-- Pagination Links -->
     <div class="d-flex justify-content-center">
    {{ $tasks->links('vendor.pagination.bootstrap-4') }}
</div>
@endsection
