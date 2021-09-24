@extends('layouts/mainAdmin')
@section('title', 'FrontPage | Dashboard')

@section('container')
    <div class="section-header">
        <h1>Halaman Depan | Dashboard</h1>
    </div>
    <div class="container mt-3">
        @if (session('success'))
            <div class="alert alert-primary" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('frontpage.create') }}" class="btn btn-md btn-success mb-3">Tambah Front Page</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-sm " id="laravel_unique_slug_table">
                                <thead class="">
                    <tr>
                                  <th scope=" col">No</th>
                                    <th scope="col">Judul</th>
                                    <th scope="col">Sub Judul</th>
                                    <th scope="col">Link Pendaftaran</th>
                                    <th scope="col">Link Video Profil</th>
                                    <th scope="col">Sejarah</th>
                                    <th scope="col">Visi</th>
                                    <th scope="col">Misi</th>
                                    <th scope="col">Gambar Subhead</th>
                                    <th scope="col"></th>
                                    <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($frontpage as $fpage)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $fpage->title }}</td>
                                            <td>{{ $fpage->sub_title }}</td>
                                            <td>{{ $fpage->registration }}</td>
                                            <td>{{ $fpage->video }}</td>
                                            <td>{{ $fpage->history }}</td>
                                            <td>{{ $fpage->visi }}</td>
                                            <td>{{ $fpage->misi }}</td>
                                            
                                            <td>
                                                <img src="{{ asset('uploads/frontpage/subhead/' . $fpage->image_subhead) }}"
                                                    class="rounded" style="height: 75px">
                                            </td>
                                            <td>
                                                <img src="{{ asset('uploads/frontpage/visimisi/' . $fpage->image_visimisi) }}"
                                                    class="rounded" style="height: 75px">
                                            </td>
                                            <td>
                                                <a class="btn btn-sm btn-warning"
                                                    href="{{ route('frontpage.edit', $fpage->slug) }}">Ubah</a>
                                                <form method="POST" action="{{ route('frontpage.destroy', $fpage) }}"
                                                    style="display: inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-sm btn-danger"
                                                        onclick="return confirm('Hapus Data?')">Hapus</button>
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
                            {{ $frontpage->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
