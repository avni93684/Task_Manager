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
                <h3 class="mb-0">Tasks</h3>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <a href="{{ route('tasks.create') }}" class="btn btn-primary">Add Tasks</a>
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
            <div class="row">
              <div class="col-md-12">
                <div class="card mb-4">
                  <div class="card-header">
                    <h3 class="card-title">Sprint</h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <table class="table table-bordered" role="table">
                      <thead>
                        <tr>
                          <th style="width: 10px" scope="col">#</th>
                          <th scope="col">Title</th>
                          <th scope="col">Description</th>
                          <th style="width: 40px" scope="col"></th>
                        </tr>
                      </thead>
                      <tbody>
                        @forelse ($tasks as $task)
                        <tr class="align-middle">
                          <td>{{ $loop->iteration }}</td>
                          <td>{{ $task->title }}</td>
                          <td>{{ $task->description}}</td>
                          <td><a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-block btn-success btn-sm ">Edit</a></td>
                          <td>
                          <form action="{{ route('tasks.destroy', $task->id) }}" onsubmit="event.preventDefault(); confirmDelete(this);" method="POST">
                              @csrf
                              @method('DELETE')
                              
                              <button  type="submit" class="btn btn-block btn-danger btn-sm">Delete</button>
                          </form></td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3">No Tasks Found</td>
                        </tr>
                        @endforelse
                      </tbody>
                    </table>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer clearfix">
                    <ul class="pagination pagination-sm m-0 float-end">
                      <li class="page-item">
                        <a class="page-link" href="#">«</a>
                      </li>
                      <li class="page-item">
                        <a class="page-link" href="#">1</a>
                      </li>
                      <li class="page-item">
                        <a class="page-link" href="#">2</a>
                      </li>
                      <li class="page-item">
                        <a class="page-link" href="#">3</a>
                      </li>
                      <li class="page-item">
                        <a class="page-link" href="#">»</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>

          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content-->
      </main>
      <script>
        function confirmDelete(form) {

    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
    }).then((result) => {
        if (result.isConfirmed) {
            form.submit(); // submit form if confirmed
        }
    });

    return false; // stop normal form submission
}
        </script>
@endsection('content')
