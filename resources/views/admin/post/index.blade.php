@extends('layouts/mainAdmin')
@section('title', 'Post | Dashboard')

@section('container')
<div class="section-header">
  <h1>Post | Dashboard</h1>
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
                <a href="{{ route('posts.create') }}" class="btn btn-md btn-success mb-3">TAMBAH POST</a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-sm " id="laravel_unique_slug_table">
                  <thead class="">
                    <tr>
                      <th scope="col">No</th>
                      {{-- <th scope="col">apa</th> --}}
                      <th scope="col">Judul</th>
                      <th scope="col">Kutipan</th>
                      <th scope="col">Deskrips</th>
                      <th scope="col">Image</th>
                      <th scope="col">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($post as $p)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        {{-- <td>{{ $p->category->title }}</td> --}}
                        <td>{{ $p->title }}</td>
                        <td>{{ $p->excerpt }}</td>
                        <td>{{ $p->body }}</td>
                        <td class="text-center">
                            <img src="{{ asset('uploads/posts/'.$p->image ) }}" class="rounded" style="height: 75px">
                           </td>
                        </td>
                        
                          <td class="text-center">
                            <a class="btn btn-sm btn-warning" href="{{ route('posts.edit', $p->slug) }}">Ubah</a>
                            <form method="POST" action="{{ route('posts.destroy', $p->slug) }}" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus Data?')">Hapus</button>
                            </form>
                          </td>
                    </tr>
                    @empty
                    <div class="alert alert-danger">
                        Data Post Belum Tersedia !
                    </div>
                @endforelse
                  </tbody>
                </table>
                {{ $post->links() }}
              </div>
            </div>
          </div>
      </div>
  </div>
</div>
@endsection



    
