@extends('layouts.master')

@section('content')
<div class="row d-flex justify-content-center">
        <div class="col-md-6 mt-4 mb-4">
            <div class="card" style="">
                <div class="card-body">
                    <h5 class="text-center">Form Pengaduan</h5>
                    {{-- <p>{{ $token }}</p> --}}
                    <form action="{{ route('store.complaint') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">Judul</label>
                            <input type="text" id="title" name="title" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="location">Lokasi</label>
                            <input type="text" id="location" name="location" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="category">Kategori</label>
                            <select class="form-control" id="category" name="category">
                            <option>Sampah</option>
                            <option>Lingkungan</option>
                            <option>Kesehatan</option>
                            <option>Tenaga Kerja</option>
                            <option>Penduduk</option>
                            <option>Lainnya</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="description">Deksripsi</label>
                            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="picturePath">Photo</label>
                            <input type="file" class="form-control-file" id="picturePath" name="picturePath">
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Kirim Aduan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</div>
@endsection