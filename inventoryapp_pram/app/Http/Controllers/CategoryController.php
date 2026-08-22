<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Category;

class CategoryController extends Controller
{

    public function create()
    {
        return view('category.create');
    }

    public function store(Request $request)
    {
        //validation (aturan pada aplikasi kita)
        //bisa liat di documentation alravel tentang validasi (aturan)
        $request->validate([
            'name' => ['required', 'min:5'],
            'description' => ['required'],
        ], [
            "required" => "inputan :attribute wajib diisi",
            "min" => "inputan :attribute :min karakter"
        ]);

        //insert data
        $now = carbon::now();
        Category::insert([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'created_at' => $now,
            'updated_at' => $now
        ]);

        //Arahkan ke halaman tampil semua category
        return redirect('/category')->with('success', 'Kategori berhasil ditambahkan!');

    }

    public function index()
    {
        $categories = Category::get();
        return view('category.tampil', ['categories' => $categories]);

    }

    public function show($id)
    {
        $categories = Category::find($id);
        return view('category.detail', ['categories' => $categories]);
    }

    public function edit($id)
    {

        $categories = Category::find($id);
        return view('category.update', ['categories' => $categories]);

    }


    public function update(Request $request, $id)
    {
        //validation (aturan pada aplikasi kita)
        //bisa liat di documentation alravel tentang validasi (aturan)
        $request->validate([
            'name' => ['required', 'min:5'],
            'description' => ['required'],
        ], [
            "required" => "inputan :attribute wajib diisi",
            "min" => "inputan :attribute :min karakter"
        ]);

        //update data
        $now = carbon::now();
        Category::where('id', $id)
            ->update([

                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'updated_at' => $now

            ]);

        //Arahkan ke halaman tampil semua category
        return redirect('/category')->with('success', 'Kategori berhasil diubah!');

    }

    public function destroy($id)
    {
        Category::where('id', $id)->delete();

        return redirect('/category')->with('success', 'Kategori berhasil dihapus!');
    }
}