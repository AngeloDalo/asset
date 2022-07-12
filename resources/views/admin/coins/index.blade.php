@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row row-title-index">
            <h1 class="fw-bold">Mie Monete</h1>
        </div>
        <!--message delate-->
        <div class="row">
            <div class="col">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col">
                <table class="table border border-danger text-center">
                    <thead>
                        <tr class="table-danger">
                            <th>Codice</th>
                            <th>Ammontare</th>
                            <th>Prezzo Singolo</th>
                            <th>Totale</th>
                            <th>Apy</th>
                            <th>Guadagno G</th>
                            <th>Guadagno M</th>
                            <th>Guadagno A</th>
                            <th>%</th>
                            <th>View</th>
                            <th>Edit</th>
                            <th>Delate</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($coins as $coin)
                            <tr>
                                <td>{{ $coins->codice }}</td>
                                <td>{{ $coins->ammontare }}</td>
                                <td>{{ $coins->prezzo_singolo }}&dollar;;</td>
                                <td>TBA</td>
                                <td>{{ $coins->apy }}</td>
                                <td>TBA</td>
                                <td>TBA</td>
                                <td>TBA</td>
                                <td>TBA</td>
                                <td><a class="btn btn-danger text-white"
                                        href="{{ route('admin.coins.show', $coin->codice) }}">Vedi</a></td>
                                <td>
                                    <a class="btn btn-danger text-white"
                                        href="{{ route('admin.coins.edit', $coin->codice) }}">Modifica</a>
                                </td>
                                <td>TBA</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
