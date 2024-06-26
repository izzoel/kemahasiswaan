<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Artikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //return view admin.main.blade.php 
        // $artikels = Artikel::all();
        // return view('admin.main', compact('artikels'));
        if (auth()->user()->role == 'admin') {
            return redirect('admin/artikel/show');
        } else {
            return redirect('/admin/ormawa/struktur/show');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        //
    }

    public function login(Request $request,)
    {
        $credentials = $request->only('username', 'password');

        if (auth()->attempt($credentials)) {
            // Jika otentikasi berhasil
            return redirect()->intended('admin');
        }

        // Jika otentikasi gagal
        return redirect()->route('landing')->with('error', 'Email atau password salah.');
    }


    public function logout()
    {
        auth()->logout();

        return redirect()->route('landing');
    }
}
