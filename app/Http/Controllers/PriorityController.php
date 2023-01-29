<?php

namespace App\Http\Controllers;

use App\Models\Priority;
use Illuminate\Http\Request;

class PriorityController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = Priority::all();
        return view('admin.priority.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.priority.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorepriorityRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required'
        ]);
        $save = Priority::create($request->all());
        return redirect()->route('admin.priority.index')->with('message', 'priority Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\priority  $priority
     * @return \Illuminate\Http\Response
     */
    public function show(priority $priority)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\priority  $priority
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $priority = Priority::findorfail($id);
        return view('admin.priority.edit', compact('priority'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatepriorityRequest  $request
     * @param  \App\Models\priority  $priority
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'name' => 'required'
        ]);
        $priority = Priority::findorfail($id);
        $data = [
            'name' => $request->name
        ];
        $update = $priority->update($data);
        return redirect()->route('admin.priority.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\priority  $priority
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $priority = Priority::findorfail($id);
        $delete = $priority->delete();
        return back();
    }
}
