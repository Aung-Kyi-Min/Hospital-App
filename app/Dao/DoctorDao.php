<?php

namespace App\Dao;

use App\Contracts\Dao\DoctorDaoInterface;
use Illuminate\Support\Facades\Hash;
use App\Models\Doctor;

class DoctorDao implements DoctorDaoInterface
{
    /**
     * Show Doctor
     * @return object
    */
    public function get(): object
    {
        return Doctor::paginate(3);
    }

    /**
     * Store Doctor
     * @return void
    */
    public function store() : void
    {
        $doctor = New Doctor();
        $doctor->doctor_name = request('doctor_name');
        $doctor->email = request('email');
        $doctor->password = Hash::make(request('password'));
        $doctor->phone = request('phone');
        $doctor->specialization = request('specialization');
        $doctor->experience = request('experience');
        $doctor->status = request('status');
        $doctor->bio = request('bio');
        $doctor->availability = request('availability');
        $image = request()->file('profile_image');
        $imageName = $image->getClientOriginalName();
        $doctor->image = $imageName;
        
        $doctor->save();
    }

    /**
     * Return Specific Doctor
     * @return object
    */
    public function edit($id) : object
    {
        return Doctor::findOrFail($id);
    }

    /**
     * Update Workout
     * @return void
    */
    public function update($id, array $data): void
    {
        $doctor = Doctor::findOrFail($id);
        $doctor->doctor_name = $data['doctor_name'];
        $doctor->email = $data['email'];
        $doctor->profile_image = $data['profile_image'] ?? $doctor->profile_image;
        $doctor->specialization = $data['specialization'];
        $doctor->experience = $data['experience'];
        $doctor->qualification = $data['qualification'];
        $doctor->bio = $data['bio'];
        $doctor->phone = $data['phone'];
        $doctor->status = $data['status'];  
        $doctor->availability = $data['availability'];
        $doctor->save();
    }

    /**
     * Destroy Doctor
     * @return void 
    */
    public function destroy($id) : void
    {
        $doctor = Doctor::findOrFail($id);
        $doctor->delete();
    }
}