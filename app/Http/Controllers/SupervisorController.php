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


class SupervisorController extends Controller
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
        $femaleCount = Post::where('jenis_kelamin', 'cewe')->count();

        //render view with posts
        return view('supervisor.dashboard', compact('posts', 'maleCount', 'femaleCount'));

    }
/*
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
        $femaleCount = Post::where('jenis_kelamin', 'cewe')->count();
        //render view with post
        return view('supervisor/show', compact('post', 'maleCount', 'femaleCount'));
    }

    public function pegawai(): View
    {

        $posts = Post::latest()->paginate(5);
        $maleCount = Post::where('jenis_kelamin', 'laki-laki')->count();
        $femaleCount = Post::where('jenis_kelamin', 'cewe')->count();
        return view('supervisor/pegawai', compact('posts', 'maleCount', 'femaleCount'));
    }
}


