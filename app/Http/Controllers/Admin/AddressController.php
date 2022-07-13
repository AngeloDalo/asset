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

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $coins = Coin::where('user_id', Auth::user()->id)->get();
        return view('admin.address.create', ['coins' => $coins]);
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
        $data['coin_id'] = $data['coins'][0];
        $validateData = $request->validate([
            'portafoglio' => 'required|max:255',
            'indirizzo' => 'required',
            'immagine' => 'required',
        ]);
        if (!empty($data['immagine'])) {
            $img_path = Storage::put('uploads', $data['immagine']);
            $data['immagine'] = $img_path;
        } else {
            $data['immagine'] = 'uploads/default.jpg';
        }
        $address = new Address();
        $address->fill($data);
        $address->save();
        return redirect()->route('admin.coins.show', $address->coin_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Address $address)
    {
        if (Auth::user()->id != $address->user_id) {
            return redirect()->route('admin.coins.index');
        }
        return view('admin.address.edit', ['address' => $address]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Address $address)
    {
        $data = $request->all();
        if (Auth::user()->id != $address->user_id) {
            return redirect()->route('admin.coins.index');
        }
        $validateData = $request->validate([
            'portafoglio' => 'required|max:255',
            'indirizzo' => 'required',
            'immagine' => 'required',
        ]);
        if ($data['portafoglio'] != $address->portafoglio) {
            $address->portafoglio = $data['portafoglio'];
        }
        if ($data['indirizzo'] != $address->indirizzo) {
            $address->indirizzo = $data['indirizzo'];
        }
        if (!empty($data['immagine'])) {
            Storage::delete($address->immagine);
            $img_path = Storage::put('uploads', $data['immagine']);
            $address->immagine = $img_path;
        }
        $address->update();
        return redirect()->route('admin.coins.show', $address->coin_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Address $address)
    {
        {
            $address->delete();
            return redirect()->route('admin.coins.show', $address->coin_id)->with('status', "Indirizzo nome: $address->portafoglio cancellato");
        }
    }
}
