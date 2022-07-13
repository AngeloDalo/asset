@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row row-title-index m-2">
            <h1 class="fw-bold">Mie Monete</h1>
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
                <table class="table border border-success text-center">
                    <thead>
                        <tr class="table-success">
                            <th>#</th>
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
                                <td><img class="w-100 h-50 rounded-3" src="{{ asset('storage/' . $coin->immagine) }}"
                                        alt="{{ $coin->codice }}"></td>
                                <td>{{ $coin->codice }}</td>
                                <td>{{ $coin->ammontare }}</td>
                                <td>{{ $coin->prezzo_singolo }}&dollar;</td>
                                <?php
                                $totale = $coin->ammontare * $coin->prezzo_singolo;
                                echo '<td>' . $totale . '$</td>';
                                ?>
                                <td>{{ $coin->apy }}%</td>
                                <?php
                                $totale = $coin->ammontare * $coin->prezzo_singolo;
                                $guadagno_annuale = (($totale/100)*$coin->apy);
                                $guadagno_mensile = $guadagno_annuale/12;
                                $guadagno_giornaliero = $guadagno_annuale/365;
                                echo "<td>" . round($guadagno_giornaliero, 2) . "$</td>";
                                echo "<td>" . round($guadagno_mensile, 2) . "$</td>";
                                echo "<td>" . round($guadagno_annuale, 2) . "$</td>";
                                ?>
                                <td>TBA</td>
                                <td><a class="btn btn-danger text-white"
                                        href="{{ route('admin.coins.show', $coin->id) }}">Vedi</a></td>
                                <td>
                                    <a class="btn btn-danger text-white"
                                        href="{{ route('admin.coins.edit', $coin->id) }}">Modifica</a>
                                </td>
                                <td>
                                    <form action="{{ route('admin.coins.destroy', $coin) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <input class="btn btn-danger text-white" type="submit" value="Elimina">
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
