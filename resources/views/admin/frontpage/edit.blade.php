@extends('layouts/mainAdmin')

@section('title', 'FrontPage | Edit')
@section('container')
    <div class="section-header">
        <h1>Halaman Depan | Create</h1>
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
                        <form action="{{ route('frontpage.update', $frontpage) }}" method="POST" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf


                            <div class="form-group">
                                <label class="font-weight-bold">Judul</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                                    value="{{ old('title', $frontpage->title) }}">
                                <!-- error message untuk title -->
                                @error('title')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Sub Judul</label>
                                <input type="text" class="form-control @error('sub_title') is-invalid @enderror" name="sub_title"
                                    value="{{ old('sub_title', $frontpage->sub_title) }}">
                                <!-- error message untuk title -->
                                @error('sub_title')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Link Pendaftaran</label>
                                <input type="text" class="form-control @error('registration') is-invalid @enderror" name="registration"
                                    value="{{ old('registration', $frontpage->registration) }}">
                                <!-- error message untuk title -->
                                @error('registration')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            

                            <div class="form-group">
                                <label class="font-weight-bold">Link Video</label>
                                <input type="text" class="form-control @error('video') is-invalid @enderror" name="video"
                                    value="{{ old('video', $frontpage->video) }}" placeholder="Masukkan Nama Kategori">
                                <!-- error message untuk title -->
                                @error('video')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Sejarah</label>
                                <textarea class="form-control @error('history') is-invalid @enderror" name="history" id="my-editor"
                                    rows="5">{{ old('history', $frontpage->history) }}</textarea>

                                <!-- error message untuk content -->
                                @error('history')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label class="font-weight-bold">Visi</label>
                                <textarea class="form-control @error('visi') is-invalid @enderror" name="visi" id="my-editor2"
                                    rows="5">{{ old('visi', $frontpage->visi) }}</textarea>

                                <!-- error message untuk content -->
                                @error('visi')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Misi</label>
                                <textarea class="form-control @error('misi') is-invalid @enderror" name="misi" id="my-editor3"
                                    rows="5">{{ old('misi', $frontpage->misi) }}</textarea>

                                <!-- error message untuk content -->
                                @error('misi')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Gambar Subhead</label>
                            <input type="file" class="form-control @error('image_subhead') is-invalid @enderror" name="image_subhead">
                            <span>Tambahkan gambar yang sama jika tidak ingin mengubah</span>

                            <!-- error message untuk title -->
                            @error('image_subhead')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        
                        <div class="form-group">
                            <label class="font-weight-bold">Gambar Visi Misi</label>
                            <input type="file" class="form-control @error('image_visimisi') is-invalid @enderror" name="image_visimisi">

                            <!-- error message untuk title -->
                            @error('image_visimisi')
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

<script>
    CKEDITOR.replace('my-editor2');
    </script>

<script>
    CKEDITOR.replace('my-editor3');
    </script>
@endpush
