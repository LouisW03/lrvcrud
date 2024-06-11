@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Data Mahasiswa</h1>
    <a href="{{ route('mhs.create') }}" class="btn btn-primary">Tambah Mahasiswa</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>No</th>
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
            @foreach($mhs as $index => $m)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $m->nim }}</td>
                <td>{{ $m->nama_mhs }}</td>
                <td>{{ $m->jk->jeniskelamin }}</td>
                <td>{{ $m->alamat }}</td>
                <td>{{ $m->programstudi->prodi }}</td>
                <td><img src="{{ Storage::url($m->foto) }}" alt="Foto" width="50"></td>
                <td>{{ $m->email }}</td>
                <td>
                    <a href="{{ route('mhs.edit', $m->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('mhs.destroy', $m->id) }}" method="POST" style="display:inline-block">
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
