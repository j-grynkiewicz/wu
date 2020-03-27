<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Group;
use App\User;
class MemberController extends Controller
{
    public function index()
    {
        $groups = Group::all()->toArray();
        $users = User::all()->toArray();
        return view('group.member', compact('groups'));
    }
}
