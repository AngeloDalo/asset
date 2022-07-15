<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Storage;
use App\Coin;
use App\Transaction;
use App\Address;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Prophecy\Call\Call;
use App\Message;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = Transaction::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();
        return view('admin.transactions.index', ['transactions' => $transactions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.transactions.create');
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
            'data' => 'required',
            'nome' => 'required',
            'ammontare' => 'required',
            'totale' => 'required',
        ]);
        $transaction = new Transaction();
        $transaction->fill($data);
        $transaction->save();
        $transactions = Transaction::where('user_id', Auth::user()->id)->get();
        return view('admin.transactions.index', ['transactions' => $transactions]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        if (Auth::user()->id != $transaction->user_id) {
            return redirect()->route('admin.transactions.index');
        }
        return view('admin.transactions.show', ['transaction' => $transaction]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        if (Auth::user()->id != $transaction->user_id) {
            return redirect()->route('admin.transactions.index');
        }
        return view('admin.transactions.edit', ['transaction' => $transaction]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        $data = $request->all();
        if (Auth::user()->id != $transaction->user_id) {
            return redirect()->route('admin.transactions.index');
        }
        $validateData = $request->validate([
            'nome' => 'required|max:255',
            'ammontare' => 'required',
            'totale' => 'required',
            'data' => 'required',
        ]);
        if ($data['nome'] != $transaction->nome) {
            $transaction->nome = $data['nome'];
        }
        if ($data['ammontare'] != $transaction->ammontare) {
            $transaction->ammontare = $data['ammontare'];
        }
        if ($data['totale'] != $transaction->totale) {
            $transaction->totale = $data['totale'];
        }
        if ($data['data'] != $transaction->data) {
            $transaction->data = $data['data'];
        }
        $transaction->update();
        $transactions = Transaction::where('user_id', Auth::user()->id)->get();
        return view('admin.transactions.index', ['transactions' => $transactions]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        {
            $transaction->delete();
            return redirect()->route('admin.transactions.index')->with('status', "Transazione numero: $transaction->id cancellato");
        }
    }
}
