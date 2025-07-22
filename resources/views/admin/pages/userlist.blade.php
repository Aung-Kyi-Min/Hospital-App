@extends('layouts.admin_layout')
@section('content')
<div class="container-fluid py-2">
  <div class="row">
    <div class="col-12">
      <div class="card my-4">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
          <div class="bg-gradient-dark shadow-dark border-radius-lg pt-4 pb-3">
            <h6 class="text-white text-capitalize ps-3">Users table</h6>
          </div>
        </div>
        <div class="card-body px-0 pb-2">
          <div class="table-responsive p-0">
            <table class="table table-striped table-hover tblborder table-bordered align-items-center mb-0">
              <thead>
                <tr>
                  <th class="text-center text-uppercase text-secondary text-s font-weight-bolder" style="min-width: 50px; width: 50px;">Sr No.</th>
                  <th class="text-center text-uppercase text-secondary text-s font-weight-bolder" style="min-width: 250px; width: 250px;">Image</th>
                  <th class="text-center text-uppercase text-secondary text-s font-weight-bolder" style="min-width: 180px; width: 180px;">Username</th>
                  <th class="text-center text-uppercase text-secondary text-s font-weight-bolder ps-2" style="min-width: 170px; width: 170px;">Email</th>
                  <th class="text-center text-uppercase text-secondary text-s font-weight-bolder" style="min-width: 220px; width: 220px;">Address</th>
                  <th class="text-center text-uppercase text-secondary text-s font-weight-bolder" style="min-width: 90px; width: 90px;">Gender</th>
                  <th class="text-center text-uppercase text-secondary text-s font-weight-bolder" style="min-width: 80px; width: 80px;">Age</th>
                  <th class="text-center text-uppercase text-secondary text-s font-weight-bolder ps-2" style="min-width: 150px; width: 150px;">Phone Number</th>
                  <th class="text-center text-uppercase text-secondary text-s font-weight-bolder" style="min-width: 80px; width: 80px;">Blood Group</th>
                  <th class="text-center text-uppercase text-secondary text-s font-weight-bolder" style="min-width: 220px; width: 220px;">Disease Description</th>
                  <th class="text-center text-uppercase text-secondary text-s font-weight-bolder" style="min-width: 130px; width: 130px;">Action</th>
                </tr>
              </thead>
              <tbody class="text-s text-secondary font-weight-bolder">
                @foreach($users as $key => $user)
                <tr>
                  <td style="text-align: right; border: 1px solid #dee2e6;">{{ $key + 1 }}</td>
                  <td class="text-center" style="border: 1px solid #dee2e6;">
                    <div class="d-flex justify-content-center px-2 py-1">
                      <div>
                        @if($user->image != null)
                          <img src="{{ asset("images/user/" . $user->image) }}" class="rounded-circle doctor-image" style="width: 60px; height: 60px; align-items: center;" name="image" alt="{{ $user->username }}">
                        @else
                            <img src="{{ asset('images/user/user_default.png') }}" name="image" class="rounded-circle doctor-image" style="width: 60px; height: 60px; align-items: center;" alt="User">
                        @endif                      
                      </div>
                    </div>
                  </td>
                  <td class="text-left" style="border: 1px solid #dee2e6;">{{ $user->username }}</td>
                  <td class="text-left" style="border: 1px solid #dee2e6;">{{ $user->email }}</td>
                  <td class="text-left" style="border: 1px solid #dee2e6;">{{ $user->address }}</td>
                  <td class="text-left" style="border: 1px solid #dee2e6;">{{ $user->gender }}</td>
                  <td style="text-align: right; border: 1px solid #dee2e6;">{{ $user->age }}</td>
                  <td style="text-align: right; border: 1px solid #dee2e6;">{{ $user->phone }}</td>
                  <td class="text-left" style="border: 1px solid #dee2e6;">{{ $user->blood_type }}</td>
                  <td class="text-left" style="border: 1px solid #dee2e6;">{{ $user->disease_description }}</td>
                  <td class="text-center" style="border: 1px solid #dee2e6;">
                    <a href="{{ route('admin.users.edit', $user->id) }}" class="text-success font-weight-bold text-xs pr-2" data-toggle="tooltip" data-original-title="Edit user">
                      <i class="fa fa-edit fa-2x" style="margin-right: 7px;"></i>
                    </a>
                    <form action="{{ route('admin.users.delete', $user->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this user?');">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-link text-danger p-0 m-0 align-baseline" data-toggle="tooltip" data-original-title="Delete user">
                        <i class="fa fa-trash fa-2x"></i>
                      </button>
                    </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <footer class="footer py-4  ">
    <div class="container-fluid">
      <div class="row align-items-center justify-content-lg-between">
        <div class="col-lg-6 mb-lg-0 mb-4">
          <div class="copyright text-center text-sm text-muted text-lg-start">
            © <script>
              document.write(new Date().getFullYear())
            </script>,
            made with <i class="fa fa-heart"></i> by
            <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Creative Tim</a>
            for a better web.
          </div>
        </div>
        <div class="col-lg-6">
          <ul class="nav nav-footer justify-content-center justify-content-lg-end">
            <li class="nav-item">
              <a href="https://www.creative-tim.com" class="nav-link text-muted" target="_blank">Creative Tim</a>
            </li>
            <li class="nav-item">
              <a href="https://www.creative-tim.com/presentation" class="nav-link text-muted" target="_blank">About Us</a>
            </li>
            <li class="nav-item">
              <a href="https://www.creative-tim.com/blog" class="nav-link text-muted" target="_blank">Blog</a>
            </li>
            <li class="nav-item">
              <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted" target="_blank">License</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>
</div>
@endsection