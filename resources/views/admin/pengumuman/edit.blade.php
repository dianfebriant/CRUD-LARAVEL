@extends('layouts/mainAdmin')

@section('title', 'Announcement | Create')
@section('container')
    <div class="section-header">
        <h1>Create Announcement</h1>
    </div>
  
    <div class="container mb-5">
        @if (session('success'))
        <div class="alert alert-primary" role="alert">
            {{ session('success') }}
        </div>
    @endif
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <form action="{{ route('announcement.update', $announcement) }}" method="POST" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf

                            <div class="form-group">
                                <label class="font-weight-bold">Nama</label>
                                <input type="text" class="form-control @error('pengumuman') is-invalid @enderror" name="pengumuman"
                                    value="{{ old('pengumuman', $announcement->pengumuman) }}">

                                <!-- error message untuk title -->
                                @error('pengumuman')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Isi</label>
                                <input type="text" class="form-control @error('isi') is-invalid @enderror" name="isi"
                                    value="{{ old('isi', $announcement->isi) }}">

                                <!-- error message untuk title -->
                                @error('isi')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                    
                            <div class="form-group">
                                <label class="font-weight-bold">File</label>
                                <input type="file" class="form-control @error('file') is-invalid @enderror" name="file">

                                <!-- error message untuk title -->
                                @error('file')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
