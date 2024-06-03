@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Mahasiswa</h1>
    <a href="{{ route('mhs.create') }}" class="btn btn-primary">Tambah Mahasiswa</a>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>NIM</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <th>Prodi</th>
                <th>Foto</th>
                <th>Email</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($mhs as $m)
                <tr>
                    <td>{{ $m->nim }}</td>
                    <td>{{ $m->nama_mhs }}</td>
                    <td>{{ $m->jk }}</td>
                    <td>{{ $m->alamat }}</td>
                    <td>{{ $m->prodi }}</td>
                    <td>
                        @if($m->foto)
                            <img src="{{ Storage::url($m->foto) }}" width="50" alt="Foto">
                        @endif
                    </td>
                    <td>{{ $m->email }}</td>
                    <td>
                        <a href="{{ route('mhs.edit', $m->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('mhs.destroy', $m->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
