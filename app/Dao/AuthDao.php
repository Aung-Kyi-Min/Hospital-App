<?php

namespace App\Dao;

use App\Contracts\Dao\AuthDaoInterface;
use App\Models\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

use function Ramsey\Uuid\v1;

class AuthDao implements AuthDaoInterface
{
    public function register(array $data): object
    {
        $user = User::create([
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),   
            // 'image' => $data['image'],
            'address' => $data['address'],
            'gender' => $data['gender'],    
            'age' => $data['age'],
            'blood_type' => $data['blood_type'],
            'phone' => $data['phone'],
            'disease_description'=> $data['disease_description'],
            'role' => 2, // Add default role for regular users
        ]);

        return $user;
    }
}