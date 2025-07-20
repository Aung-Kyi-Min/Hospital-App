@extends('layouts.admin_layout')
@section('content')
<div class="container">
    <div class="container-fluid py-4 bg-gray-100 min-vh-100">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                <div class="card shadow-lg border-0 rounded-4">
                    <div class="card-header bg-gradient-dark text-white rounded-top-4 py-3 d-flex align-items-center">
                        <i class="fa fa-user-md fa-lg me-2"></i>
                        <h4 class="mb-0">Edit Doctor</h4>
                    </div>
                    <div class="card-body p-4">
                        <form action="{{ route('admin.doctors.update', $doctor->id) }}" method="POST" enctype="multipart/form-data" autocomplete="off">
                            @csrf
                            @method('PUT')
                            <div class="row g-4 align-items-center mb-4">
                                <div class="col-md-4 text-center">
                                    <img src="{{ $doctor->profile_image ? asset('images/doctors/' . $doctor->profile_image) : asset('images/doctors/default.jpeg') }}" class="rounded-circle shadow border border-3 border-white mb-3" style="width: 110px; height: 110px; object-fit: cover; background: #f5f6fa;" alt="Doctor Image">
                                    <div>
                                        <label class="form-label fw-semibold">Change Image</label>
                                        <input type="file" name="profile_image" class="form-control form-control-sm mt-1">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label for="doctor_name" class="form-label">Doctor Name</label>
                                            <input type="text" class="form-control form-control-lg" id="doctor_name" name="doctor_name" value="{{ old('doctor_name', $doctor->doctor_name) }}" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" class="form-control form-control-lg" id="email" name="email" value="{{ old('email', $doctor->email) }}" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="specialization" class="form-label">Specialization</label>
                                            <select class="form-select" id="specialization" name="specialization">
                                                <option value="Cardiology" {{ old('specialization', $doctor->specialization) == 'Cardiology' ? 'selected' : '' }}>Cardiology</option>
                                                <option value="Neurology" {{ old('specialization', $doctor->specialization) == 'Neurology' ? 'selected' : '' }}>Neurology</option>
                                                <option value="Oncology" {{ old('specialization', $doctor->specialization) == 'Oncology' ? 'selected' : '' }}>Oncology</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="qualification" class="form-label">Qualification</label>
                                            <input type="text" class="form-control" id="qualification" name="qualification" value="{{ old('qualification', $doctor->qualification) }}">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="experience" class="form-label">Experience</label>
                                            <input type="text" class="form-control" id="experience" name="experience" value="{{ old('experience', $doctor->experience) }}">
                                        </div>
                                        <div class="col-12">
                                            <label for="bio" class="form-label">Bio</label>
                                            <textarea class="form-control" id="bio" name="bio" rows="2">{{ old('bio', $doctor->bio) }}</textarea>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="phone" class="form-label">Phone Number</label>
                                            <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $doctor->phone) }}">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="status" class="form-label">Status</label>
                                            <select class="form-select" id="status" name="status">
                                                <option value="active" {{ old('status', $doctor->status) == 'active' ? 'selected' : '' }}>Active</option>
                                                <option value="inactive" {{ old('status', $doctor->status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                            </select>
                                        </div>
                                        <div class="col-12">
                                            <label for="availability" class="form-label">Availability</label>
                                            <input type="text" class="form-control" id="availability" name="availability" value="{{ old('availability', is_array($doctor->availability) ? implode(',', $doctor->availability) : $doctor->availability) }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="my-4">
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('admin.doctors_list') }}" class="btn btn-secondary">Cancel</a>
                                <button type="submit" class="btn btn-primary">Update Doctor</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection