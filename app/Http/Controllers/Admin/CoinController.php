<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Storage;
use App\Coin;
use App\Address;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Prophecy\Call\Call;
use App\Message;

class CoinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coins = Coin::where('user_id', Auth::user()->id)->get();
        return view('admin.coins.index', ['coins' => $coins]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.coins.create');
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
            'ammontare' => 'required',
            'prezzo_singolo' => 'required',
            'apy' => 'required',
            'immagine' => 'required',
        ]);
        if (!empty($data['immagine'])) {
            $img_path = Storage::put('uploads', $data['immagine']);
            $data['immagine'] = $img_path;
        } else {
            $data['immagine'] = 'uploads/default.jpg';
        }
        $coin = new Coin();
        $coin->fill($data);
        $coin->save();
        return redirect()->route('admin.coins.show', $coin->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Coin $coin)
    {
        if (Auth::user()->id != $coin->user_id) {
            return redirect()->route('admin.coins.index');
        }
        $id = $coin->id;
        $addresses = Address::where('coin_id', $id)->where('user_id', Auth::user()->id)->get();
        //mettere indirizzi
        return view('admin.coins.show', ['coin' => $coin, 'addresses' => $addresses]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Coin $coin)
    {
        if (Auth::user()->id != $coin->user_id) {
            return redirect()->route('admin.coins.index');
        }
        return view('admin.coins.edit', ['coin' => $coin]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Coin $coin)
    {
        $data = $request->all();
        if (Auth::user()->id != $coin->user_id) {
            return redirect()->route('admin.coins.index');
        }
        $validateData = $request->validate([
            'codice' => 'required|max:255',
            'ammontare' => 'required',
            'prezzo_singolo' => 'required',
            'apy' => 'required',
            'immagine' => 'required',
        ]);
        if ($data['codice'] != $coin->codice) {
            $coin->codice = $data['codice'];
        }
        if ($data['ammontare'] != $coin->ammontare) {
            $coin->ammontare = $data['ammontare'];
        }
        if ($data['apy'] != $coin->apy) {
            $coin->apy = $data['apy'];
        }
        if (!empty($data['immagine'])) {
            Storage::delete($coin->immagine);

            $img_path = Storage::put('uploads', $data['immagine']);
            $coin->immagine = $img_path;
        }
        $coin->update();
        return redirect()->route('admin.coins.show', $coin->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coin $coin)
    {
        {
            $coin->delete();
            return redirect()->route('admin.coins.index')->with('status', "Coin nome: $coin->codice cancellato");
        }
    }
}
