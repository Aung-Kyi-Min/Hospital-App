<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\User;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Contracts\Services\UserServiceInterface;
use App\Http\Requests\AdminUserEditRequest;
use App\Contracts\Services\DoctorServiceInterface;
use App\Http\Requests\AdminDoctorEditRequest;

class AdminController extends Controller
{
    private $userService;
    private $doctorService;
 
    /**
      * Create a new controller instance.
      * @param userInterface $taskServiceInterface
      * @return void
      */
 
    public function __construct(UserServiceInterface $userServiceInterface, DoctorServiceInterface $doctorServiceInterface) 
    {
       $this->userService = $userServiceInterface;
       $this->doctorService = $doctorServiceInterface;
    }

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

    // public function updateDoctor(Request $request, $id)
    // {
    //     try {
    //         $doctor = Doctor::find($id);
    //         $doctor->update($request->all());
    //         return redirect()->route('admin.doctors_list')->with('success', 'Updated successfully');
    //     } catch (\Exception $e) {
    //         Log::error('Profile update error: ' . $e->getMessage());
    //         return redirect()->back()->withInput()->with('error', 'There was an error updating the doctor.');
    //     }
    // }

    public function updateDoctor(AdminDoctorEditRequest $request, $id)        
    {
        try {
            $validatedData = $request->validated();
            $updateData = [
                'doctor_name' => $validatedData['doctor_name'],
                'email' => $validatedData['email'],
                'specialization' => $validatedData['specialization'],
                'phone' => $validatedData['phone'],
                'status' => $validatedData['status'],
                'bio' => $validatedData['bio'],
                'qualification' => $validatedData['qualification'],
                'experience' => $validatedData['experience'],
                'availability' => $validatedData['availability']
            ];

            if (isset($validatedData['profile_image'])) {
                $path = public_path('images/doctors');
                if (!file_exists($path)) {
                    mkdir($path, 0777, true);
                }   

                $image = $validatedData['profile_image'];
                $imageName = $image->getClientOriginalName();
                $image->move($path, $imageName);
                $updateData['profile_image'] = $imageName;
            }

            $this->doctorService->update($id, $updateData);

            return redirect()->route('admin.doctors_list')->with('success', 'Doctor updated successfully');
        } catch (\Exception $e) {
            Log::error('Doctor update error: ' . $e->getMessage());
            return redirect()->back()->withInput()->with('error', 'There was an error updating Doctor.');
        }
    }

    // public function updateUser(Request $request, $id)
    // {
    //     try {
    //         $user = User::find($id);
    //         $user->update($request->all());
    //         return redirect()->route('admin.users_list')->with('success', 'Updated successfully');
    //     } catch (\Exception $e) {
    //         Log::error('Profile update error: ' . $e->getMessage());
    //         return redirect()->back()->withInput()->with('error', 'There was an error updating the user.');
    //     }
    // }

    public function updateUser(AdminUserEditRequest $request, $id)        
    {
        try {
            $validatedData = $request->validated();
            $updateData = [
                'username' => $validatedData['username'],
                'address' => $validatedData['address'],
                'gender' => $validatedData['gender'],
                'phone' => $validatedData['phone'],
                'disease_description' => $validatedData['disease_description'],
                'blood_type' => $validatedData['blood_type']
            ];

            if (isset($validatedData['image'])) {
                $path = public_path('images/user');
                if (!file_exists($path)) {
                    mkdir($path, 0777, true);
                }

                $image = $validatedData['image'];
                $imageName = $image->getClientOriginalName();
                $image->move($path, $imageName);
                $updateData['image'] = $imageName;
            }

            $this->userService->update($id, $updateData);

            return redirect()->route('admin.users_list')->with('success', 'User updated successfully');
        } catch (\Exception $e) {
            Log::error('User update error: ' . $e->getMessage());
            return redirect()->back()->withInput()->with('error', 'There was an error updating User.');
        }
    }

    public function deleteUser($id)
    {
        try {
            $user = User::findOrFail($id);
            $user->delete();
            return redirect()->route('admin.users_list')->with('success', 'User deleted successfully');
        } catch (\Exception $e) {
            Log::error('User delete error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'There was an error deleting the user.');
        }
    }
    
    public function deleteDoctor($id)
    {
        try {
            $doctor = Doctor::findOrFail($id);
            $doctor->delete();
            return redirect()->route('admin.doctors_list')->with('success', 'Doctor deleted successfully');
        } catch (\Exception $e) {
            Log::error('Doctor delete error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'There was an error deleting the doctor.');
        }
    }

    public function profile()
    {
        $admin = auth('web')->user();
        return view('admin.pages.profile', compact('admin'));
    }

    public function updateProfile(Request $request)
    {
        try {
            $admin = auth('web')->user();
            
            $request->validate([
                'username' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email,' . $admin->id,
                'phone' => 'nullable|string|max:20',
                'address' => 'nullable|string|max:500',
            ]);

            $updateData = [
                'username' => $request->username,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
            ];

            if ($request->hasFile('image')) {
                $path = public_path('images/user');
                if (!file_exists($path)) {
                    mkdir($path, 0777, true);
                }

                $image = $request->file('image');
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move($path, $imageName);
                $updateData['image'] = $imageName;
            }

            $admin->update($updateData);

            return redirect()->route('admin.profile')->with('success', 'Profile updated successfully');
        } catch (\Exception $e) {
            Log::error('Admin profile update error: ' . $e->getMessage());
            return redirect()->back()->withInput()->with('error', 'There was an error updating your profile.');
        }
    }

    public function changePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
            'new_password_confirmation' => 'required'
        ], [
            'current_password.required' => 'Current password is required.',
            'new_password.required' => 'New password is required.',
            'new_password.min' => 'New password must be at least 8 characters.',
            'new_password.confirmed' => 'Password confirmation does not match.',
            'new_password_confirmation.required' => 'Password confirmation is required.'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $admin = auth('web')->user();

        // Check if current password is correct
        if (!Hash::check($request->current_password, $admin->password)) {
            return redirect()->back()->withErrors(['current_password' => 'Current password is incorrect.'])->withInput();
        }

        // Update password
        $admin->password = Hash::make($request->new_password);
        $admin->save();

        return redirect()->route('admin.profile')->with('success', 'Password changed successfully!');
    }
}
