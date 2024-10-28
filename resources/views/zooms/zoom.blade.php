@extends('layouts.app')
@section('title')
    Link Zoom
@endsection
@section('content')
    <h1></h1>
    <nav aria-label="breadcrumb">
</nav>
<hr>
<div class="d-flex">
        <div class="dropdown mt-auto">
          <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            <strong class="py-3" style="color:#03318C; font-size: 30px;  ">
              Link Zoom
            </strong>
          </a>
        </div>
      </div>
<div class="card">
  <div class="card-header" >
    <div class="row align-items-center">
        <div class="col-md-6"></div>
    <div class= "col-md-6 text-end">
        <a class= "btn " style="background-color:#03318C; color:white;" href="{{ route('zooms.create') }}"
        role="button"> Insert Link Zoom</a>
  </div>
  <div class="card-body">
    <table class="table" >
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Zoom</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
    </tr>
    </thead>
  <tbody>
    @foreach ($zooms as $item)
    <tr>
      <th scope="row">{{$loop -> iteration}}</th>
      <td><a href="{{ $item -> zoom}}" target="_blank">"{{ $item -> zoom}}"</a></td>
      <td>
          <a class="btn btn-outline-success btn-sm" href="{{ route('zooms.edit', $item->id) }}" role="button">Edit</a>
      </td>
      <td>
        <form action="{{ route('zooms.destroy', $item->id) }}" method="POST">
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
