<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Storage;
use App\Money;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Prophecy\Call\Call;
use App\Message;

class MoneyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $money = Money::where('user_id', Auth::user()->id)->get();
        return view('admin.money.index', ['money' => $money]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.money.create');
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
            'nome' => 'required|max:255',
            'ammontare' => 'required',
            'immagine' => 'required',
        ]);
        if (!empty($data['immagine'])) {
            $img_path = Storage::put('uploads', $data['immagine']);
            $data['immagine'] = $img_path;
        } else {
            $data['immagine'] = 'uploads/default.jpg';
        }
        $money = new Money();
        $money->fill($data);
        $money->save();
        return redirect()->route('admin.money.show', $money->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Money $money)
    {
        if (Auth::user()->id != $money->user_id) {
            return redirect()->route('admin.money.index');
        }
        return view('admin.money.show', ['money' => $money]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Money $money)
    {
        if (Auth::user()->id != $money->user_id) {
            return redirect()->route('admin.money.index');
        }
        return view('admin.money.edit', ['money' => $money]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Money $money)
    {
        $data = $request->all();
        if (Auth::user()->id != $money->user_id) {
            return redirect()->route('admin.money.index');
        }
        $validateData = $request->validate([
            'nome' => 'required|max:255',
            'ammontare' => 'required',
            'immagine' => 'required',
        ]);
        if ($data['nome'] != $money->nome) {
            $money->nome = $data['nome'];
        }
        if ($data['ammontare'] != $money->ammontare) {
            $money->ammontare = $data['ammontare'];
        }
        if (!empty($data['immagine'])) {
            Storage::delete($money->immagine);

            $img_path = Storage::put('uploads', $data['immagine']);
            $money->immagine = $img_path;
        }
        $money->update();
        return redirect()->route('admin.money.show', $money->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Money $money)
    {
        {
            $money->delete();
            return redirect()->route('admin.money.index')->with('status', "Liquidita' nome: $money->nome cancellato");
        }
    }
}
