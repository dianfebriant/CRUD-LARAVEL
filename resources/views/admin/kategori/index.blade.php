@extends('layouts/mainAdmin')
@section('title', 'Categories | Dashboard')

@section('container')
<div class="section-header">
  <h1>Category | Dashboard</h1>
</div>
<div class="container mt-3">
   @if (session('success'))
  <div class="alert alert-primary" role="alert">
  {{session('success')}}
  </div>
  @endif
  <div class="row">
      <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('category.create') }}" class="btn btn-md btn-success mb-3">Tambah Kategori</a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-sm " id="laravel_unique_slug_table">
                  <thead>
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col">Kategori</th>
                      <th scope="col">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($categories as $c)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $c->title }}</td>
                      
                          <td>
                            <a class="btn btn-sm btn-warning" href="{{ route('category.edit', $c->slug) }}">Ubah</a>
                            <form method="POST" action="{{ route('category.destroy', $c) }}" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus Data?')">Hapus</button>
                            </form>
                          </td>
                    </tr>
                    @empty
                    <div class="alert alert-danger">
                        Data Kategori Belum Tersedia !
                    </div>
                @endforelse
                  </tbody>
                </table>
                {{ $categories->links() }}
              </div>
            </div>
          </div>
      </div>
  </div>
</div>
@endsection



    
