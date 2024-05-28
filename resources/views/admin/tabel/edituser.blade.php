@extends('layouts.main')

@section('content')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Pegawai - XI-PPLG</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body style="background: #f4f6f9">
<div class="content-wrapper">
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ url('admin/tabel/updateuser', $post->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            @method('PUT')

                            <div class="row">
                                <div class="col">

                                    <div class="form-group">
                                        <label class="font-weight-bold">Name</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $post->name }}" placeholder="Masukkan name">
                                        <!-- error message untuk nama -->
                                        @error('nama')
                                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>

w

                                    <div class="form-group">
                                        <label class="font-weight-bold">Email</label>
                                        <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $post->email }}" placeholder="Masukkan name" disabled>
                                        <!-- error message untuk email -->
                                        @error('email')
                                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label class="font-weight-bold">Usertype</label>
                                        <select class="form-select @error('usertype') is-invalid @enderror" aria-label="Default select example" name="usertype">
                                            <option value="admin" {{ $post->usertype === 'admin' ? 'selected' : '' }}>Admin</option>
                                            <option value="supervisor" {{ $post->usertype === 'supervisor' ? 'selected' : '' }}>Supervisor</option>
                                            <option value="user" {{ $post->usertype === 'user' ? 'selected' : '' }}>User</option>
                                        </select>
                                        <!-- error message untuk jenis kelamin -->
                                        @error('usertype')
                                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Lanjutkan untuk input lainnya seperti tempat_lahir, tanggal_masuk, tanggal_lahir, jabatan, dsb. -->


                            <button type="submit" class="btn btn-md btn-primary">UPDATE</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>
                            <a href="{{ url('admin/tabel/tabel') }}" class="btn btn-md btn-success">KEMBALI</a>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('content');
    </script>
</body>

</html>
@endsection
