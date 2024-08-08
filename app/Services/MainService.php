<?php

namespace App\Services;
use App\Models\User;

class MainService
{
    public function dashboard(){
        return User::where('role', 'user')->count();
    }
}