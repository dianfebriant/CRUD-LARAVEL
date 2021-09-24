@extends('layouts/mainAdmin')

@section('title', 'Post | Create')
@section('container')
    <div class="section-header">
        <h1>Post | Create</h1>
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
                        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">

                            @csrf

                            <div class="form-group">
                                <label class="font-weight-bold">Default Select</label>
                                <select class="form-control  @error('category_id') is-invalid @enderror" name="category_id">
                                <option>- Pilih Kategori -</option>
                                @foreach ($categories as $c)
                                @if(old('category_id') == $c->id)
                                <option value="{{ $c->id }}" selected>{{ $c->title }}</option> 
                                @else                 
                                <option value="{{ $c->id }}">{{ $c->title }}</option> 
                                @endif         
                                @endforeach
                                </select>
                                @error('category_id')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                              </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Judul</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                                    value="{{ old('title') }}" placeholder="Masukkan Judul Post">

                                <!-- error message untuk title -->
                                @error('title')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>



                            <div class="form-group">
                                <label class="font-weight-bold">Kutipan</label>
                                <input type="text" class="form-control @error('excerpt') is-invalid @enderror"
                                    name="excerpt" value="{{ old('excerpt') }}" placeholder="Masukkan Kutipan Post">

                                <!-- error message untuk title -->
                                @error('title')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Deskripsi</label>
                                <textarea class="form-control @error('body') is-invalid @enderror" name="body" id="my-editor"
                                    rows="5"
                                    placeholder="Masukkan Deskripsi Post">{{ old('body') }}</textarea>

                                <!-- error message untuk content -->
                                @error('body')
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

                            <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('my-editor');
    </script>
@endpush