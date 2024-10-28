@extends('layouts.app')
@section('title')
    Update
@endsection
@section('content')
<h2 class= "mt-3">Update Dokumentasi</h2>
    <hr>
    <div class="d-flex">
        <div class="dropdown mt-auto">
          <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            <strong class="py-3" style="color:#03318C; font-size: 30px;  ">
                Edit Dokumentasi
            </strong>
          </a>
        </div>
      </div>
    <div class="card shadow-lg mb-4 border-0" style="background-color:#03318C;">
  <div class="card-header" style="background-color:#03318C; color: white;">
        Formulir Edit Dokumentasi
  </div>
  <div class="card-body"  style="background-color: #ffffff;">
  <form action="{{ route('dokumentasis.update', $dokumentasi->id) }}" method="POST" enctype="multipart/form-data">

            @method('PUT')
            @csrf
            <div class = "col-md-12">
                <label for="gambar" class = "form-label" style="color: #0056b3;">Gambar</label>
                <input type="hidden" value= "{{$dokumentasi ->gambar}}"  name="oldgambar" >
                <input type="file" class = "form-control border-0 shadow-sm" style="background-color: #f1f8fe;" name="gambar" id = "gambar">
                <div class ="mt-2">
                    @error('gambar')
                        {{$message}}
                    @enderror
                </div>
            </div>
            <div class = "col-md-12">
                <label for="judul" class = "form-label" style="color: #0056b3;">Judul </label>
                <input type="text" value= "{{$dokumentasi-> judul}}" class = "form-control border-0 shadow-sm" style="background-color: #f1f8fe;"  name="judul" id = "judul" placeholder="Masukkan Judul Infoadmin">
                <div class ="mt-2">
                    @error('judul')
                        {{$message}}
                    @enderror
                </div>
            </div>
            <div class = "col-md-12">
                <label for="deskripsi" class = "form-label" style="color: #0056b3;">Deskripsi</label>
                <input type="text" value= "{{$dokumentasi-> deskripsi}}" class = "form-control border-0 shadow-sm" style="background-color: #f1f8fe;"  name="deskripsi" id = "deskripsi" placeholder="Masukkan Deskripsi Infoadmin">
                <div class ="mt-2">
                    @error('deskripsi')
                        {{$message}}
                    @enderror
                </div>
            </div>
            <div class = "d-flex justify-content-end mt-4">
                <button class ="btn" style="background-color:#03318C; color:white;"type ="submit" >Perbarui</button>
            </div>
        </form>
  </div>
</div>
@endsection
