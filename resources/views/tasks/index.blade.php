@extends('layouts.admin')

@section('content')

    <!-- Content Wrapper -->
    <div class="content-wrapper p-4">

        <!-- Page Header -->
        <div class="mb-4">
            <h1 class="h3">📋 Tasks</h1>
        </div>

        <!-- Add Task Card -->
        <div class="card card-primary mb-4">
            <div class="card-header">
                <h3 class="card-title">➕ Add New Task</h3>
            </div>

            <form action="{{ route('tasks.store') }}" method="POST">
                @csrf

                <div class="card-body">

                    <div class="form-group">
                        <label>Task Title</label>
                        <input type="text"
                            name="title"
                            class="form-control"
                            placeholder="Enter task title"
                            required>
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description"
                                class="form-control"
                                rows="3"
                                placeholder="Optional description"></textarea>
                    </div>

                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">
                        Add Task
                    </button>
                </div>
            </form>
        </div>


        <!-- Task Table Card -->
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

                                <td class="d-flex gap-2">

                                    {{-- Mark Complete --}}
                                    @if ($task->status === 'pending')
                                        <form action="{{ route('tasks.complete', $task) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <button class="btn btn-sm btn-success">
                                                <i class="fas fa-check"></i>
                                            </button>
                                        </form>
                                    @endif

                                    {{-- Delete --}}
                                    <form action="/tasks/{{ $task->id }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>

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
@endsection
