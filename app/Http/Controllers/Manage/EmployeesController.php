<?php

namespace App\Http\Controllers\Manage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Role;
use DB;
use Session;
use Hash;
use Input;
use App\Http\Requests\StoreCustomersValidatoin;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = User::employees()->get();
        return view('manage.employees.index')->withEmployees($employees);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::whereNotIn('name',[ 'writer', 'user', 'translator'])->get();
        return view('manage.employees.create')->withRoles($roles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCustomersValidatoin $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        $user->syncRoles($request->input('roles',[]));

        return redirect()->route('employees.show', $user->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = User::employees()->where('id', $id)->first();
        return view('manage.employees.show')->withEmployee($employee);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = User::employees()->where('id', $id)->first();
        // $roles = Role::whereIn('name',[ 'writer', 'user', 'translator'])->first();
        return view('manage.employees.edit', compact('employee', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validateWith([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email,'.$id
        ]);
        $employee = User::employees()->where('id', $id)->first();
        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->save();
        return redirect()->route('employees.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
