@extends('layouts.sample')
@section('content')

<div class="container-fluid mt-2 py-2">
    @if(Session::has('message'))
    <div class="alert alert-success{{ Session::get('class') }} alert-dismissible fade show alert-custom"
        role="alert">
        {{ Session::get('message') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @elseif(Session::has('error'))
     <div class="alert alert-danger{{ Session::get('class') }} alert-dismissible fade show alert-custom"
        role="alert">
        {{ Session::get('error') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
</div>
<div class="mt-2 py-2">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header">
                Change Password

                <!-- admin -->
                </div>
                <div class="card-body">
                   
                     <form id="updatePasswordForm" action="{{ route('update-password.update', ['id' => Auth::id()]) }}" method="post">
                        @csrf
                        @method('PATCH')

                        <div class="form-group">
                            <label for="oldpassword">Old Password</label>
                            <input type="password" id="oldpassword" class="form-control" name="oldpassword" required>
                        </div>

                        <div class="form-group">
                            <label for="newpassword">New Password</label>
                            <input type="password" id="newpassword" class="form-control" name="newpassword" required>
                        </div>

                        <div class="form-group">
                            <label for="confirm-password">Confirm Password</label>
                            <input type="password" id="confirm-password" class="form-control" name="confirm-password" required>
                        </div>

                        <button type="submit" class="btn btn-dark">Update Password</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
</div>
<script>
    $(document).ready(function () {
        $('#updatePasswordForm').submit(function (event) {
            var newPassword = $('#newpassword').val();
            var confirmPassword = $('#confirm-password').val();

            if (newPassword !== confirmPassword) {
                alert('New password and confirmation password do not match.');
                event.preventDefault(); // Prevent form submission
            }
        });
    });
</script>

@endsection 