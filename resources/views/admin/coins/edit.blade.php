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
            Mie Monete
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
                <h2 class="text-uppercase"><span class="text-success">Modifica Monete:</span> {{ $coin->codice }}</h2>
            </div>
        </div>
        <div class="container-fluid">
            <div class="container">
                <form action="{{ route('admin.coins.update', $coin->id) }}" method="post" enctype="multipart/form-data"
                    id="MyForm">
                    @csrf
                    @method('PATCH')
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            @if (!empty($coin->immagine))
                                <div class="mb-3 w-100">
                                    <img class="w-75 rounded-3" src="{{ asset('storage/' . $coin->immagine) }}"
                                        alt="{{ $coin->codice }}">
                                </div>
                            @endif
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="mb-3">
                                <label for="codice" class="form-label text-uppercase fw-bold">Codice</label>
                                <input type="text" class="form-control" id="codice" name="codice"
                                    value="{{ $coin->codice }}">
                            </div>
                            {{-- <p id="demo1"></p> --}}
                            @error('codice')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <div class="mb-3">
                                <label for="ammontare" class="form-label text-uppercase fw-bold">ammontare</label>
                                <input type="text" class="form-control" id="ammontare" name="ammontare"
                                    value="{{ $coin->ammontare }}">
                            </div>
                            {{-- <p id="demo2"></p> --}}
                            @error('ammontare')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <div class="mb-3">
                                <label for="prezzo_singolo" class="form-label text-uppercase fw-bold">Prezzo Singolo</label>
                                <textarea type="text-area" class="form-control" id="prezzo_singolo" name="prezzo_singolo" row="5">{{ $coin->prezzo_singolo }}</textarea>
                            </div>
                            {{-- <p id="demo3"></p> --}}
                            @error('prezzo_singolo')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <div class="mb-3">
                                <label for="apy" class="form-label text-uppercase fw-bold">apy</label>
                                <textarea type="text-area" class="form-control" id="apy" name="apy" row="5">{{ $coin->apy }}</textarea>
                            </div>
                            {{-- <p id="demo4"></p> --}}
                            @error('apy')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success">Salva</button>
                </form>
            </div>
        </div>
    </div>
@endsection
