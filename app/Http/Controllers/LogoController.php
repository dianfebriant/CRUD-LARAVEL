<?php

namespace App\Http\Controllers;

use App\Models\Logo;
use Illuminate\Http\Request;



class LogoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 

        $logo = Logo::latest()->paginate(10);
        return view('admin.logo.index', compact('logo'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.logo.create');
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
            'title' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048'
        ]);

        $logo = new Logo();
        $logo->title = $request->input('title');
        $logo->slug     = \Str::slug(request('title'));
         if($request->hasFile('image')){
            $image = $request->file('image');
            $extension = $image->getClientOriginalExtension();
            $filename = Time() . '.' . $extension;
            $image->move('uploads/logo/', $filename);
            $logo->image = $filename;
           
         }

         $logo->save();
         return redirect()->route('logo.index')->with(['success', 'Data berhasil ditambahkan']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Logo $logo)
    {
        //
        return view('admin.logo.edit', compact('logo'));
        
        }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Logo $logo)
    {
        //

        $request->validate([
            'title' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048'
        ]);

        $logo->title = $request->title;
         if($request->hasFile('image')){
            $image = $request->file('image');
            $extension = $image->getClientOriginalExtension();
            $filename = Time() . '.' . $extension;
            $image->move('uploads/logo/', $filename);
            $logo->image = $filename;
           
         }

         $logo->save();
         return redirect()->route('logo.index')->with(['success', 'Data berhasil ditambahkan']);

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Logo $logo)
    {
        //

        $logo->delete_image();
        $logo->delete();
        return redirect('logo')->with('success', 'Hapus Data Berhasil');
    }
}
