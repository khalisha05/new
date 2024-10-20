@extends('layouts.app')
@section('title')
    User
@endsection
@section('content')
    <h1></h1>
    <nav aria-label="breadcrumb">
</nav>
<hr>
<div class="d-flex">
        <div class="dropdown mt-auto">
          <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            @if (Auth::check() && Auth::user()->foto)
              <img src="{{ asset('uploads/' . Auth::user()->foto) }}" alt="Foto" width="32px" height="32px" class="rounded-circle me-2">
            @else
              <img src="{{ asset('images/default-user.png') }}" alt="Default Foto" width="32px" height="32px" class="rounded-circle me-2">
            @endif
            <strong class="py-3" style="color:#03318C; font-size: 30px;  ">
              @if (Auth::check() && Auth::user()->nama)
                {{ Auth::user()->nama }}
              @else
                User
              @endif
            </strong>
          </a>
        </div>
      </div>
<div class="card">
  <div class="card-header" >
    <div class="row align-items-center">
        <div class="col-md-6"></div>
    <div class= "col-md-6 text-end">
        <a class= "btn " style="background-color:#03318C; color:white;" href="{{ route('users.create') }}"
        role="button"> Insert User</a>
  </div>
  <div class="card-body">
    <table class="table" >
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama</th>
      <!-- <th scope="col">Jenis Kelamin</th> -->
      <!-- <th scope="col">Alamat</th> -->
      <!-- <th scope="col">Email</th> -->
      <!-- <th scope="col">Password</th> -->
      <!-- <th scope="col">No.hp</th> -->
      <th scope="col">Foto</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
    </tr>
    </thead>
  <tbody>
    @foreach ($users as $item)
    <tr>
      <th scope="row">{{$loop -> iteration}}</th>
      <td>{{ $item -> nama}}</td>
      <!-- <td>{{ $item -> jk_admin}}</td>  -->
      <!-- <td>{{ $item -> alamat_admin}}</td> -->
      <!-- <td>{{ $item -> email_admin}}</td> -->
      <!-- <td>{{ $item -> password_admin}}</td> -->
      <!-- <td>{{ $item -> nohp_admin}}</td> -->
      <td><img src="{{ asset('uploads/' .  $item->foto) }}" alt="Foto pengguna">
      </td>
      <td>
          <a class="btn btn-outline-success btn-sm" href="{{ route('users.edit', $item->id) }}" role="button">Edit</a>
      </td>
      <td>
        <form action="{{ route('users.destroy', $item->id) }}" method="POST">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
        </form>
      </td>
    </tr>
    @endforeach
    </tbody>
</table>
  </div>
</div>

@endsection
    