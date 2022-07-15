@extends('layouts.admin')

@section('content')
    <div class="container">
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
        <div class="row row-title-index m-2">
            <h1 class="fw-bold">Miei Asset:
                <?php
                global $totale;
                ?>
                @foreach ($stocks as $stock)
                    <?php
                    $totale += $stock->ammontare * $stock->prezzo_singolo;
                    ?>
                @endforeach
                @foreach ($coins as $coin)
                    <?php
                    $totale += $coin->ammontare * $coin->prezzo_singolo;
                    ?>
                @endforeach
                @foreach ($money as $s_money)
                    <?php
                    $totale += $s_money->ammontare;
                    ?>
                @endforeach
                <?php
                echo ' ' . $totale . '$';
                ?>
            </h1>
            </h1>
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
                                <th scope="col">Asset</th>
                                <th scope="col">Ammontare</th>
                                <th scope="col">Prezzo Singolo</th>
                                <th scope="col">Totale</th>
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
                                </tr>
                            @endforeach
                            @foreach ($stocks as $stock)
                                <tr>
                                    <th scope="row"><img class="immagine-index"
                                            src="{{ asset('storage/' . $stock->immagine) }}"
                                            alt="{{ $stock->codice }}">
                                    </th>
                                    <td>{{ $stock->nome }}</td>
                                    <td>{{ $stock->ammontare }}</td>
                                    <td>{{ $stock->prezzo_singolo }}&dollar;</td>
                                    <?php
                                    $totale = $stock->ammontare * $stock->prezzo_singolo;
                                    echo '<td>' . $totale . '$</td>';
                                    ?>
                                </tr>
                            @endforeach
                            @foreach ($money as $s_money)
                                <tr>
                                    <th scope="row"><img class="immagine-index"
                                            src="{{ asset('storage/' . $s_money->immagine) }}"
                                            alt="{{ $s_money->nome }}">
                                    </th>
                                    <td>{{ $s_money->nome }}</td>
                                    <td>{{ $s_money->ammontare }}</td>
                                    <td>1</td>
                                    <td>{{ $s_money->ammontare }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
