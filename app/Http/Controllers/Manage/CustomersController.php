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

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = User::customers()->get();
        return view('manage.customers.index')->withCustomers($customers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::whereIn('name',[ 'writer', 'user', 'translator'])->get();
        return view('manage.customers.create')->withRoles($roles);
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

        return redirect()->route('customers.show', $user->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer = User::customers()->where('id', $id)->with('roles')->first();
        return view('manage.customers.show')->withCustomer($customer);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = User::customers()->where('id', $id)->with('roles')->first();
        // $roles = Role::whereIn('name',[ 'writer', 'user', 'translator'])->first();
        return view('manage.customers.edit', compact('customer', 'roles'));
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
        $customer = User::customers()->where('id', $id)->with('roles')->first();
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->save();
        return redirect()->route('customers.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }
}
