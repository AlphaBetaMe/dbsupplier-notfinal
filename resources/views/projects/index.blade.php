@extends('layouts.sample')
@section('content')
<div class="py-12 mx-3 m-4">
  @if ($message = Session::get('success'))
  <div class="alert alert-success">
    <p>{{ $message }}</p>
  </div>
  @endif
</div>

<div class="py-12 mx-3 m-4">
    <div class="card">
        <div class="card-header">
            <div class="pull-left">
                <h4>Project List</h4>
            </div>
            
            <div class="pull-right">
            @can('permission-create')
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Add Project</button>
            @endcan
            </div>
            <br><br>
            <div class ="row">
                <div class="col">
                    <form action="{{ route('permissions.index') }}" method="GET" role="search">
                    <input type="text" class="form-control mr-2" name="term" placeholder="Search project..." id="term">
                        
                    </form>
                </div>
                <div class="col">
                    <a>
                        <button class="btn btn-info" type="submit" title="Search Permissions">
                            <span class="fa fa-search-plus"></span>
                        </button>
                    
                    </a>
                    <a href="{{ route('permissions.index') }}" class=" ">
                        
                            <button class="btn btn-danger" type="button" title="Refresh page">
                                <span class="fa fa-undo"></span>
                            </button>
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped table-hover table-condense table-responsive text-center">
                <tr>
                    <thead class="thead-dark">
                        
                        <th>Project ID</th>
                        <th>Project Name</th>
                        <th>Project Details</th>
                        <th>Project Budget</th>
                        <th>Project Leader</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </thead>
                </tr>
                @foreach ($projects as $project)
                <tr>
                    
                    <td>{{$project->projectId}}</td>
                    <td>{{$project->projectName}}</td>
                    <td>{{$project->projectDetails}}</td>
                    <td>{{$project->projectPrice}}</td>
                    <td>{{$project->user_id}}</td>
                    <td>{{$project->projectStart}}</td>
                    <td>{{$project->projectEnd}}</td>
                    <td>{{$project->projectStatus}}</td>
                    <td>
                      <a class="btn btn-info btn-sm" href=""><span class="bi bi-eye-fill"></span> View</a>
                        @can('permission-edit')
                        <a class="btn btn-primary btn-sm" href="{{ route('projects.edit',$project->id) }}"><span class="bi bi-pencil-square"></span> Edit</a>
                        @endcan
                        <a class="btn btn-danger btn-sm" href=""><span class="bi bi-trash-fill"></span>  Delete</a>
                    </td>
                </tr>
                @endforeach
            </table>
            {!! $projects->render() !!}
        </div>
    </div>
</div>

<!--Modal -->

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add new project</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      {!! Form::open(['route' => 'projects.store', 'method' => 'POST']) !!}
            {{ csrf_field() }}
          <div class="mb-3">
            <label for="projectName" class="col-form-label">Project Name:</label>
            <input type="text" name="projectName" class="form-control">
          </div>
          <div class="mb-3">
            <label for="projectDetails" class="col-form-label">Project Details:</label>
            <textarea class="form-control" name="projectDetails"></textarea>
          </div>
          <div class="mb-3">
            <label for="projectPrice" class="col-form-label">Project Price:</label>
            <input type="text" name="projectPrice"class="form-control" >
          </div>
          <div class="mb-3">
            <label for="user_id" class="col-form-label">Project Leader:</label>
            <input type="text" name="user_id" class="form-control" >
          </div>
          <div class="mb-3">
            <label for="projectStart" class="col-form-label">Project Start:</label>
            <input type="date" name="projectStart" class="form-control">
          </div>
          <div class="mb-3">
            <label for="projectEnd" class="col-form-label">Project Start:</label>
            <input type="date" name="projectEnd" class="form-control">
          </div>
          <div class="mb-3">
            <label for="projectStatus" class="col-form-label">Status:</label>
            <input type="text" name="projectStatus"class="form-control" >
          </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>



@endsection

<script>
    const exampleModal = document.getElementById('exampleModal')
        exampleModal.addEventListener('show.bs.modal', event => {
        // Button that triggered the modal
        const button = event.relatedTarget
        // Extract info from data-bs-* attributes
        const recipient = button.getAttribute('data-bs-whatever')
        // If necessary, you could initiate an AJAX request here
        // and then do the updating in a callback.
        //
        // Update the modal's content.
        // const modalTitle = exampleModal.querySelector('.modal-title')
        // const modalBodyInput = exampleModal.querySelector('.modal-body input')

        // modalTitle.textContent = `New message to ${recipient}`
        // modalBodyInput.value = recipient
        // })
</script>
