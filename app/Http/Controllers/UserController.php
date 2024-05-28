<?php

namespace App\Http\Controllers;

//import Model Post
use App\Models\Post;

//return type view
use Illuminate\View\View;

//return type redirectResponse
use Illuminate\Http\Request;

//import Facade "Storage"
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;


class UserController extends Controller
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

        $maleCount = Post::where('jenis_kelamin', 'cowo')->count();
        $femaleCount = Post::where('jenis_kelamin', 'cewe')->count();

        //render view with posts
        return view('dashboard', compact('posts', 'maleCount', 'femaleCount'));

    }

    public function pegawai(): View
    {
        $posts = Post::latest()->paginate(5);
        $maleCount = Post::where('jenis_kelamin', 'cowo')->count();
        $femaleCount = Post::where('jenis_kelamin', 'cewe')->count();
        return view('pegawai', compact('posts', 'maleCount', 'femaleCount'));
    }

    public function user(): View
    {
        $post = Auth::user();
        $maleCount = Post::where('jenis_kelamin', 'cowo')->count();
        $femaleCount = Post::where('jenis_kelamin', 'cewe')->count();
        return view('tabel_user', compact('post', 'maleCount', 'femaleCount'));
    }
}

