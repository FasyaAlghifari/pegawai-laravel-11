@extends('layouts.main')

@section('content')
<div class="content-wrapper">
<div class="card">
    <div class="card-header">
        <h3 class="card-title">DataTable User</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <a href="{{ url('admin/tabel/createuser') }}" class="btn btn-md btn-primary mb-3">TAMBAH USER</a>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Usertype</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($posts as $post)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $post->name }}</td>
                        <td>{{ $post->email }}</td>
                        <td>{{ $post->usertype }}</td>

                        <td class="text-center">
                            <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                action="{{ url('admin/tabel/destroyuser', $post->id) }}" method="POST">
                                <a href="{{ url('admin/tabel/edituser', $post->id) }}"
                                    class="btn btn-sm btn-primary">EDIT</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                            </form>
                        </td>
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
