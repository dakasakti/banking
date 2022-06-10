<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Ramsey\Uuid\Uuid;
use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use App\Models\Application;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('aplikasi.index', [
            'admin' => Admin::where('user_id', auth()->user()->id)->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('aplikasi.create', [
            'uuid' => Uuid::uuid4(),
            'apps' => Application::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAdminRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAdminRequest $request)
    {
        $validatedData = $request->validate([
            'invoice' => 'required|unique:admins|max:255',
            'name_id' => 'required',
            'no_hp' => 'required|max:12',
            'username' => 'nullable|max:35',
            'email' => 'required|max:35',
            'password' => 'required|max:35',
            'pin' => 'nullable|max:6',
        ]);

        $validatedData['user_id'] = auth()->user()->id;

        Admin::create($validatedData);

        return redirect(route('admin.index'))->with('success', 'NEW DATA HAS BEEN ADDED!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        if($admin->user->id !== auth()->user()->id)
        {
            abort(403);
        }

        return view('aplikasi.show', compact('admin'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        if($admin->user->id !== auth()->user()->id)
        {
            abort(403);
        }

        return view('aplikasi.edit', [
            'admin' => $admin,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAdminRequest  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAdminRequest $request, Admin $admin)
    {
        $rules = [
            'name_id' => 'required',
            'no_hp' => 'required|max:12',
            'username' => 'nullable|max:35',
            'email' => 'required|max:35',
            'password' => 'required|max:35',
            'pin' => 'nullable|max:6',
        ];

        if($request->invoice != $admin->invoice)
        {
            $rules['invoice'] = 'required|unique:admins';
        }

        $validatedData = $request->validate($rules);

        $validatedData['user_id'] = auth()->user()->id;

        $admin->update($validatedData);

        return redirect(route('admin.index'))->with('success', 'NEW DATA HAS BEEN EDITED!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
       Admin::destroy($admin->id);

        return redirect(route('admin.index'))->with('success', 'NEW DATA HAS BEEN DELETED');
    }
}
