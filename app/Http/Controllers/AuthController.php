<?php

namespace App\Http\Controllers;
use App\Contracts\Services\AuthServiceInterface;
use App\Http\Requests\RegisterCreateRequest;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;


class AuthController extends Controller
{
    protected $authService;

    public function __construct(AuthServiceInterface $authService)
    {
        $this->authService = $authService;
    }

    public function login()
    {
        return view('Auth.login');
    }

    public function register()
    {
        return view('Auth.register');
    }

    public function registerUser(RegisterCreateRequest $request)
    {
        $validatedData = $request->validated();
        $this->authService->register([
            'username' => $validatedData['username'],
            'email' => $validatedData['email'],
            'password' => $validatedData['password'],
            'role' => 2, 
            'address' => $validatedData['address'],
            'gender' => $validatedData['gender'],
            'age' => $validatedData['age'],
            'blood_type' => $validatedData['blood_type'],
            'disease_description' => $validatedData['disease_description'],
            'phone' => $validatedData['phone'],
        ]);

        return redirect()->route('auth.login')
            ->with('message', 'Your have Registered Successfully...');
    }

    public function LoginUser(LoginRequest $request)
    {
        $credentials = [
            'email' => $request['email'],
            'password' => $request['password'],
        ];

        $user = User::where('email', $request['email'])->first();

        if (Auth::attempt($credentials)) {
            $token = $user->createToken('token')->plainTextToken;
            if ($user->role == 1) { 
                return redirect()->route('admin.index')
                    ->with('message', 'You Have Successfully logined...')
                    ->with('token', $token);
            } else if ($user->role == 2) {
                return redirect()->route('user.index')
                    ->with('message', 'You Have Successfully logined...')
                    ->with('token', $token);
            }

        } else {
            return back()->withErrors(['email' => 'Invalid email or password']);
        }
    }

    public function LogoutUser(Request $request)
    {
        Auth::logout();
        
        // Revoke all tokens for the current user
        if ($request->user()) {
            $request->user()->tokens()->delete();
        }
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect()->route('user.index')
            ->with('logoutMessage', 'You have been successfully logged out.');
    }
}
