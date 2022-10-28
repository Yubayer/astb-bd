<?php

namespace App\Http\Controllers\Test;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Role;
use App\User;

class TestController extends Controller
{
    public function test() {
        $users = User::with('role')->get();
        echo $users;
    }
}
