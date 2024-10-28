@extends('layouts.app')
@section('title')
    Create
@endsection

@section('content')
<h2 class="mt-4 text-primary"></h2>
<hr class="mb-4">
<div class="d-flex">
        <div class="dropdown mt-auto">
          <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            <strong class="py-3" style="color:#03318C; font-size: 30px;  ">
                Tambahkan Dokumentasi
            </strong>
          </a>
        </div>
      </div>
<div class="card shadow-lg mb-4 border-0" style="background-color: #03318C;"> <!-- Soft white background for the card -->
    <div class="card-header" style="background-color: #03318C; color: white;">
        <h5 class="mb-0">Buat Dokumentasi</h5>
    </div>
    <div class="card-body" style="background-color: #ffffff;"> <!-- Pure white background for the form -->
        <form action="{{ route('dokumentasis.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="gambar" class="form-label" style="color: #0056b3;">Gambar</label>
                <input type="file" class="form-control border-0 shadow-sm" style="background-color: #f1f8fe;" name="gambar" id="gambar">
                @error('gambar')
                <div class="text-danger mt-1">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="judul" class="form-label" style="color: #0056b3;">Judul</label> <!-- Blue label color -->
                <input type="text" class="form-control border-0 shadow-sm" style="background-color: #f1f8fe;" name="judul" id="judul" placeholder="Masukkan Judul Info"> <!-- Light blue input -->
                @error('judul')
                <div class="text-danger mt-1">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label" style="color: #0056b3;">Deskripsi</label> <!-- Blue label color -->
                <input type="text" class="form-control border-0 shadow-sm" style="background-color: #f1f8fe;" name="deskripsi" id="deskripsi" placeholder="Masukkan Deskripsi Info"> <!-- Light blue input -->
                @error('deskripsi')
                <div class="text-danger mt-1">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="d-flex justify-content-end mt-4">
                <button type="submit" class="btn btn-primary px-5" style="background-color: #03318C">Simpan Data</button>
            </div>
        </form>
    </div>
</div>
@endsection
