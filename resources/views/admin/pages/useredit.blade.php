{{-- resources/views/admin/pages/useredit.blade.php --}}
@extends('layouts.admin_layout')

@section('content')
<div class="container">
    <div class="container-fluid py-4 bg-gray-100 min-vh-100">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                <div class="card shadow-lg border-0 rounded-4">
                    <div class="card-header bg-gradient-dark text-white rounded-top-4 py-3 d-flex align-items-center">
                        <i class="fa fa-user-edit fa-lg me-2"></i>
                        <h4 class="mb-0">Edit User</h4>
                    </div>
                    <div class="card-body p-4">
                        <form action="{{ route('admin.users.update', $editUser->id) }}" method="POST" enctype="multipart/form-data" autocomplete="off">
                            @csrf
                            @method('PUT')
                            <div class="row g-4 align-items-center mb-4">
                                <div class="col-md-4 text-center">
                                    <img src="{{ $editUser->image ? asset('images/user/' . $editUser->image) : asset('images/user/user_default.png') }}" class="rounded-circle shadow border border-3 border-white mb-3" style="width: 110px; height: 110px; object-fit: cover; background: #f5f6fa;" alt="User Image">
                                    <div>
                                        <label class="form-label fw-semibold">Change Image</label>
                                        <input type="file" name="image" class="form-control form-control-sm mt-1">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label for="username" class="form-label">Username</label>
                                            <input type="text" class="form-control form-control-lg" id="username" name="username" value="{{ old('username', $editUser->username) }}" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" class="form-control form-control-lg" id="email" name="email" value="{{ old('email', $editUser->email) }}" required>
                                        </div>
                                        <div class="col-12">
                                            <label for="address" class="form-label">Address</label>
                                            <input type="text" class="form-control" id="address" name="address" value="{{ old('address', $editUser->address) }}">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="gender" class="form-label">Gender</label>
                                            <select class="form-select" id="gender" name="gender">
                                                <option value="Male" {{ old('gender', $editUser->gender) == 'Male' ? 'selected' : '' }}>Male</option>
                                                <option value="Female" {{ old('gender', $editUser->gender) == 'Female' ? 'selected' : '' }}>Female</option>
                                                <option value="Other" {{ old('gender', $editUser->gender) == 'Other' ? 'selected' : '' }}>Other</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="age" class="form-label">Age</label>
                                            <input type="number" class="form-control" id="age" name="age" value="{{ old('age', $editUser->age) }}" min="0">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="phone" class="form-label">Phone Number</label>
                                            <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $editUser->phone) }}">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="blood_type" class="form-label">Blood Group</label>
                                            <select class="form-select" id="blood_type" name="blood_type">
                                                <option value="A+" {{ old('blood_type', $editUser->blood_type) == 'A+' ? 'selected' : '' }}>A+</option>
                                                <option value="A-" {{ old('blood_type', $editUser->blood_type) == 'A-' ? 'selected' : '' }}>A-</option>
                                                <option value="B+" {{ old('blood_type', $editUser->blood_type) == 'B+' ? 'selected' : '' }}>B+</option>
                                                <option value="B-" {{ old('blood_type', $editUser->blood_type) == 'B-' ? 'selected' : '' }}>B-</option>
                                                <option value="AB+" {{ old('blood_type', $editUser->blood_type) == 'AB+' ? 'selected' : '' }}>AB+</option>
                                                <option value="AB-" {{ old('blood_type', $editUser->blood_type) == 'AB-' ? 'selected' : '' }}>AB-</option>
                                                <option value="O+" {{ old('blood_type', $editUser->blood_type) == 'O+' ? 'selected' : '' }}>O+</option>
                                                <option value="O-" {{ old('blood_type', $editUser->blood_type) == 'O-' ? 'selected' : '' }}>O-</option>
                                            </select>
                                        </div>
                                        <div class="col-12">
                                            <label for="disease_description" class="form-label">Disease Description</label>
                                            <textarea class="form-control" id="disease_description" name="disease_description" rows="2">{{ old('disease_description', $editUser->disease_description) }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="my-4">
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('admin.users_list') }}" class="btn btn-secondary">Cancel</a>
                                <button type="submit" class="btn btn-primary">Update User</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
