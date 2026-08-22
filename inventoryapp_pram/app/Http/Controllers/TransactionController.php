<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->role === 'admin') {
            $transactions = Transaction::all();
        } else {
            $transactions = Transaction::where('user_id', $user->id)->get();
        }

        return view('transaction.read', ['transactions' => $transactions]);
    }

    public function create()
    {
        $products = Product::all();
        return view('transaction.create', ['products' => $products]);
    }

    public function store(Request $request)
    {
        // Validation standar gaya kamu
        $request->validate([
            'product_id' => ['required'],
            'type' => ['required'],
            'amount' => ['required', 'numeric', 'min:1'],
        ], [
            "required" => "inputan :attribute wajib diisi",
            "min" => "inputan :attribute minimal :min"
        ]);

        // Insert ke tabel transactions
        Transaction::create([
            'user_id' => Auth::id(),
            'product_id' => $request->input('product_id'),
            'type' => $request->input('type'),
            'amount' => $request->input('amount'),
            'notes' => $request->input('notes'),
        ]);

        //update stok
        $product = Product::find($request->input('product_id'));

        if ($request->input('type') === 'in') {
            $product->stock = $product->stock + $request->input('amount');
        } else {
            $product->stock = $product->stock - $request->input('amount');
        }

        $product->save();

        return redirect('/transaction')->with('success', 'Transaksi berhasil ditambahkan!');
    }
}