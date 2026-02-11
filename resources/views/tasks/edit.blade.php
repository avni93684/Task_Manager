@extends('layouts.default')
@section('contents')
          <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <div class="col-sm-6">
                <h3 class="mb-0">Dashboard</h3>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                </ol>
              </div>
            </div>
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content Header-->
        <!--begin::App Content-->
        <div class="app-content">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row g-4">
                <div class="col-md-6 offset-md-3">
                <!--begin::Quick Example-->
                <div class="card card-primary card-outline mb-4">
                  <!--begin::Header-->
                  <div class="card-header">
                    <div class="card-title">New Task</div>
                  </div>
                  <!--end::Header-->
                  <!--begin::Form-->
                  <form action="{{ route('tasks.update', $task->id) }}" method="POST">
                    @csrf
                    <!--begin::Body-->
                    <div class="card-body">
                      <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input type="text" value="{{ old('name', $task->title) }}" name="title" class="form-control" required>
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Description</label>
                        <input type="text" value="{{ old('name', $task->description) }}" name="description" class="form-control">
                      </div>
                    </div>
                    <!--end::Body-->
                    <!--begin::Footer-->
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Add Task</button>
                    </div>
                    <!--end::Footer-->
                  </form>
                  <!--end::Form-->
                </div>
              </div>
            </div>

          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content-->
      </main>
@endsection('content')