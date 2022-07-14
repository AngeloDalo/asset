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
            <a class="btn btn-outline-success" href="{{ route('admin.money.index') }}">
                Mia Liquidit&agrave;
            </a>
            <a class="btn btn-outline-success" href="{{ route('admin.money.create') }}">
                Aggiungi Liquidit&agrave;
            </a>
        </div>
        <div class="row">
            <form action="{{ route('admin.money.store') }}" method="post" enctype="multipart/form-data" id="MyForm">
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
                    <label for="nome" class="form-label text-uppercase fw-bold">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome" value="{{ old('nome') }}">
                </div>
                {{-- <p id="demo1"></p> --}}
                @error('nome')
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

                {{-- <button type="button" class="btn btn-danger text-white" onclick="validationForm()" value="Submit form">Save</button> --}}
                <button type="submit" class="btn btn-success">Salva</button>
            </form>
        </div>
    </div>
@endsection
