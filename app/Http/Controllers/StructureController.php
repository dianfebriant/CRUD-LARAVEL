<?php

namespace App\Http\Controllers;

use App\Models\Structure;
use Illuminate\Http\Request;

class StructureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $structure = Structure::latest()->paginate(10);
        return view('admin.structure.index', compact('structure'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.structure.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required',
            'position' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048'

        ]);

        $structure = new Structure();
        $structure->name = $request->input('name');
        $structure->slug = \Str::slug(request('name'));
        $structure->position = $request->input('position');

        if($request->hasFile('image')){
            $image = $request->file('image');
            $extension = $image->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $image->move('uploads/structure/', $filename);
            $structure->image = $filename;
        }
        $structure->save();
            //redirect dengan pesan sukses
            return redirect()->route('structure.index')->with(['success' => 'Data Berhasil Disimpan!']);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Structure  $structure
     * @return \Illuminate\Http\Response
     */
    public function show(Structure $structure)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Structure  $structure
     * @return \Illuminate\Http\Response
     */
    public function edit(Structure $structure)
    {
        // 
        return view('admin.structure.edit', compact('structure'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Structure  $structure
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Structure $structure)
    {
        //
        $request->validate([
            'name' => 'required',
            'position' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048'

        ]);

       
        $structure->name = $request->input('name');
        $structure->slug = \Str::slug(request('name'));
        $structure->position = $request->input('position');

        if($request->hasFile('image')){
            $image = $request->file('image');
            $extension = $image->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $image->move('uploads/structure/', $filename);
            $structure->image = $filename;
        }
        $structure->save();
            //redirect dengan pesan sukses
            return redirect()->route('structure.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Structure  $structure
     * @return \Illuminate\Http\Response
     */
    public function destroy(Structure $structure)
    {
        //
        $structure->delete_image();
        $structure->delete();
        return redirect('structure')->with('success', 'Data berhasil dihapus');
    }
}
