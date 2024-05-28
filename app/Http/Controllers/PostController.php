<?php

namespace App\Http\Controllers;

//import Model Post
use App\Models\Post;

//return type view
use Illuminate\View\View;

//return type redirectResponse
use Illuminate\Http\RedirectResponse;

//import Facade "Storage"
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;


class PostController extends Controller
{
    /**
     * index
     *
     * @return View
     */
    public function index(): View
    {
        //get posts
        $posts = Post::latest()->paginate(5);

        $maleCount = Post::where('jenis_kelamin', 'laki-laki')->count();
        $femaleCount = Post::where('jenis_kelamin', 'Cewe')->count();

        //render view with posts
        return view('admin.dashboard', compact('posts', 'maleCount', 'femaleCount'));

    }

    public function pegawai(): View
    {
        $posts = Post::latest()->paginate(5);

        $maleCount = Post::where('jenis_kelamin', 'laki-laki')->count();
        $femaleCount = Post::where('jenis_kelamin', 'Cewe')->count();

        //render view with posts
        return view('admin.pegawai', compact('posts', 'maleCount', 'femaleCount'));
    }

    /**
     * create
     *
     * @return View
     */
    public function create(): View
    {
        $maleCount = Post::where('jenis_kelamin', 'laki-laki')->count();
        $femaleCount = Post::where('jenis_kelamin', 'Cewe')->count();

        return view('admin.create', compact('maleCount', 'femaleCount'));
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {

        //upload image
        $image = $request->file('image');
        $image->storeAs('public/posts', $image->hashName());

        //create post
        Post::create([
            'image'     => $image->hashName(),
            'nama'     => $request->nama,
            'alamat'   => $request->alamat,
            'tempat_lahir'   => $request->tempat_lahir,
            'tanggal_lahir'   => $request->tanggal_lahir,
            'jenis_kelamin'   => $request->jenis_kelamin,
            'jabatan'   => $request->jabatan,
            'masuk_kerja'   => $request->masuk_kerja,
            'job'   => $request->job
        ]);

        //redirect to index
        return redirect('admin/dashboard')->with(['success' => 'Data Berhasil Disimpan!']);
    }

     /**
     * show
     *
     * @param  mixed $id
     * @return View
     */
    public function show(string $id): View
    {
        //get post by ID
        $post = Post::findOrFail($id);
        $maleCount = Post::where('jenis_kelamin', 'laki-laki')->count();
        $femaleCount = Post::where('jenis_kelamin', 'Cewe')->count();
        //render view with post
        return view('admin/show', compact('post', 'maleCount', 'femaleCount'));
    }

    /**
     * edit
     *
     * @param  mixed $id
     * @return View
     */
    public function edit(string $id): View
    {
        //get post by ID
        $post = Post::findOrFail($id);
        $maleCount = Post::where('jenis_kelamin', 'laki-laki')->count();
        $femaleCount = Post::where('jenis_kelamin', 'Cewe')->count();
        //render view with post
        return view('admin/edit', compact('post', 'maleCount', 'femaleCount'));
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
    {
        //validate form

        //get post by ID
        $post = Post::findOrFail($id);

        //check if image is uploaded
        if ($request->hasFile('image')) {

            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/posts', $image->hashName());

            //delete old image
            Storage::delete('public/posts/'.$post->image);

            //update post with new image
            $post->update([
            'image'     => $image->hashName(),
            'nama'     => $request->nama,
            'alamat'   => $request->alamat,
            'tempat_lahir'   => $request->tempat_lahir,
            'tanggal_lahir'   => $request->tanggal_lahir,
            'jenis_kelamin'   => $request->jenis_kelamin,
            'jabatan'   => $request->jabatan,
            'masuk_kerja'   => $request->masuk_kerja,
            'job'   => $request->job
            ]);

        } else {

            //update post without image
            $post->update([
            'nama'     => $request->nama,
            'alamat'   => $request->alamat,
            'tempat_lahir'   => $request->tempat_lahir,
            'tanggal_lahir'   => $request->tanggal_lahir,
            'jenis_kelamin'   => $request->jenis_kelamin,
            'jabatan'   => $request->jabatan,
            'masuk_kerja'   => $request->masuk_kerja,
            'job'   => $request->job
            ]);
        }

        //redirect to index
        return redirect('admin/dashboard')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * destroy
     *
     * @param  mixed $post
     * @return void
     */
    public function destroy($id): RedirectResponse
    {
        //get post by ID
        $post = Post::findOrFail($id);

        //delete image
        Storage::delete('public/posts/'. $post->image);

        //delete post
        $post->delete();

        //redirect to index
        return redirect('admin/dashboard')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
