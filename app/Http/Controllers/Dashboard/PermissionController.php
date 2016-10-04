<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Permission;
use App\Role;
use DB;

class PermissionController extends Controller
{
    /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {
      $permissions = Permission::orderBy('id', 'DESC')->paginate(10);

      return view('permissions.index', compact('permissions'))
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

      return view('permissions.create', compact('role'));
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
          'name' => 'required|unique:permissions,name',
          'display_name' => 'required',
          'description' => 'required',
      ]);

      $permission = new Permission();
      $permission->name = $request->input('name');
      $permission->display_name = $request->input('display_name');
      $permission->description = $request->input('description');
      $permission->save();

      return redirect()->route('permissions.index')
                      ->with('success', 'Permission created successfully');
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
      $permission = Permission::find($id);
      $permissionRoles = Role::join('permission_role', 'permission_role.role_id', '=', 'roles.id')
          ->where('permission_role.permission_id', $id)
          ->get();

      return view('permissions.show', compact('permission', 'permissionRoles'));
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
      $permission = Permission::find($id);
      $role = Role::get();
      $permissionRoles = DB::table('permission_role')->where('permission_role.permission_id', $id)
          ->lists('permission_role.role_id', 'permission_role.role_id');

      return view('permissions.edit', compact('permission', 'role', 'permissionRoles'));
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
          'display_name' => 'required',
          'description' => 'required',
      ]);

      $permission = Permission::find($id);
      $permission->display_name = $request->input('display_name');
      $permission->description = $request->input('description');
      $permission->save();

      return redirect()->route('permissions.index')
                      ->with('success', 'Permission updated successfully');
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
      DB::table('permissions')->where('id', $id)->delete();

      return redirect()->route('permissions.index')
                      ->with('success', 'Permission deleted successfully');
  }
}
