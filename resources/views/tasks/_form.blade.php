<div class="row">
    <div class="col-md-12">
        <div class="form-group row">
            <label for="first_name" class="col-md-3 col-form-label">Tasks Name</label>
            <div class="col-md-9">
                <input type="text" name="task_name" value="{{ old('task_name', $tasks->task_name) }}" id="task_name" class="form-control @error('task_name') is-invalid @enderror">
                @error('task_name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="company_id" class="col-md-3 col-form-label">Created By</label>
            <div class="col-md-9">
                <select name="users" id="users" class="form-control  @error('users') is-invalid @enderror">

                </select>
                @error('users')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="company_id" class="col-md-3 col-form-label">Status</label>
            <div class="col-md-9">
                <select name="tasks" id="tasks" class="form-control  @error('tasks') is-invalid @enderror">
                        <option value="">Select Status</option>
                        <option value="created">Created</option>
                        <option value="assigned">Assigned</option>
                        <option value="in-progres">In-progress</option>
                        <option value="done">Done</option>
                </select>
                @error('users')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="first_name" class="col-md-3 col-form-label">Description</label>
            <div class="col-md-9">
                <textarea name="first_name" value="{{ old('description', $tasks->description) }}" id="description" class="form-control @error('description') is-invalid @enderror"></textarea>
                @error('description')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>

        <hr>
        <div class="form-group row mb-0">
            <div class="col-md-9 offset-md-3">
                <button type="submit" class="btn btn-primary">{{ $tasks->exists ? 'Update' : 'Save' }}</button>
                <a href="{{ route('tasks.task') }}" class="btn btn-outline-secondary">Cancel</a>
            </div>
        </div>
    </div>
</div>
