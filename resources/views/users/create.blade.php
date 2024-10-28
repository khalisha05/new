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
            @if (Auth::check() && Auth::user()->foto)
              <img src="{{ Storage::url(Auth::user()->foto) }}" alt="Foto"  width="32px" height="32px" class="rounded-circle me-2" >
            @else
              <img src="{{ asset('images/default-user.png') }}" alt="Default Foto" width="32px" height="32px" class="rounded-circle me-2">
            @endif
            <strong class="py-3" style="color:#03318C; font-size: 30px;  ">
              @if (Auth::check() && Auth::user()->nama)
                {{ Auth::user()->nama }}
              @else
                Tambahkan User 
              @endif
            </strong>
          </a>
        </div>
      </div>
<div class="card shadow-lg mb-4 border-0" style="background-color: #03318C;"> <!-- Soft white background for the card -->
    <div class="card-header" style="background-color: #03318C; color: white;">
        <h5 class="mb-0">Buat Akun </h5>
    </div>
    <div class="card-body" style="background-color: #ffffff;"> <!-- Pure white background for the form -->
        <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <!-- Nama Admin -->
            <div class="mb-3">
                <label for="nama" class="form-label" style="color: #0056b3;">Nama</label> <!-- Blue label color -->
                <input type="text" class="form-control border-0 shadow-sm" style="background-color: #f1f8fe;" name="nama" id="nama" placeholder="Masukkan Nama Admin"> <!-- Light blue input -->
                @error('nama')
                <div class="text-danger mt-1">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <!-- Jenis Kelamin Admin -->
            <div class="mb-3">
                <label for="jk" class="form-label" style="color: #0056b3;">Jenis Kelamin </label>
                <select name="jk" id="jk" class="form-select border-0 shadow-sm" style="background-color: #f1f8fe;">
                    <option value="jk">--Pilih Jenis Kelamin--</option>
                    <option value="laki-laki">Laki-laki</option>
                    <option value="perempuan">Perempuan</option>
                </select>
                @error('jk')
                <div class="text-danger mt-1">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <!-- Email Admin -->
            <div class="mb-3">
                <label for="email" class="form-label" style="color: #0056b3;">Email</label>
                <input type="email" class="form-control border-0 shadow-sm" style="background-color: #f1f8fe;" name="email" id="email" placeholder="Masukkan Email">
                @error('email')
                <div class="text-danger mt-1">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <!-- Password Admin -->
            <div class="mb-3">
                <label for="password" class="form-label" style="color: #0056b3;">Password</label>
                <input type="password" class="form-control border-0 shadow-sm" style="background-color: #f1f8fe;" name="password" id="password" placeholder="Masukkan Password">
                @error('password')
                <div class="text-danger mt-1">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <!-- No.Hp Admin -->
            <div class="mb-3">
                <label for="nohp" class="form-label" style="color: #0056b3;">No.Hp</label>
                <input type="text" class="form-control border-0 shadow-sm" style="background-color: #f1f8fe;" name="nohp" id="nohp" placeholder="Masukkan No.Hp ">
                @error('nohp')
                <div class="text-danger mt-1">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <!-- Foto Admin -->
            <div class="mb-3">
                <label for="foto" class="form-label" style="color: #0056b3;">Foto</label>
                <input type="file" class="form-control border-0 shadow-sm" style="background-color: #f1f8fe;" name="foto" id="foto">
                @error('foto')
                <div class="text-danger mt-1">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <!-- Akses -->
            <div class="mb-3">
                <label for="akses" class="form-label" style="color: #0056b3;">Akses </label>
                <select name="akses" id="akses" class="form-select border-0 shadow-sm" style="background-color: #f1f8fe;">
                    <option value="akses">--Akses--</option>
                    <option value="admin">Admin</option>
                    <option value="siswa">Siswa</option>
                </select>
                @error('akses')
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
