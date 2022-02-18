<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $food = Food::all();
        
        return view('food.index', compact('food'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('food.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validasi
        $request -> validate([
            'name' => 'required|min:5|max:20',
            'price' => 'required|numeric',
            'detail' => 'required|min:5|max:100'
        ],
        [
            'name.required' => 'Jangan lupa isi nama...',
            'name.min' => 'Nama makanan minimal 5 huruf...',
            'detail.required' => 'Jangan lupa isi detail...',
            'detail.min' => 'Detail makanan minimal 5 huruf...',
            'detail.max' => 'Detail makanan maksimal 100 huruf...',
        ]
    );

        // return $request;
        Food::create([
            'name' => $request->name,
            'price' => $request->price,
            'detail' => $request->detail
        ]);
        return redirect('/food')->with('create', 'Data berhasil ditambahkan!'); //pesan ketika berhasil ditambahkan dan penggunaan status agar isinya ditampilkan ketika kondisi fi di index terpenuhi
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function show(Food $food)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function edit(Food $food)
    {
        return view('food/edit', compact('food'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Food $food)
    {
        // return $request;
        $request -> validate([
            'name' => 'required|min:5|max:20',
            'price' => 'required|numeric',
            'detail' => 'required|min:5|max:100'
        ],
        [
            'name.required' => 'Jangan lupa isi nama...',
            'name.min' => 'Nama makanan minimal 5 huruf...',
            'detail.required' => 'Jangan lupa isi detail...',
            'detail.min' => 'Detail makanan minimal 5 huruf...',
            'detail.max' => 'Detail makanan maksimal 100 huruf...',
        ]
    );

    //perintah model untuk update data
    Food::where('id',$food->id)->update([
        'name' => $request->name,
        'price' => $request->price,
        'detail' => $request->detail
    ]);

    return redirect('/food')->with('update', 'Data berhasil di-update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function destroy(Food $food)
    {
        // perintah menghapus data
        Food::destroy($food->id);
        return redirect('/food')->with('delete', 'Data berhasil dihapus!');
    }
}
