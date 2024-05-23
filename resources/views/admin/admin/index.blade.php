<!-- resources/views/admin/user/index.blade.php -->
@extends('component.main')

@section('content')
<div class="container-fluid">
    <h2 class="text-center" style="color: rgb(81, 143, 201)">Data Admin</h2>
    <main class="container">
        <!-- START DATA -->
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <!-- TOMBOL TAMBAH DATA -->
            <div class="pb-3">
                <a href='{{ route('users.create') }}' class="btn btn-primary"> + Tambah Data Admin </a>
            </div>

            <table class="table table-striped">
                <thead>
                    <tr class="text-center">
                        <th class="col-md-1">No</th>
                        <th class="col-md-2">Nama</th>
                        <th class="col-md-2">Username</th>
                        <th class="col-md-2">Email</th>
                        <th class="col-md-1">Telepon</th>
                        <th class="col-md-2">Alamat</th>
                        <th class="col-md-2">Foto</th>
                        <th class="col-md-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no = 1; @endphp
                    @foreach ($users as $user)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $user->nama }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->telepon }}</td>
                        <td>{{ $user->alamat }}</td>
                        <td><img src="{{ asset('images/images/user/' . $user->foto) }}" width="100"></td>
                        <td>
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus admin ini?')">Del</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- AKHIR DATA -->
    </main>
</div>
@endsection
