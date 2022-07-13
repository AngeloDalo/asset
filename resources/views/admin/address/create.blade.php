@extends('layouts.admin')

@section('content')
    <div class="container border border-danger rounded-3 p-3 mb-4">
        <div class="row">
            @if (session('status'))
                <div class="alert alert-danger">
                    {{ session('status') }}
                </div>
            @endif
        </div>
        <div class="row">
            <form action="{{ route('admin.address.store') }}" method="post" enctype="multipart/form-data" id="MyForm">
                @csrf
                @method('POST')

                @error('coins.*')
                <div class="alert alert-success mt-3">
                    {{ $message }}
                </div>
                @enderror
                <fieldset class="mb-3">
                    <label for="name" class="form-label text-uppercase fw-bold">CRYPTO</label>
                    <div class="container">
                        <div class="d-flex row">
                            @foreach ($coins as $coin)
                                <div class="form-check col-12 col-md-3">
                                    <input class="form-check-input" type="checkbox" value="{{ $coin->id }}"
                                        name="coins[]"
                                        {{ in_array($coin->id, old('coins', [])) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="flexCheckDefault">
                                        {{ $coin->codice }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </fieldset>

                <div class="mb-3">
                    <label for="immagine" class="form-label text-uppercase fw-bold">Immagine</label>
                    <input class="form-control" type="file" id="immagine" name="immagine">
                </div>
                @error('immagine')
                    <div class="alert alert-danger mt-3"> {{ $message }}</div>
                @enderror

                <div class="mb-3">
                    <label for="portafoglio" class="form-label text-uppercase fw-bold">Portafoglio</label>
                    <input type="text" class="form-control" id="portafoglio" name="portafoglio" value="{{ old('portafoglio') }}">
                </div>
                {{-- <p id="demo1"></p> --}}
                @error('portafoglio')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="mb-3">
                    <label for="indirizzo" class="form-label text-uppercase fw-bold">Indirizzo</label>
                    <input type="text" class="form-control" id="indirizzo" name="indirizzo" value="{{ old('indirizzo') }}">
                </div>
                {{-- <p id="demo2"></p> --}}
                @error('indirizzo')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                {{-- <button type="button" class="btn btn-danger text-white" onclick="validationForm()" value="Submit form">Save</button> --}}
                <button type="submit" class="btn btn-primary">Salva</button>
            </form>
        </div>
    </div>
@endsection
