<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Http\Requests\StoreApplicationRequest;
use App\Http\Requests\UpdateApplicationRequest;
use Exception;
use Illuminate\Support\Facades\Log;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('category.index', [
            'apps' => Application::orderBy('status')->latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreApplicationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreApplicationRequest $request)
    {
        $datas = $request->validated();

        $id = auth()->user()->id;
        if ($id !== 1) {
            $datas['status'] = false;
        }

        $datas['user_id'] = $id;

        Application::create($datas);
        return redirect(route('application.index'))->with('success', 'NEW DATA HAS BEEN ADDED!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function show(Application $application)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function edit(Application $application)
    {
        if (auth()->user()->id !== 1) {
            return abort(403);
        }

        return view('category.edit', compact('application'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateApplicationRequest  $request
     * @param  \App\Models\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateApplicationRequest $request, Application $application)
    {
        if (auth()->user()->id !== 1) {
            return abort(403);
        }

        $datas = $request->validated();
        if (!isset($datas['status'])) {
            $datas['status'] = false;
        }

        foreach ($datas as $key => $data) {
            if ($data === null || $data == $application[$key]) {
                unset($datas[$key]);
            }
        }

        if (empty($datas)) {
            return to_route('application.index')->with(['success' => 'NO DATA HAS BEEN CHANGED!', 'type' => 'red']);
        }

        $application->update($datas);
        return to_route('application.index')->with('success', 'NEW DATA HAS BEEN EDITED!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function destroy(Application $application)
    {
        if (auth()->user()->id !== 1) {
            return abort(403);
        }

        try {
            $application->delete();
        } catch (Exception $e) {
            Log::error('DELETE_APP', ['message' => $e->getMessage()]);
            return to_route('application.index')->with(['success' => 'ERROR: DATA COULD NOT BE DELETED.', 'type' => 'red']);
        }

        return to_route('application.index')->with('success', 'NEW DATA HAS BEEN DELETED');
    }
}
