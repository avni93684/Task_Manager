@extends('layouts.admin')

@section('content')

<div class="content-wrapper p-4">

    {{-- Page Header + Add Button --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">📋 Tasks</h1>

        <button class="btn btn-primary" data-toggle="modal" data-target="#addTaskModal">
            ➕ Add Task
        </button>
    </div>

    {{-- Success Message --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Validation Errors --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Task Table Card --}}
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">My Tasks</h3>
        </div>

        <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($tasks as $task)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $task->title }}</td>
                            <td>{{ $task->description }}</td>
                            <td>
                                @if ($task->status === 'completed')
                                    <span class="badge badge-success">Completed</span>
                                @else
                                    <span class="badge badge-warning">Pending</span>
                                @endif
                            </td>
                            <td class="d-flex align-items-center">

                                {{-- Mark Complete --}}
                                @if ($task->status === 'pending')
                                    <form action="{{ route('tasks.complete', $task) }}" method="POST" class="mr-1">
                                        @csrf
                                        @method('PATCH')
                                        <button class="btn btn-sm btn-success">
                                            <i class="fas fa-check"></i>
                                        </button>
                                    </form>
                                @endif

                                {{-- Edit --}}
                                <a href="{{ route('tasks.edit', $task) }}" class="btn btn-sm btn-info mr-1">
                                    <i class="fas fa-edit"></i>
                                </a>

                                

                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted">
                                No tasks found
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>

{{-- ================= ADD TASK MODAL ================= --}}
<div class="modal fade" id="addTaskModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">➕ Add New Task</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>

            <form action="{{ route('tasks.store') }}" method="POST">
                @csrf

                <div class="modal-body">

                    <div class="form-group">
                        <label>Task Title</label>
                        <input type="text"
                               name="title"
                               class="form-control"
                               placeholder="Enter task title"
                               value="{{ old('title') }}"
                               required>
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description"
                                  class="form-control"
                                  rows="3"
                                  placeholder="Optional description">{{ old('description') }}</textarea>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        Cancel
                    </button>
                    <button type="submit" class="btn btn-primary">
                        Add Task
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>

{{-- Auto-open modal if validation fails --}}
@if ($errors->any())
<script>
    $(document).ready(function () {
        $('#addTaskModal').modal('show');
    });
</script>
@endif

@endsection
