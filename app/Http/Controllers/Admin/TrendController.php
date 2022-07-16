<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Storage;
use App\Coin;
use App\Transaction;
use App\Address;
use App\Trend;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Prophecy\Call\Call;
use App\Message;

class TrendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trends = Trend::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();
        return view('admin.trends.index', ['trends' => $trends]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.trends.create');
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
            'ammontare' => 'required',
        ]);
        $trend = new Trend();
        $trend->fill($data);
        $trend->save();
        $trends = Trend::where('user_id', Auth::user()->id)->get();
        return view('admin.trends.index', ['trends' => $trends]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Trend $trend)
    {
        if (Auth::user()->id != $trend->user_id) {
            return redirect()->route('admin.trends.index');
        }
        return view('admin.trends.show', ['trend' => $trend]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Trend $trend)
    {
        if (Auth::user()->id != $trend->user_id) {
            return redirect()->route('admin.trends.index');
        }
        return view('admin.trends.edit', ['trend' => $trend]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Trend $trend)
    {
        $data = $request->all();
        if (Auth::user()->id != $trend->user_id) {
            return redirect()->route('admin.trends.index');
        }
        $validateData = $request->validate([
            'ammontare' => 'required',
            'data' => 'required',
        ]);
        if ($data['ammontare'] != $trend->ammontare) {
            $trend->ammontare = $data['ammontare'];
        }
        if ($data['data'] != $trend->data) {
            $trend->data = $data['data'];
        }
        $trend->update();
        $trends = Trend::where('user_id', Auth::user()->id)->get();
        return view('admin.trends.index', ['trends' => $trends]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Trend $trend)
    {
        {
            $trend->delete();
            return redirect()->route('admin.trends.index')->with('status', "Trend numero: $trend->id cancellato");
        }
    }
}
