@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row row-title-index m-2">
            <h1 class="fw-bold">Mie Crypto:
            <?php
            global $totale_crypto;
            ?>
            @foreach ($coins as $coin)
                <?php
                $totale_crypto += ($coin->ammontare * $coin->prezzo_singolo);
                ?>
            @endforeach
            <?php
            echo ' ' . $totale_crypto . '$';
            ?>
            </h1>
        </div>
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
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr class="table-success">
                            <th scope="col">#</th>
                            <th scope="col">Codice</th>
                            <th scope="col">Ammontare</th>
                            <th scope="col">Prezzo Singolo</th>
                            <th scope="col">Totale</th>
                            <th scope="col">Apy</th>
                            <th scope="col">Guadagno G</th>
                            <th scope="col">Guadagno M</th>
                            <th scope="col">Guadagno A</th>
                            <th scope="col">%</th>
                            <th scope="col">Vedi</th>
                            <th scope="col">Modifica</th>
                            <th scope="col">Elimina</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($coins as $coin)
                            <tr>
                                <th scope="row"><img class="immagine-index"
                                        src="{{ asset('storage/' . $coin->immagine) }}" alt="{{ $coin->codice }}">
                                </th>
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
                                $guadagno_annuale = ($totale / 100) * $coin->apy;
                                $guadagno_mensile = $guadagno_annuale / 12;
                                $guadagno_giornaliero = $guadagno_annuale / 365;
                                echo '<td>' . round($guadagno_giornaliero, 2) . "$</td>";
                                echo '<td>' . round($guadagno_mensile, 2) . "$</td>";
                                echo '<td>' . round($guadagno_annuale, 2) . "$</td>";
                                ?>
                                <td>TBA</td>
                                <td><a class="btn btn-success text-white"
                                        href="{{ route('admin.coins.show', $coin->id) }}">Vedi</a></td>
                                <td>
                                    <a class="btn btn-success text-white"
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
    </div>
@endsection
