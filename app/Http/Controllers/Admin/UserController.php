<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
  public function index()
  {
    return view('admin.users.index');
  }

  public function create()
  {
    //
  }

  public function store(Request $request)
  {
    //
  }

  public function show(User $user)
  {
    //
  }

  public function edit(User $user)
  {
    return view('admin.users.edit', compact('user'));
  }

  public function update(Request $request, User $user)
  {
    //
  }

  public function destroy(User $user)
  {
    //
  }
}
