<div class="form-group">
    <label for="title">Task Title</label>
    <input type="text" class="form-control" name="title" value="{{ old('title', $task->title ?? '') }}" required>
</div>
<div class="form-group">
    <label for="description">Description</label>
    <textarea class="form-control" name="description">{{ old('description', $task->description ?? '') }}</textarea>
</div>
<div class="form-group">
    <label for="status">Status</label>
    <select class="form-control" name="status" required>
        <option value="Pending" {{ (old('status', $task->status ?? '') == 'Pending') ? 'selected' : '' }}>Pending</option>
        <option value="Completed" {{ (old('status', $task->status ?? '') == 'Completed') ? 'selected' : '' }}>Completed</option>
    </select>
</div>
