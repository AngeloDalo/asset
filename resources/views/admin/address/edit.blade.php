@extends('layouts.admin')

@section('content')
    <div class="row">
        @if (session('status'))
            <div class="alert alert-danger">
                {{ session('status') }}
            </div>
        @endif
    </div>
    <div class="container border border-danger rounded-3 p-3 mb-4">
        <div class="row">
            <div class="col">
                <h2 class="text-uppercase"><span class="text-danger">Modifica Indirizzo:</span> {{ $address->portafoglio }}</h2>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <form action="{{ route('admin.address.update', $address->id) }}" method="post"
                    enctype="multipart/form-data" id="MyForm">
                    @csrf
                    @method('PATCH')
                    <div class="mb-3 mt-3">
                        @if (!empty($address->immagine))
                            <div class="mb-3">
                                <img class="img-fluid w-50 rounded-3" src="{{ asset('storage/' . $address->immagine) }}"
                                    alt="{{ $address->indirizzo }}">
                            </div>
                        @endif
                        <div class="mb-3">
                            <label for="immagine" class="form-label">Immagine</label>
                            <input class="form-control" type="file" id="immagine" name="immagine">
                            @error('immagine')
                                <div class="alert alert-danger mt-3">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

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
                    <button type="submit" class="btn btn-primary">Salva</button>
                </form>
            </div>
        </div>
    </div>
@endsection

