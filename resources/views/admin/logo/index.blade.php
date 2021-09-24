@extends('layouts/mainAdmin')
@section('title', 'Logo | Dashboard')
@section('container')
<div class="section-header">
  <h1>Logo | Dashboard</h1>
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
                <a href="{{ route('logo.create') }}" class="btn btn-md btn-success mb-3">Tambah Logo</a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-sm">
                  <thead>
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col">Nama</th>
                      <th scope="col">Image</th>
                      <th scope="col">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($logo as $l)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $l->title }}</td>
                        <td>
                            <img src="{{ asset('uploads/logo/'.$l->image ) }}" class="rounded" style="height: 75px">
                            {{-- <img src="{{ Storage::url('public/uploads/posts').$post->image}}" class="rounded" style="width: 150px"> --}}
                            {{-- <td><img src="{{ Storage::url($post->image) }}" height="75" width="75" alt="" /></td> --}}
                          </td>
                        </td>
                          <td>
                            <a class="btn btn-sm btn-warning" href="{{ route('logo.edit', $l->slug) }}">Ubah</a>
                            <form method="POST" action="{{ route('logo.destroy', $l) }}" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus Data?')">Hapus</button>
                            </form>
                          </td>
                    </tr>
                    @empty
                    <div class="alert alert-danger">
                        Data Logo Belum Tersedia !
                    </div>
                @endforelse
                  </tbody>
                </table>
                {{ $logo->links() }}
              </div>
            </div>
          </div>
      </div>
  </div>
</div>
@endsection



    
