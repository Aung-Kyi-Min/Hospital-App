@extends('layouts.admin_layout')
@section('content')
<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-gradient-dark text-white">
                    <h4 class="mb-0">Edit Doctor</h4>
                </div>
                <div class="card-body">
                    {{-- //{{ route('admin.doctors.update', $doctor->id) }} --}}
                    <form action="{{ route('admin.doctors.update', $doctor->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <div class="col-md-4 text-center">
                                <img src="{{ $doctor->profile_image ? asset('images/doctors/' . $doctor->profile_image) : asset('images/doctors/default.jpeg') }}" class="rounded-circle mb-2" style="width: 100px; height: 100px; object-fit: cover;" alt="Doctor Image">
                                <div class="mt-2">
                                    <input type="file" name="profile_image" class="form-control form-control-sm">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label for="doctor_name" class="form-label">Doctor Name</label>
                                    <input type="text" class="form-control" id="doctor_name" name="doctor_name" value="{{ old('doctor_name', $doctor->doctor_name) }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $doctor->email) }}" required>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="specialization" class="form-label">Specialization</label>
                                        <input type="text" class="form-control" id="specialization" name="specialization" value="{{ old('specialization', $doctor->specialization) }}">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="qualification" class="form-label">Qualification</label>
                                        <input type="text" class="form-control" id="qualification" name="qualification" value="{{ old('qualification', $doctor->qualification) }}">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="bio" class="form-label">Bio</label>
                                    <textarea class="form-control" id="bio" name="bio" rows="2">{{ old('bio', $doctor->bio) }}</textarea>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="phone" class="form-label">Phone Number</label>
                                        <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $doctor->phone) }}">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="status" class="form-label">Status</label>
                                        <select class="form-select" id="status" name="status">
                                            <option value="active" {{ old('status', $doctor->status) == 'active' ? 'selected' : '' }}>Active</option>
                                            <option value="inactive" {{ old('status', $doctor->status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="availability" class="form-label">Availability</label>
                                    <input type="text" class="form-control" id="availability" name="availability" value="{{ old('availability', is_array($doctor->availability) ? implode(',', $doctor->availability) : $doctor->availability) }}">
                                </div>
                            </div>
                        </div>
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
@endsection