@extends('component.main')

@section('content')
<div class="container-fluid">
    <body class="bg-light">
        <h2 class="text-center" style="font-weight: bold; color:rgb(81, 143, 201)">Tambah Tarif Ongkir</h2>
        <main class="container">
            <!-- START FORM -->
            <form action="{{ route('ongkirs.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="my-3 p-4 bg-body rounded shadow-sm">
                    <div class="mb-3 row">
                        <label for="nama_kota" class="col-sm-2 col-form-label">Nama Kota</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nama_kota" id="nama_kota">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="tarif" class="col-sm-2 col-form-label">Tarif Harga</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name="tarif" id="tarif">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="submit" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">Tambahkan</button></div>
                    </div>
                </div>
            </form>
            <!-- AKHIR FORM -->
        </main>
    </body>
</div>
@endsection
