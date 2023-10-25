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
            'admin' => Admin::where('user_id', auth()->user()->id)->latest()->get(),
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
            'uuid' => Uuid::uuid4()->toString(),
            'apps' => Application::where('status', true)->get(),
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
        $datas = $request->validated();
        $datas['user_id'] = auth()->user()->id;

        Admin::create($datas);

        return to_route('admin.index')->with('success', 'NEW DATA HAS BEEN ADDED!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        if ($admin->user_id !== auth()->user()->id) {
            return abort(403);
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
        if ($admin->user_id !== auth()->user()->id) {
            return abort(403);
        }

        return view('aplikasi.edit', compact('admin'));
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
        $datas = $request->validated();

        foreach ($datas as $key => $data) {
            if ($data == null || $admin[$key] == $data) {
                unset($datas[$key]);
            }
        }

        if (empty($datas)) {
            return to_route('admin.index')->with(['success' => 'NO DATA HAS BEEN CHANGED!', 'type' => 'red']);
        }

        $admin->update($datas);
        return to_route('admin.index')->with('success', 'NEW DATA HAS BEEN EDITED!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        $admin->delete();
        return to_route('admin.index')->with('success', 'NEW DATA HAS BEEN DELETED');
    }
}
