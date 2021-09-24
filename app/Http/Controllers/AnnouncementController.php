<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $announcement = Announcement::latest()->paginate(10);
        return view ('admin.pengumuman.index', compact('announcement'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.pengumuman.create');
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
            'pengumuman' => 'required',
            'isi'        => 'required',
            'file'       => 'required|mimes:pdf,xlx,csv|max:2048'
        ]);

        $announcement = New Announcement();

        $announcement->pengumuman = $request->input('pengumuman');
        $announcement->slug    = \Str::slug(request('pengumuman'));
        $announcement->isi     = $request->input('isi');
        if($request->hasFile('file')){
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $filename = Time() . '.' . $extension;
            $file->move('uploads/pengumuman/', $filename);
            $announcement->file = $filename;
           
         }

         $announcement->save();
         return redirect()->route('announcement.index')->with(['success', 'Data berhasil ditambahkan']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function show(Announcement $announcement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function edit(Announcement $announcement)
    {
        //

        return view('admin.pengumuman.edit', compact('announcement'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Announcement $announcement)
    {
        //

        $request->validate([
            'pengumuman' => 'required',
            'isi'        => 'required',
            'file'       => 'required|mimes:pdf,xlx,csv|max:2048'
        ]);

        

        $announcement->pengumuman = $request->pengumuman;
        $announcement->slug    = \Str::slug(request('pengumuman'));
        $announcement->isi     = $request->isi;
        if($request->hasFile('file')){  
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $filename = Time() . '.' . $extension;
            $file->move('uploads/pengumuman/', $filename);
            $announcement->file = $filename;
           
         }

         $announcement->save();
         return redirect()->route('announcement.index')->with(['success', 'Data berhasil ditambahkan']);
    


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Announcement $announcement)
    {
        //

        $announcement->delete_file();
        $announcement->delete();
        return redirect('announcement')->with('success', 'Hapus Data Berhasil');
    }
}
