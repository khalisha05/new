@extends('layouts.app')
@section('title')
    Alumni
@endsection
@section('content')
<h1 class="text-center" style="color:#03318C; font-size: 30px; text-familly:cursive; ">Alumni</h1> <!-- Tambahkan text-center -->
<nav aria-label="breadcrumb"></nav>
<!-- Kode lainnya tetap sama -->

    <div class="text-end mt-3">
        <a class="btn" style="background-color:#03318C; color:white;" href="{{ route('alumnis.create') }}" role="button">Insert Alumni</a>
    </div>
    <div class="d-flex flex-wrap gap-3" style="padding-bottom:100px;"> <!-- Membungkus kartu dalam Flexbox dengan jarak antar kartu -->
        @foreach ($alumnis as $item)
            <div class="card d-flex" style="text-align: center; ">
                <img src="{{ asset('storage/uploads/' . $item->foto) }}" class="card-img-top" alt="..." style="height:472px;">
                <div class="card-body">
                    <h5 class="card-title">{{ $item->nama }}</h5>
                    <p class="card-text">{{ $item->no_nic }} <br>{{ $item->alamat }}</p>
                    <div class="d-flex justify-content-center gap-2 mt-2"> <!-- Tambahkan justify-content-center untuk mengatur posisi di tengah -->
                        <a href="{{ route('alumnis.edit', $item->id) }}" class="btn btn-outline-success">Edit</a>
                        <form action="{{ route('alumnis.destroy', $item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger">Delete</button>
                        </form>
                    </div>

                </div>
            </div>
        @endforeach
    </div>
@endsection
