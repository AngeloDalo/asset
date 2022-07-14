<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Storage;
use App\Stock;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Prophecy\Call\Call;
use App\Message;
class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stocks = Stock::where('user_id', Auth::user()->id)->get();
        return view('admin.stocks.index', ['stocks' => $stocks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.stocks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
        $validateData = $request->validate([
            'codice' => 'required|max:255',
            'nome' => 'required|max:255',
            'ammontare' => 'required',
            'prezzo_singolo' => 'required',
            'immagine' => 'required',
        ]);
        if (!empty($data['immagine'])) {
            $img_path = Storage::put('uploads', $data['immagine']);
            $data['immagine'] = $img_path;
        } else {
            $data['immagine'] = 'uploads/default.jpg';
        }
        $stock = new Stock();
        $stock->fill($data);
        $stock->save();
        return redirect()->route('admin.stocks.show', $stock->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Stock $stock)
    {
        if (Auth::user()->id != $stock->user_id) {
            return redirect()->route('admin.stocks.index');
        }
        return view('admin.stocks.show', ['stock' => $stock]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Stock $stock)
    {
        if (Auth::user()->id != $stock->user_id) {
            return redirect()->route('admin.stocks.index');
        }
        return view('admin.stocks.edit', ['stock' => $stock]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stock $stock)
    {
        $data = $request->all();
        if (Auth::user()->id != $stock->user_id) {
            return redirect()->route('admin.stocks.index');
        }
        $validateData = $request->validate([
            'codice' => 'required',
            'nome' => 'required',
            'ammontare' => 'required',
            'prezzo_singolo' => 'required',
        ]);
        if ($data['codice'] != $stock->codice) {
            $stock->codice = $data['codice'];
        }
        if ($data['nome'] != $stock->nome) {
            $stock->nome = $data['nome'];
        }
        if ($data['ammontare'] != $stock->ammontare) {
            $stock->ammontare = $data['ammontare'];
        }
        if ($data['prezzo_singolo'] != $stock->prezzo_singolo) {
            $stock->prezzo_singolo = $data['prezzo_singolo'];
        }
        $stock->update();
        return redirect()->route('admin.stocks.show', $stock->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stock $stock)
    {
        {
            $stock->delete();
            return redirect()->route('admin.stock.index')->with('status', "Stock nome: $stock->nome cancellato");
        }
    }
}
