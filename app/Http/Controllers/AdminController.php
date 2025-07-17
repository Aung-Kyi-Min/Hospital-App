<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\User;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
class AdminController extends Controller
{
    public function index()
    {
        return view('admin.pages.index');
    }

    public function UserList()
    {
        $users = User::all();
        $editUser = null;
        return view('admin.pages.userlist', compact('users'));
    }

    public function editUser($id)
    {
        $users = User::all();
        $editUser = User::find($id);
        return view('admin.pages.useredit', compact('users', 'editUser'));
    }

    public function DoctorList()
    {
        $doctors = Doctor::all(); // or Doctor::paginate(10) for pagination
        return view('admin.pages.doctorlist', compact('doctors'));
    }

    public function Appointment()
    {
        $appointments = Appointment::all(); // or Doctor::paginate(10) for pagination
        return view('admin.pages.appointments', compact('appointments'));
    }

   

    public function editDoctor($id)
    {
        $doctor = Doctor::find($id);
        return view('admin.pages.doctoredit', compact('doctor'));
    }

    public function updateDoctor(Request $request, $id)
    {
        try {
            $doctor = Doctor::find($id);
            $doctor->update($request->all());
            return redirect()->route('admin.doctors_list')->with('success', 'Updated successfully');
        } catch (\Exception $e) {
            Log::error('Profile update error: ' . $e->getMessage());
            return redirect()->back()->withInput()->with('error', 'There was an error updating the doctor.');
        }
    }

    public function updateUser(Request $request, $id)
    {
        try {
            $user = User::find($id);
            $user->update($request->all());
            return redirect()->route('admin.users_list')->with('success', 'Updated successfully');
        } catch (\Exception $e) {
            Log::error('Profile update error: ' . $e->getMessage());
            return redirect()->back()->withInput()->with('error', 'There was an error updating the user.');
        }
    }

    
}
