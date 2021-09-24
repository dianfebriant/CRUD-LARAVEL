@extends('layouts/mainAdmin')
@section('title', 'Announcement | Dashboard')
@section('container')
<div class="section-header">
  <h1>Pengumuman | Dashboard</h1>
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
                <a href="{{ route('announcement.create') }}" class="btn btn-md btn-success mb-3">Create Announcement</a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-sm">
                  <thead>
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col">Pengumuman</th>
                      <th scope="col">Isi</th>
                      <th scope="col">Dokumen</th>
                      <th scope="col">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($announcement as $an)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $an->pengumuman }}</td>
                        <td>{{ $an->isi }}</td>
                        <td>
                            <embed type="application/pdf" src="{{ asset('uploads/pengumuman/'.$an->file ) }}" style="height: 75px">
                            {{-- <img src="{{ Storage::url('public/uploads/posts').$post->image}}" class="rounded" style="width: 150px"> --}}
                            {{-- <td><img src="{{ Storage::url($post->image) }}" height="75" width="75" alt="" /></td> --}}
                          </td>
                        </td>
                          <td>
                            <a class="btn btn-sm btn-warning" href="{{ route('announcement.edit', $an->slug) }}">Ubah</a>
                            <form method="POST" action="{{ route('announcement.destroy', $an) }}" style="display: inline-block;">
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
                {{ $announcement->links() }}
              </div>
            </div>
          </div>
      </div>
  </div>
</div>
@endsection



    
