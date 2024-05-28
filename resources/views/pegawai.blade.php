@extends('layouts.main')

@section('content')
    <div class="content-wrapper">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">DataTable Pegawai</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Gambar</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Tempat Lahir</th>
                            <th>tanggal Lahir</th>
                            <th>Jenis Kelamin</th>
                            <th>Jabatan</th>
                            <th>Tanggal Masuk</th>
                            <th>Job</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($posts as $post)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td class="text-center">
                                    <img src="{{ asset('/storage/posts/' . $post->image) }}" class="rounded"
                                        style="width: 90px">
                                </td>
                                <td>{{ $post->nama }}</td>
                                <td>{{ $post->alamat }}</td>
                                <td>{{ $post->tempat_lahir }}</td>
                                <td>{{ $post->tanggal_lahir }}</td>
                                <td>{{ $post->jenis_kelamin }}</td>
                                <td>{{ $post->jabatan }}</td>
                                <td>{{ $post->masuk_kerja }}</td>
                                <td>{{ $post->job }}</td>
                            </tr>
                        @empty
                            <div class="alert alert-danger">
                                Data Post belum Tersedia.
                            </div>
                        @endforelse
                    </tbody>
                </table>
                {{ $posts->links() }}
            </div>
            <!-- /.card-body -->
        </div>
    </div>
    <footer class="main-footer" style="width: 100%;margin-left:0.1rem;position: relative;">
        <strong>Copyright &copy; 2024 <a href="https://youtu.be/X3gKryRXfDo?si=zzrbc5px2JERnRjp">TIM IT SMK
                PI</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm inline-block">
            <b>Version</b> 3.2.0
        </div>
    </footer>
@endsection
