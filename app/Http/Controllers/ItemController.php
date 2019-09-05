<?php

namespace App\Http\Controllers;

use App\Item;
use File;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::all();
        return view('items.index',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('items.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'nama' => 'required',
        //     'harga' => 'required',
        //     'kategori' => 'required',
        //     'stok' => 'required',
        //     'gambar' => 'required',
        // ]);
  
        $check = new Item;;
        $check->nama = $request->nama;
        $check->harga = $request->harga;
        $check->kategori = $request->kategori;
        $check->stok = $request->stok;
        $file_name = $request->gambar->getClientOriginalName();
        $check->gambar = $file_name;
        $check->save();

        $file = $request->file('gambar');
        $path = 'gambar';
        $file->move($path, $file->getClientOriginalName());

        return redirect()->route('items.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        return view('items.edit',compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        $request->validate([
            'nama' => 'required',
            'harga' => 'required',
            'kategori' => 'required',
            'stok' => 'required',
        ]);

        if ($request->hasFile('gambar')) {
            $file_name = $request->gambar->getClientOriginalName();
            $data = [
                'nama' => $request->nama,
                'harga' => $request->harga,
                'kategori' => $request->kategori,
                'stok' => $request->stok,
                'gambar' => $file_name,
            ];
        }else{
            $data = [
                'nama' => $request->nama,
                'harga' => $request->harga,
                'kategori' => $request->kategori,
                'stok' => $request->stok,
            ];
        }

        Item::where('id',$request->id)->update($data);

        return redirect()->route('items.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        $item->delete();
  
        return redirect()->route('items.index');
    }
}
