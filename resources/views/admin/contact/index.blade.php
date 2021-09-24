@extends('layouts/mainAdmin')
@section('title', 'Contact | Dashboard')

@section('container')
<div class="section-header">
  <h1>Contact | Dashboard</h1>
</div>
<div class="container mt-3">
   @if (session('success'))
  <div class="alert alert-primary" role="alert">
  {{session('success')}}
  </div>
  @endif
  <div class="row">
      <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('contact.create') }}" class="btn btn-md btn-success mb-3">Tambah Contact</a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-sm " id="laravel_unique_slug_table">
                  <thead>
                    <tr>
                    
                      <th scope="col">Alamat</th>
                      <th scope="col">Telephone</th>
                      <th scope="col">Email</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($contact as $ct)
                    <tr>
                        
                        <td>{{ $ct->alamat }}</td>
                        <td>{{ $ct->telephone }}</td>
                        <td>{{ $ct->email }}</td>
                      
                          <td>
                            <a class="btn btn-sm btn-warning" href="{{ route('contact.edit', $ct->id) }}">Ubah</a>
                            <form method="POST" action="{{ route('contact.destroy', $ct) }}" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus Data?')">Hapus</button>
                            </form>
                          </td>
                    </tr>
                    @empty
                    <div class="alert alert-danger">
                        Contact Belum Tersedia !
                    </div>
                @endforelse
                  </tbody>
                </table>
                {{ $contact->links() }}
              </div>
            </div>
          </div>
      </div>
  </div>
</div>
@endsection



    
