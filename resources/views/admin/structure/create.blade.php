@extends('layouts/mainAdmin')

@section('title', 'Structure | Create')
@section('container')
    <div class="section-header">
        <h1>Structure | Create</h1>
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
                    <form action="{{ route('structure.store') }}" method="POST" enctype="multipart/form-data">

                        @csrf

                        <div class="form-group">
                            <label class="font-weight-bold">Nama</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                value="{{ old('name') }}" placeholder="Masukkan Nama Lengkap">

                            <!-- error message untuk title -->
                            @error('name')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        
                        <div class="form-group">
                            <label class="font-weight-bold">Jabatan</label>
                            <input type="text" class="form-control @error('position') is-invalid @enderror" name="position"
                                value="{{ old('position') }}" placeholder="Masukkan Nama Lengkap">

                            <!-- error message untuk title -->
                            @error('position')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">GAMBAR</label>
                            <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">

                            <!-- error message untuk title -->
                            @error('image')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        
                        {{-- <div class="form-group">
                            <label class="font-weight-bold">Upload Tanggal</label>
                            <input type="text" class="form-control @error('excerpt') is-invalid @enderror"
                                name="excerpt" value="{{ old('excerpt') }}" placeholder="Masukkan Kutipan Post">

                            <!-- error message untuk title -->
                            @error('title')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div> --}}

                        <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                        <button type="reset" class="btn btn-md btn-warning">RESET</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection