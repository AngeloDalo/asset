<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Coin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Storage;
use App\Address;
use Prophecy\Call\Call;
use App\Message;

class CoinController extends Controller
{
    public function index()
    {
        // $coins = Coin::where('user_id', Auth::user()->id)->get();

        // return response()->json([
        //     'response' => true,
        //     'results' => $coins,
        // ]);
    }
}
