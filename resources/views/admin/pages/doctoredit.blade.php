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
                                            <div id="availability-fields"></div>
                                            <button type="button" class="btn btn-sm btn-outline-primary my-2" onclick="addAvailabilityField()">Add Day</button>
                                            <input type="hidden" id="availability" name="availability" value="">
                                            <div class="form-text">Set available days and times. Example: Monday: 8 AM - 3 PM</div>
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

@push('scripts')
<script>
    // Parse initial value (from old input or DB)
    let availability = {!! json_encode(old('availability', is_array($doctor->availability) ? $doctor->availability : (json_decode($doctor->availability, true) ?: []))) !!};

    if (typeof availability === 'string') {
        try {
            availability = JSON.parse(availability);
        } catch (e) {
            availability = {};
        }
    }
    if (!availability || typeof availability !== 'object') {
        availability = {};
    }

    function renderAvailabilityFields() {
        const container = document.getElementById('availability-fields');
        container.innerHTML = '';
        Object.entries(availability).forEach(([day, time], idx) => {
            container.innerHTML += `
                <div class="row mb-2 align-items-center" data-idx="${idx}">
                    <div class="col-4">
                        <input type="text" class="form-control" placeholder="Day" value="${day}" onchange="updateDay(${idx}, this.value)">
                    </div>
                    <div class="col-6">
                        <input type="text" class="form-control" placeholder="Time" value="${time}" onchange="updateTime(${idx}, this.value)">
                    </div>
                    <div class="col-2">
                        <button type="button" class="btn btn-danger btn-sm" onclick="removeAvailabilityField(${idx})">&times;</button>
                    </div>
                </div>
            `;
        });
        updateHiddenInput();
    }

    function addAvailabilityField() {
        // Add a new empty day/time
        availability[''] = '';
        renderAvailabilityFields();
    }

    function updateDay(idx, value) {
        const keys = Object.keys(availability);
        const oldKey = keys[idx];
        const val = availability[oldKey];
        delete availability[oldKey];
        availability[value] = val;
        renderAvailabilityFields();
    }

    function updateTime(idx, value) {
        const keys = Object.keys(availability);
        const key = keys[idx];
        availability[key] = value;
        updateHiddenInput();
    }

    function removeAvailabilityField(idx) {
        const keys = Object.keys(availability);
        delete availability[keys[idx]];
        renderAvailabilityFields();
    }

    function updateHiddenInput() {
        document.getElementById('availability').value = JSON.stringify(availability);
    }

    // Initial render
    document.addEventListener('DOMContentLoaded', renderAvailabilityFields);
</script>
@endpush