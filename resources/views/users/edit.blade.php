@extends('layouts.app')
@section('title')
    Update
@endsection
@section('content')
<h2 class= "mt-3">Update Admin</h2>
    <hr>
    <div class="d-flex">
        <div class="dropdown mt-auto">
          <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            @if (Auth::check() && Auth::user()->foto)
              <img src="{{ asset('storage/uploads/' . Auth::user()->foto) }}" alt="Foto" width="32" height="32" class="rounded-circle me-2">
            @else
              <img src="{{ asset('images/default-user.png') }}" alt="Default Foto" width="32" height="32" class="rounded-circle me-2">
            @endif
            <strong class="py-3" style="color:#03318C; font-size: 30px;  ">
              @if (Auth::check() && Auth::user()->nama)
                {{ Auth::user()->nama }}
              @else
                Edit User
              @endif
            </strong>
          </a>
        </div>
      </div>
    <div class="card shadow-lg mb-4 border-0" style="background-color:#03318C;">
  <div class="card-header" style="background-color:#03318C; color: white;">
        Formulir Edit Admin
  </div>
  <div class="card-body"  style="background-color: #ffffff;">
  <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">

            @method('PUT')
            @csrf
            <div class = "col-md-12">
                <label for="nama" class = "form-label" style="color: #0056b3;">Nama </label>
                <input type="text" value= "{{$user-> nama}}" class = "form-control border-0 shadow-sm" style="background-color: #f1f8fe;"  name="nama" id = "nama" placeholder="Masukkan Nama">
                <div class ="mt-2">
                    @error('nama')
                        {{$message}}
                    @enderror
                </div>
            </div>
            <div class = "col-md-12">
                <label for="jk" class = "form-label" style="color: #0056b3;">Jenis Kelamin</label>
                <select name ="jk" id = "jk" class ="form-select border-0 shadow-sm" style="background-color: #f1f8fe;" > 
                @if ($user -> jk == 'laki-laki')
                    <option value="{{$user -> jk}}">{{$user -> jk}}</option>
                    <option value="perempuan">perempuan</option>
                @else
                    <option value="{{$user -> jk}}">{{$user -> jk}}</option>
                    <option value="laki-laki">laki-laki</option>
                @endif
                </select>
                <div class ="mt-2">
                    @error('jk')
                        {{$message}}
                    @enderror
                </div>
            </div>
            <div class = "col-md-12">
                <label for="email" class = "form-label" style="color: #0056b3;">Email </label>
                <input type="email" value= "{{$user-> nama}}" class = "form-control border-0 shadow-sm" style="background-color: #f1f8fe;" name="email" id = "email" placeholder="Masukkan Alamat">
                <div class ="mt-2">
                    @error('email')
                        {{$message}}
                    @enderror
                </div>
            </div>
            <div class = "col-md-12">
                <label for="password" class = "form-label" style="color: #0056b3;">Password</label>
                <input type="password" value= "{{$user-> password}}" class = "form-control border-0 shadow-sm" style="background-color: #f1f8fe;" name="password" id = "password" placeholder="Masukkan Password">
                <div class ="mt-2">
                    @error('password')
                        {{$message}}
                    @enderror
                </div>
                <div class = "col-md-12">
                <label for="nohp" class = "form-label" style="color: #0056b3;">No.Hp</label>
                <input type="text" value= "{{$user-> nohp}}" class = "form-control border-0 shadow-sm" style="background-color: #f1f8fe;" name="nohp" id = "nohp" placeholder="Masukkan No.Hp">
                <div class ="mt-2">
                    @error('nohp')
                        {{$message}}
                    @enderror
                </div>
            </div>
            <div class = "col-md-12">
                <label for="foto" class = "form-label" style="color: #0056b3;">Foto</label>
                <input type="hidden" value= "{{$user ->foto}}"  name="oldfoto" >
                <input type="file" class = "form-control border-0 shadow-sm" style="background-color: #f1f8fe;" name="foto" id = "foto">
                <div class ="mt-2">
                    @error('foto')
                        {{$message}}
                    @enderror
                </div>
            </div>
            <div class = "col-md-12">
                <label for="akses" class = "form-label" style="color: #0056b3;">Akses</label>
                <select name ="akses" id = "akses" class ="form-select border-0 shadow-sm" style="background-color: #f1f8fe;" > 
                @if ($user -> akses == 'Admin')
                    <option value="{{$user -> akses}}">{{$user -> akses}}</option>
                    <option value="siswa">Siswa</option>
                @else
                    <option value="{{$user -> akses}}">{{$user -> akses}}</option>
                    <option value="admin">Admin</option>
                @endif
                </select>
                <div class ="mt-2">
                    @error('akses')
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
