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
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
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
