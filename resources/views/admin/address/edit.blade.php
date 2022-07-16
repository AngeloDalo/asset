@extends('layouts.admin')

@section('content')
    <div class="row">
        @if (session('status'))
            <div class="alert alert-danger">
                {{ session('status') }}
            </div>
        @endif
    </div>
    <div class="d-block d-lg-none m-2">
        <a class="btn btn-outline-success" href="{{ url('/') }}">
            Home
        </a>
        <a class="btn btn-outline-success" href="{{ route('admin.summary.index') }}">
            Riassunto
        </a>
        <a class="btn btn-outline-success" href="{{ route('admin.coins.index') }}">
            Mie Crypto
        </a>
        <a class="btn btn-outline-success" href="{{ route('admin.coins.create') }}">
            Aggiungi Moneta
        </a>
        <a class="btn btn-outline-success" href="{{ route('admin.stocks.index') }}">
            Mie Stocks
        </a>
        <a class="btn btn-outline-success" href="{{ route('admin.stocks.create') }}">
            Aggiungi Stocks
        </a>
        <a class="btn btn-outline-success" href="{{ route('admin.transactions.index') }}">
            Mie Transazioni Stocks
        </a>
        <a class="btn btn-outline-success" href="{{ route('admin.transactions.create') }}">
            Aggiungi Transazione Stocks
        </a>
        <a class="btn btn-outline-success" href="{{ route('admin.money.index') }}">
            Mia Liquidit&agrave;
        </a>
        <a class="btn btn-outline-success" href="{{ route('admin.money.create') }}">
            Aggiungi Liquidit&agrave;
        </a>
        <a class="btn btn-outline-success" href="{{ route('admin.trends.index') }}">
            Trend
        </a>
        <a class="btn btn-outline-success" href="{{ route('admin.trends.create') }}">
            Aggiungi Trend
        </a>
    </div>
    <div class="container border border-success rounded-3 p-3 mb-4">
        <div class="row">
            <div class="col">
                <h2 class="text-uppercase"><span class="text-success">Modifica Indirizzo:</span> {{ $address->portafoglio }}
                </h2>
            </div>
        </div>
        <div class="container-fluid">
            <div class="containner">
                <form action="{{ route('admin.address.update', $address->id) }}" method="post"
                    enctype="multipart/form-data" id="MyForm">
                    @csrf
                    @method('PATCH')
                    <div class="mb-3 mt-3 row">
                        <div class="col-12 col-lg-6">
                            @if (!empty($address->immagine))
                                <div class="mb-3 w-100">
                                    <img class="img-fluid w-75 rounded-3"
                                        src="{{ asset('storage/' . $address->immagine) }}"
                                        alt="{{ $address->indirizzo }}">
                                </div>
                            @endif
                        </div>

                        <div class="mb-3 col-12 col-lg-6">
                            <div class="mb-3">
                                <label for="portafoglio" class="form-label text-uppercase fw-bold">Portafoglio</label>
                                <input type="text" class="form-control" id="portafoglio" name="portafoglio"
                                    value="{{ $address->portafoglio }}">
                            </div>
                            {{-- <p id="demo1"></p> --}}
                            @error('portafoglio')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <div class="mb-3">
                                <label for="indirizzo" class="form-label text-uppercase fw-bold">indirizzo</label>
                                <input type="text" class="form-control" id="indirizzo" name="indirizzo"
                                    value="{{ $address->indirizzo }}">
                            </div>
                            {{-- <p id="demo2"></p> --}}
                            @error('indirizzo')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>
                    <button type="submit" class="btn-success">Salva</button>
                </form>
            </div>
        </div>
    </div>
@endsection
