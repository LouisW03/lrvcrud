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
            <input type="text" name="nim" class="form-control" value="{{ old('nim', $mhs->nim ?? '') }}" required>
        </div>
        <div class="mb-3">
            <label for="nama_mhs" class="form-label">Nama</label>
            <input type="text" name="nama_mhs" class="form-control" value="{{ old('nama_mhs', $mhs->nama_mhs ?? '') }}" required>
        </div>
        <div class="mb-3">
            <label for="jeniskelamin" class="form-label">Jenis Kelamin</label>
            <select name="jeniskelamin" class="form-control" required>
                @foreach($jks as $jk)
                    <option value="{{ $jk->id }}" {{ old('jeniskelamin', $mhs->jeniskelamin ?? '') == $jk->id ? 'selected' : '' }}>{{ $jk->jeniskelamin }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea name="alamat" class="form-control" required>{{ old('alamat', $mhs->alamat ?? '') }}</textarea>
        </div>
        <div class="mb-3">
            <label for="prodi" class="form-label">Program Studi</label>
            <select name="prodi" class="form-control" required>
                @foreach($prodis as $prodi)
                    <option value="{{ $prodi->id }}" {{ old('prodi', $mhs->prodi ?? '') == $prodi->id ? 'selected' : '' }}>{{ $prodi->prodi }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="foto" class="form-label">Foto</label>
            <input type="file" name="foto" class="form-control">
            @if(isset($mhs) && $mhs->foto)
                <img src="{{ Storage::url($mhs->foto) }}" alt="Foto" width="100">
            @endif
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email', $mhs->email ?? '') }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
