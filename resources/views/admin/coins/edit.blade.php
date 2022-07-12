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
                <h2 class="text-uppercase"><span class="text-danger">Modifica Monete:</span> {{ $coin->codice }}</h2>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <form action="{{ route('admin.coins.update', $coin->id) }}" method="post"
                    enctype="multipart/form-data" id="MyForm">
                    @csrf
                    @method('PATCH')
                    <div class="mb-3 mt-3">
                        @if (!empty($coin->immagine))
                            <div class="mb-3">
                                <img class="img-fluid w-50 rounded-3" src="{{ asset('storage/' . $coin->immagine) }}"
                                    alt="{{ $coin->codice }}">
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
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>

    {{-- <script>
        function validationForm() {
            let title = document.getElementById('codice').value;
            let error1 = document.getElementById('demo1');
            let price = document.getElementById('ammontare').value;
            let error2 = document.getElementById('demo2');
            let rooms = document.getElementById('prezzo_singolo').value;
            let error3 = document.getElementById('demo3');
            let beds = document.getElementById('apy').value;
            let error4 = document.getElementById('demo4');
            let message = "";
            let error = 0;
            if (!title || !title.trim()) {
                message = 'codice non valido';
                error = 1;
                error1.innerHTML = message;
                error1.classList.add("alert");
                error1.classList.add("alert-danger");
            } else {
                error1.innerHTML = "";
                error1.classList.remove("alert");
                error1.classList.remove("alert-danger");
            }
            if (ammontare < 0 || !ammontare || isNaN(ammontare)) {
                message = 'Quantita\' non valida';
                error = 1;
                error2.innerHTML = message;
                error2.classList.add("alert");
                error2.classList.add("alert-danger");
            } else {
                error2.innerHTML = "";
                error2.classList.remove("alert");
                error2.classList.remove("alert-danger");
            }
            if (prezzo_singolo < 0 || !prezzo_singolo || isNaN(prezzo_singolo)) {
                message = 'Prezzo per singola moneta non valido';
                error = 1;
                error3.innerHTML = message;
                error3.classList.add("alert");
                error3.classList.add("alert-danger");
            } else {
                error3.innerHTML = "";
                error3.classList.remove("alert");
                error3.classList.remove("alert-danger");
            }
            if (apy < 0 || !apy || isNaN(apy)) {
                message = 'APY non valido';
                error = 1;
                error4.innerHTML = message;
                error4.classList.add("alert");
                error4.classList.add("alert-danger");
            } else {
                error4.innerHTML = "";
                error4.classList.remove("alert");
                error4.classList.remove("alert-danger");
            }

            if (error == 0) {
                message = "";
                document.getElementById('MyForm').submit();
                return true;
            } else {
                return false;
            }
        }
    </script> --}}
@endsection
