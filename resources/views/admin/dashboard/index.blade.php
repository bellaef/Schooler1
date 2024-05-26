@extends('component.main')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Jumlah Admin</div>
                <div class="card-body">{{ $jumlahAdmin }}</div>
            </div>
        </div>
        <!-- Tambahkan card lainnya sesuai dengan data yang ingin ditampilkan -->
    </div>
</div>
@endsection
