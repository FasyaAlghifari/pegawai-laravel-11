@extends('layouts.main')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Data Post - SantriKoding.com</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<style>
    .info-table {
        width: 100%; /* Sesuaikan lebar tabel */
        margin-top: 20px;
        border-collapse: collapse; /* Menghilangkan jarak antar sel */
    }
    .info-table td {
        padding: 8px; /* Padding untuk sel */
        border: 1px solid #ddd; /* Border untuk sel */
    }
    .info-table tr:nth-child(even){background-color: #f2f2f2;} /* Warna selang-seling untuk baris */
    .info-table tr:hover {background-color: #ddd;} /* Warna saat hover */
</style>
<body style="background: #f4f6f9">
<div class="content-wrapper">
    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <img src="{{ asset('storage/posts/'.$post->image) }}" class="w-100 rounded">
                        <hr>
                        <div class="card-body">
                            <center>
                            <table class="info-table">
                                <tr>
                                    <td>Nama</td>
                                    <td>: {{$post->nama}}</td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>: {{$post->alamat}}</td>
                                </tr>
                                <tr>
                                    <td>Tempat Lahir</td>
                                    <td>: {{$post->tempat_lahir}}</td>
                                </tr>
                                <tr>
                                    <td>Tanggal Lahir</td>
                                    <td>: {{$post->tanggal_lahir}}</td>
                                </tr>
                                <tr>
                                    <td>Jenis Kelamin</td>
                                    <td>: {{$post->jenis_kelamin}}</td>
                                </tr>
                                <tr>
                                    <td>Jabatan</td>
                                    <td>: {{$post->jabatan}}</td>
                                </tr>
                            </table>
                            </center>
                        </div>
                        <!-- <h4>{{ $post->nama }}</h4>
                        <p class="tmt-3">
                            {!! $post->alamat!!}
                            {!! $post->tempat_lahir !!}
                            {!! $post->tanggal_lahir !!}
                            {!! $post->job !!}
                        </p> -->
                        <a href="{{ url('supervisor/pegawai') }}"class="btn btn-md btn-danger">KEMBALI</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
@endsection
</html>
