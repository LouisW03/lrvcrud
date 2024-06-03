@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ isset($mhs) ? 'Edit' : 'Tambah' }} Mahasiswa</h1>
    @if(isset($mhs))
        <form action="{{ route('mhs.update', $mhs->id) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
    @else
        <form action="{{ route('mhs.store') }}" method="POST" enctype="multipart/form-data">
    @endif
        @csrf
        <div class="mb-3">
            <label for="nim" class="form-label">NIM</label>
            <input type="text" name="nim" class="form-control" value="{{ isset($mhs) ? $mhs->nim : '' }}" required>
        </div>
        <div class="mb-3">
            <label for="nama_mhs" class="form-label">Nama</label>
            <input type="text" name="nama_mhs" class="form-control" value="{{ isset($mhs) ? $mhs->nama_mhs : '' }}" required>
        </div>
        <div class="mb-3">
            <label for="jk" class="form-label">Jenis Kelamin</label>
            <select name="jk" class="form-control" required>
                <option value="">Pilih Jenis Kelamin</option>
                @foreach($jks as $jk)
                    <option value="{{ $jk->id }}" {{ isset($mhs) && $mhs->jk == $jk->id ? 'selected' : '' }}>{{ $jk->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea name="alamat" class="form-control" required>{{ isset($mhs) ? $mhs->alamat : '' }}</textarea>
        </div>
        <div class="mb-3">
            <label for="prodi" class="form-label">Prodi</label>
            <select name="prodi" class="form-control" required>
                <option value="">Pilih Prodi</option>
                @foreach($prodis as $prodi)
                    <option value="{{ $prodi->id }}" {{ isset($mhs) && $mhs->prodi == $prodi->id ? 'selected' : '' }}>{{ $prodi->jenjang }} - {{ $prodi->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="foto" class="form-label">Foto</label>
            <input type="file" name="foto" class="form-control">
            @if(isset($mhs) && $mhs->foto)
                <img src="{{ Storage::url($mhs->foto) }}" width="100" class="mt-2" alt="Foto">
            @endif
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="{{ isset($mhs) ? $mhs->email : '' }}" required>
        </div>
        <button type="submit" class="btn btn-primary">{{ isset($mhs) ? 'Update' : 'Tambah' }} Mahasiswa</button>
    </form>
</div>
@endsection
