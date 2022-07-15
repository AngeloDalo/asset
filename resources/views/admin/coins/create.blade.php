@extends('layouts.admin')

@section('content')
    <div class="container border border-success rounded-3 p-3 mb-4">
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
        </div>
        <div class="row">
            <form action="{{ route('admin.coins.store') }}" method="post" enctype="multipart/form-data" id="MyForm">
                @csrf
                @method('POST')

                <div class="mb-3">
                    <label for="immagine" class="form-label text-uppercase fw-bold">Immagine</label>
                    <input class="form-control" type="file" id="immagine" name="immagine">
                </div>
                @error('immagine')
                    <div class="alert alert-danger mt-3"> {{ $message }}</div>
                @enderror

                <div class="mb-3">
                    <label for="codice" class="form-label text-uppercase fw-bold">Codice</label>
                    <input type="text" class="form-control" id="codice" name="codice" value="{{ old('codice') }}">
                </div>
                {{-- <p id="demo1"></p> --}}
                @error('codice')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="mb-3">
                    <label for="ammontare" class="form-label text-uppercase fw-bold">Ammontare</label>
                    <input type="text" class="form-control" id="ammontare" name="ammontare" value="{{ old('ammontare') }}">
                </div>
                {{-- <p id="demo2"></p> --}}
                @error('ammontare')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="mb-3">
                    <label for="prezzo_singolo" class="form-label text-uppercase fw-bold">Prezzo Singolo</label>
                    <input type="text" class="form-control" id="prezzo_singolo" name="prezzo_singolo" value="{{ old('prezzo_singolo') }}">
                </div>
                {{-- <p id="demo3"></p> --}}
                @error('prezzo_singolo')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="mb-3">
                    <label for="apy" class="form-label text-uppercase fw-bold">Apy</label>
                    <input type="text" class="form-control" id="apy" name="apy" value="{{ old('apy') }}">
                </div>
                {{-- <p id="demo4"></p> --}}
                @error('apy')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror


                {{-- <button type="button" class="btn btn-danger text-white" onclick="validationForm()" value="Submit form">Save</button> --}}
                <button type="submit" class="btn btn-success">Salva</button>
            </form>
        </div>
    </div>
@endsection
