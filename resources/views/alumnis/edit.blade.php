@extends('layouts.app')
@section('title')
    Update
@endsection
@section('content')
<h2 class= "mt-3">Update Alumni</h2>
    <hr>
    <div class="d-flex">
        <div class="dropdown mt-auto">
          <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            <strong class="py-3" style="color:#03318C; font-size: 30px;  ">
                Edit Alumni
            </strong>
          </a>
        </div>
      </div>
    <div class="card shadow-lg mb-4 border-0" style="background-color:#03318C;">
  <div class="card-header" style="background-color:#03318C; color: white;">
        Formulir Edit Alumni
  </div>
  <div class="card-body"  style="background-color: #ffffff;">
  <form action="{{ route('alumnis.update', $alumni->id) }}" method="POST" enctype="multipart/form-data">

            @method('PUT')
            @csrf
            <div class = "col-md-12">
                <label for="foto" class = "form-label" style="color: #0056b3;">Foto</label>
                <input type="hidden" value= "{{$alumni ->foto}}"  name="oldfoto" >
                <input type="file" class = "form-control border-0 shadow-sm" style="background-color: #f1f8fe;" name="foto" id = "foto">
                <div class ="mt-2">
                    @error('foto')
                        {{$message}}
                    @enderror
                </div>
            </div>
            <div class = "col-md-12">
                <label for="nama" class = "form-label" style="color: #0056b3;">Nama </label>
                <input type="text" value= "{{$alumni ->nama}}" class = "form-control border-0 shadow-sm" style="background-color: #f1f8fe;"  name="nama" id = "nama" placeholder="Masukkan Nama Alumni">
                <div class ="mt-2">
                    @error('nama')
                        {{$message}}
                    @enderror
                </div>
            </div>
            <div class = "col-md-12">
                <label for="no_nic" class = "form-label" style="color: #0056b3;">No.NIC</label>
                <input type="text" value= "{{$alumni ->no_nic}}" class = "form-control border-0 shadow-sm" style="background-color: #f1f8fe;"  name="no_nic" id = "no_nic" placeholder="Masukkan No.NIC Alumni">
                <div class ="mt-2">
                    @error('no_nic')
                        {{$message}}
                    @enderror
                </div>
            </div>
            <div class = "col-md-12">
                <label for="alamat" class = "form-label" style="color: #0056b3;">Alamat</label>
                <input type="text" value= "{{$alumni ->alamat}}" class = "form-control border-0 shadow-sm" style="background-color: #f1f8fe;"  name="alamat" id = "alamat" placeholder="Masukkan Alamat Alumni">
                <div class ="mt-2">
                    @error('alamat')
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
