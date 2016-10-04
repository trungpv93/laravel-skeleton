<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Role;
use DB;
use Carbon\Carbon;
use Hash;
use Validator;

class UserController extends Controller
{
    /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {
      $users = User::orderBy('id', 'DESC')->paginate(10);

      return view('users.index', compact('users'))
        ->with('i', ($request->input('page', 1) - 1) * 10);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      $role = Role::get();

      return view('users.create', compact('role'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param \Illuminate\Http\Request $request
   *
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
      $this->validate($request, [
        'username' => 'required|max:255|unique:users',
        'name' => 'required|max:255',
        'email' => 'required|email|max:255|unique:users',
        'password' => 'required|min:6|confirmed',
        'role' => 'required',
    ]);

      $user = new User();
      $user->username = $request->input('username');
      $user->name = $request->input('name');
      $user->email = $request->input('email');
      $user->password = bcrypt($request->input('password'));
      $user->last_online_at = Carbon::now();
      $user->save();

      foreach ($request->input('role') as $key => $value) {
          $user->attachRole($value);
      }

      return redirect()->route('users.index')
                    ->with('success', 'User created successfully');
  }
  /**
   * Display the specified resource.
   *
   * @param int $id
   *
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
      $user = User::find($id);
      $userRoles = Role::join('role_user', 'role_user.role_id', '=', 'roles.id')
        ->where('role_user.user_id', $id)
        ->get();

      return view('users.show', compact('user', 'userRoles'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param int $id
   *
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
      $user = User::find($id);
      $role = Role::get();
      $userRoles = DB::table('role_user')->where('role_user.user_id', $id)
        ->lists('role_user.role_id', 'role_user.role_id');

      return view('users.edit', compact('user', 'role', 'userRoles'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param \Illuminate\Http\Request $request
   * @param int                      $id
   *
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
      $this->validate($request, [
        'name' => 'required',
        'current_password' => 'required',
        'role' => 'required',
    ]);

      $user = User::find($id);
      if (Hash::check($request->input('current_password'), $user->password)) {
          $user->name = $request->input('name');
          if (null !== $request->input('password') && $request->input('password') != '') {
              $valid = ['password' => 'required|min:6|confirmed'];
              $v = Validator::make($request->all(), $valid);

              if ($v->fails()) {
                  return redirect()->route('users.edit', $id)
                          ->withErrors(['password' => 'Password and Confirm Password is not match!', 'password_confirmation' => 'Can\'t change password.']);
              }

              $user->password = bcrypt($request->input('password'));
          }
          $user->save();

          DB::table('role_user')->where('role_user.user_id', $id)
        ->delete();

          foreach ($request->input('role') as $key => $value) {
              $user->attachRole($value);
          }

          return redirect()->route('users.index')
                    ->with('success', 'User updated successfully');
      } else {
          return redirect()->route('users.edit', $id)
                    ->withErrors(['current_password' => 'The current password field is not match.']);
      }
  }
  /**
   * Remove the specified resource from storage.
   *
   * @param int $id
   *
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
      DB::table('users')->where('id', $id)->delete();

      return redirect()->route('users.index')
                    ->with('success', 'User deleted successfully');
  }
}
