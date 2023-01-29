<?php

namespace App\Http\Controllers;

use App\Models\Label;
use Illuminate\Http\Request;

class LabelController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = Label::all();
        return view('admin.label.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.label.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorelabelRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required'
        ]);
        $save = Label::create($request->all());
        return redirect()->route('admin.label.index')->with('message', 'label Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\label  $label
     * @return \Illuminate\Http\Response
     */
    public function show(label $label)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\label  $label
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $label = Label::findorfail($id);
        return view('admin.label.edit', compact('label'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatelabelRequest  $request
     * @param  \App\Models\label  $label
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'name' => 'required'
        ]);
        $label = Label::findorfail($id);
        $data = [
            'name' => $request->name
        ];
        $update = $label->update($data);
        return redirect()->route('admin.label.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\label  $label
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $label = Label::findorfail($id);
        $delete = $label->delete();
        return back();
    }
}
