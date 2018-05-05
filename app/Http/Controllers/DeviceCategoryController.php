<?php

namespace App\Http\Controllers;

use App\DeviceCategory;
use Illuminate\Http\Request;

class DeviceCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = DeviceCategory::all();
        return view('device_categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('device_categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = new DeviceCategory();

        $category->name = $request->name;

        $category->save();

        return redirect()->route('device-categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DeviceCategory  $deviceCategory
     * @return \Illuminate\Http\Response
     */
    public function show(DeviceCategory $deviceCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DeviceCategory  $deviceCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(DeviceCategory $deviceCategory)
    {
        return view('device_categories.edit', compact('deviceCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DeviceCategory  $deviceCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DeviceCategory $deviceCategory)
    {
        $deviceCategory->name = $request->name;
        $deviceCategory->save();

        return redirect()->route('device-categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DeviceCategory  $deviceCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeviceCategory $deviceCategory)
    {
        //
    }
}
