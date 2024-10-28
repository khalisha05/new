@extends('layouts.app')
@section('title')
    Infoadmin
@endsection
@section('content')
    <h1></h1>
    <nav aria-label="breadcrumb">
</nav>
<hr>
<div class="d-flex">
        <div class="dropdown mt-auto">
          <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            @if (Auth::check() && Auth::infoadmin()->gambar)
            <img src="{{ Storage::url(Auth::infoadmin()->gambar) }}" alt="infoadmin"  width="32px" height="32px" class="rounded-circle me-2" >

            @else
              <img src="{{ asset('images/default-user.png') }}" alt="Default Gambar" width="32px" height="32px" class="rounded-circle me-2">
            @endif
            <strong class="py-3" style="color:#03318C; font-size: 30px;  ">
              @if (Auth::check() && Auth::infoadmin()->judul)
                {{ Auth::infoadmin()->judul }}
              @else
                Infoadmin
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
        <a class= "btn " style="background-color:#03318C; color:white;" href="{{ route('infoadmins.create') }}"
        role="button"> Insert Infoadmin</a>
  </div>
  <div class="card-body">
    <table class="table" >
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Gambar</th>
      <th scope="col">Judul</th>
      <th scope="col">Deskripsi</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
    </tr>
    </thead>
  <tbody>
    @foreach ($infoadmins as $item)
    <tr>
      <th scope="row">{{$loop -> iteration}}</th>
      <td><img src="{{ asset('storage/uploads/' .  $item->gambar) }}" alt="Gambar" width="90">
      </td>
      <td>{{ $item -> judul}}</td>
      <td>{{ $item -> deskripsi}}</td>
      <td>
          <a class="btn btn-outline-success btn-sm" href="{{ route('infoadmins.edit', $item->id) }}" role="button">Edit</a>
      </td>
      <td>
        <form action="{{ route('infoadmins.destroy', $item->id) }}" method="POST">
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
