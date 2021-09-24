@extends('layouts/mainAdmin')
@section('title', 'Structure | Dashboard')

@section('container')
    <div class="section-header">
        <h1>Testimonials | Dashboard</h1>
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
                        <a href="{{ route('testimonial.create') }}" class="btn btn-md btn-success mb-3">Tambah Testimonial</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-sm " id="laravel_unique_slug_table">
                                <thead class="">
                    <tr>
                      <th scope=" col">No</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Posisi</th>
                                    <th scope="col">Testimonial</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($testimonial as $ts)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $ts->name }}</td>
                                            <td>{{ $ts->position }}</td>
                                            <td>{{ $ts->testi }}</td>
                                            <td>
                                                <img src="{{ asset('uploads/testimonial/' . $ts->image) }}"
                                                    class="rounded" style="height: 75px">
                                            </td>
                                            <td>
                                                <a class="btn btn-sm btn-warning"
                                                    href="{{ route('testimonial.edit', $ts->slug) }}">Ubah</a>
                                                <form method="POST" action="{{ route('testimonial.destroy', $ts) }}"
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
                                            Testimonial Belum Tersedia !
                                        </div>
                                    @endforelse
                                </tbody>
                            </table>
                            {{ $testimonial->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
