<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $contact = Contact::latest()->paginate(10);
        return view('admin.contact.index', compact('contact'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.contact.create');
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
            'alamat' => 'required',
            'telephone' => 'required',
            'email' => 'required|email'
            
        ]);

        $contact = New Contact();
        $contact->alamat = $request->input('alamat');
        $contact->telephone = $request->input('telephone');
        $contact->email = $request->input('email');

        $contact->save();
        return redirect()->route('contact.index')->with(['success', 'Data berhasil ditambahkan']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        //
        return view('admin.contact.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        //

        $request->validate([
            'alamat' => 'required',
            'telephone' => 'required',
            'email' => 'required|email'
        ]);

        $contact->alamat = $request->alamat;
        $contact->telephone = $request->telephone;
        $contact->email = $request->email;

        $contact->save();
        return redirect()->route('contact.index')->with(['success', 'Data berhasil di update']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        //
        $contact->delete();
        return redirect('contact')->with('success', 'Hapus Data Berhasil');
    }
}
