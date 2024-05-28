<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;

class TabelUserController extends Controller
{
        /**
     * index
     *
     * @return View
     */

    public function tabel(): View
    {
        $posts = User::latest()->paginate(5);
        $maleCount = Post::where('jenis_kelamin', 'laki-laki')->count();
        $femaleCount = Post::where('jenis_kelamin', 'cewe')->count();

        //render view with posts
        return view('admin.tabel.tabel', compact('posts', 'maleCount', 'femaleCount'));
    }

    public function createuser(): View
    {
        $maleCount = Post::where('jenis_kelamin', 'laki-laki')->count();
        $femaleCount = Post::where('jenis_kelamin', 'cewe')->count();
        return view('admin.tabel.createuser', compact('maleCount', 'femaleCount'));
    }

    public function storeuser(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'usertypee' => $request->usertype,
        ]);

        event(new Registered($user));


        return redirect('admin/tabel/tabel')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * edit
     *
     * @param  mixed $id
     * @return View
     */
    public function edituser(string $id): View
    {
        //get post by ID
        $post = User::findOrFail($id);
        $maleCount = Post::where('jenis_kelamin', 'laki-laki')->count();
        $femaleCount = Post::where('jenis_kelamin', 'cewe')->count();
        //render view with post
        return view('admin/tabel/edituser', compact('post', 'maleCount', 'femaleCount'));
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function updateuser(Request $request, $id): RedirectResponse
    {
        //validate form
        $request->validate([
            'name' => 'required',
            'usertype' => 'required',
        ]);

        //get post by ID
        $post = User::findOrFail($id);

        //check if image is uploaded
            //update post with new image
            $post->update([
            'name'     => $request->name,
            'usertype'   => $request->usertype,
            ]);

        //redirect to index
        return redirect('admin/tabel/tabel')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * destroy
     *
     * @param  mixed $post
     * @return void
     */
    public function destroyuser($id): RedirectResponse
    {
        //get post by ID
        $post = User::findOrFail($id);

        //delete post
        $post->delete();

        //redirect to index
        return redirect('admin/tabel/tabel')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
