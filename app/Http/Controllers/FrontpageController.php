<?php

namespace App\Http\Controllers;

use App\Models\Frontpage;
use Illuminate\Http\Request;

class FrontpageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $frontpage = Frontpage::latest()->paginate(10);
        return view('admin.frontpage.index', compact('frontpage'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.frontpage.create');
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
            'title'             => 'required',
            'sub_title'         => 'required',
            'registration'      => 'required',
            'video'             => 'required',
            'history'           => 'required',
            'visi'              => 'required',
            'misi'              => 'required',
            'image_subhead'     => 'required',
            'image_visimisi'    => 'required',
        ]);

        $frontpage = New Frontpage();

        $frontpage->title           = $request->input('title');
        $frontpage->sub_title       = $request->input('sub_title');
        $frontpage->slug            = \Str::slug(request('title'));
        $frontpage->registration    = $request->input('registration');
        $frontpage->video           = $request->input('video');
        $frontpage->history         = $request->input('history');
        $frontpage->visi            = $request->input('visi');
        $frontpage->misi            = $request->input('misi');
        $frontpage->image_subhead   = $request->input('image_subhead');
        $frontpage->image_visimisi  = $request->input('image_visimisi');
 //upload image
    if($request->hasFile('image_subhead')){
    $image_subhead = $request->file('image_subhead');
    $extension = $image_subhead->getClientOriginalExtension();
    $filename = time() . '.' . $extension;
    $image_subhead->move('uploads/frontpage/subhead/', $filename);
    $frontpage->image_subhead = $filename;
}

 //upload image
 if($request->hasFile('image_visimisi')){
    $image_visimisi = $request->file('image_visimisi');
    $extension = $image_visimisi->getClientOriginalExtension();
    $filename = time() . '.' . $extension;
    $image_visimisi->move('uploads/frontpage/visimisi/', $filename);
    $frontpage->image_visimisi = $filename;
}

        $frontpage->save();
        return redirect()->route('frontpage.index')->with(['success', 'Data berhasil di update']);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Frontpage  $frontpage
     * @return \Illuminate\Http\Response
     */
    public function show(Frontpage $frontpage)
    {
        //
        return view('admin.frontpage.edit', compact('frontpage'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Frontpage  $frontpage
     * @return \Illuminate\Http\Response
     */
    public function edit(Frontpage $frontpage)
    {
        //
        return view('admin.frontpage.edit', compact('frontpage'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Frontpage  $frontpage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Frontpage $frontpage)
    {
        //

        
        $request->validate([
            'title'             => 'required',
            'sub_title'         => 'required',
            'registration'      => 'required',
            'video'             => 'required',
            'history'           => 'required',
            'visi'              => 'required',
            'misi'              => 'required',
            'image_subhead'     => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'image_visimisi'    => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $frontpage->title           = $request->title;
        $frontpage->sub_title       = $request->sub_title;
        $frontpage->slug            = \Str::slug(request('title'));
        $frontpage->registration    = $request->registration;
        $frontpage->video           = $request->video;
        $frontpage->history         = $request->history;
        $frontpage->visi            = $request->visi;
        $frontpage->misi            = $request->misi;
 //upload image
    if($request->hasFile('image_subhead')){
    $image_subhead = $request->file('image_subhead');
    $extension = $image_subhead->getClientOriginalExtension();
    $filename = time() . '.' . $extension;
    $image_subhead->move('uploads/frontpage/subhead/', $filename);
    $frontpage->image_subhead = $filename;
}

 //upload image
 if($request->hasFile('image_visimisi')){
    $image_visimisi = $request->file('image_visimisi');
    $extension = $image_visimisi->getClientOriginalExtension();
    $filename = time() . '.' . $extension;
    $image_visimisi->move('uploads/frontpage/visimisi/', $filename);
    $frontpage->image_visimisi = $filename;
}

        $frontpage->save();
        return redirect()->route('frontpage.index')->with(['success', 'Data berhasil di update']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Frontpage  $frontpage
     * @return \Illuminate\Http\Response
     */
    public function destroy(Frontpage $frontpage)
    {
        //
        $frontpage->delete_image();
        $frontpage->delete();
        return redirect('frontpage')->with('success', 'Hapus Data Berhasil');
    }
}
