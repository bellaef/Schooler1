<!-- resources/views/admin/profil/index.blade.php -->

@extends('component.main')

@section('content')
<div class="container-fluid">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <h2 class="text-center mt-3" style="color: rgb(81, 143, 201)">User Profile</h2>
                    <div class="card-body">
                        <div class="text-center mb-4">
                            <!-- Tampilkan foto admin -->
                            <img src="{{ asset('images/images/user/' . Auth::user()->foto) }}" alt="Admin Photo" style="border-radius: 50px" width="200">
                        </div>
                        <div class="form-group row mb-2">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                            <div class="col-md-6">
                                <!-- Tampilkan nama admin -->
                                <input id="name" type="text" class="form-control" name="name" value="{{ Auth::user()->nama }}" readonly>
                            </div>
                        </div>

                        <div class="form-group row mb-2">
                            <label for="username" class="col-md-4 col-form-label text-md-right">Username</label>

                            <div class="col-md-6">
                                <!-- Tampilkan username admin -->
                                <input id="username" type="text" class="form-control" name="username" value="{{ Auth::user()->username }}" readonly>
                            </div>
                        </div>

                        <div class="form-group row mb-2">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>

                            <div class="col-md-6">
                                <!-- Tampilkan email admin -->
                                <input id="email" type="email" class="form-control" name="email" value="{{ Auth::user()->email }}" readonly>
                            </div>
                        </div>

                        <div class="form-group row mb-2">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                            <div class="col-md-6">
                                <!-- Tampilkan placeholder password -->
                                <input id="password" type="password" class="form-control" name="password" placeholder="********" readonly>
                            </div>
                        </div>

                        <div class="form-group row mb-5">
                            <label for="alamat" class="col-md-4 col-form-label text-md-right">Alamat</label>

                            <div class="col-md-6">
                                <!-- Tampilkan alamat admin -->
                                <textarea id="alamat" class="form-control" name="alamat" readonly>{{ Auth::user()->alamat }}</textarea>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <!-- Link ke halaman edit profil -->
                                <a href="{{ route('profile.update') }}" class="btn btn-primary">Edit Profile</a>
                                <!-- Form untuk menghapus akun -->
                                <form action="{{ route('profile.destroy') }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete your account?')">Delete Account</button>
                                </form>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
