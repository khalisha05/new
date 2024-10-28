@extends('layouts.app')
@section('title')
    Update
@endsection
@section('content')
<h2 class= "mt-3">Update Link Zoom</h2>
    <hr>
    <div class="d-flex">
        <div class="dropdown mt-auto">
          <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            <strong class="py-3" style="color:#03318C; font-size: 30px;  ">
                Edit Link Zoom
            </strong>
          </a>
        </div>
      </div>
    <div class="card shadow-lg mb-4 border-0" style="background-color:#03318C;">
  <div class="card-header" style="background-color:#03318C; color: white;">
        Formulir Edit Link Zoom
  </div>
  <div class="card-body"  style="background-color: #ffffff;">
  <form action="{{ route('zooms.update', $zoom->id) }}" method="POST" enctype="multipart/form-data">

            @method('PUT')
            @csrf
            <div class = "col-md-12">
                <label for="zoom" class = "form-label" style="color: #0056b3;">Link Zoom</label>
                <input type="text" class="form-control border-0 shadow-sm" style="background-color: #f1f8fe;" name="zoom" id="zoom" placeholder="Masukkan Link Zoom"> <!-- Light blue input -->
                <div class ="mt-2">
                    @error('materi')
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
