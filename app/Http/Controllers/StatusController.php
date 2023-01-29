<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = Status::all();
        return view('admin.status.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.status.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorestatusRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required'
        ]);
        $save = Status::create($request->all());
        return redirect()->route('admin.status.index')->with('message', 'status Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\status  $status
     * @return \Illuminate\Http\Response
     */
    public function show(status $status)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\status  $status
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $status = Status::findorfail($id);
        return view('admin.status.edit', compact('status'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatestatusRequest  $request
     * @param  \App\Models\status  $status
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'name' => 'required'
        ]);
        $status = status::findorfail($id);
        $data = [
            'name' => $request->name
        ];
        $update = $status->update($data);
        return redirect()->route('admin.status.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\status  $status
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $status = Status::findorfail($id);
        $delete = $status->delete();
        return back();
    }
}
