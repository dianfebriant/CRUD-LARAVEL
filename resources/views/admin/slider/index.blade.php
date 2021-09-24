@extends('layouts/mainAdmin')
@section('title', 'Slider | Dashboard')

@section('container')
<div class="section-header">
  <h1>Slider | Dashboard</h1>
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
                <a href="{{ route('slider.create') }}" class="btn btn-md btn-success mb-3">Tambah Slider</a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-sm " id="laravel_unique_slug_table">
                  <thead class="">
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col">Nama</th>
                      <th scope="col">Image</th>
                      <th scope="col">Upload Tanggal</th>
                      <th scope="col">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($slider as $s)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $s->name }}</td>
                        <td>{{ $s->image }}</td>
                        <td>
                            <img src="{{ asset('uploads/slider/'.$s->image ) }}" class="rounded" style="height: 75px">
                            {{-- <img src="{{ Storage::url('public/uploads/posts').$post->image}}" class="rounded" style="width: 150px"> --}}
                            {{-- <td><img src="{{ Storage::url($post->image) }}" height="75" width="75" alt="" /></td> --}}
                          </td>
                       
                       
                          <td>
                            <a class="btn btn-sm btn-warning" href="{{ route('slider.edit', $s) }}">Ubah</a>
                            <form method="POST" action="{{ route('slider.destroy', $s) }}" style="display: inline-block;">
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
                {{ $slider->links() }}
              </div>
            </div>
          </div>
      </div>
  </div>
</div>
@endsection



    
