@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row row-title-index m-2">
            <h1 class="fw-bold">Mie Stocks:
                <?php
                global $totale_stocks;
                ?>
                @foreach ($stocks as $stock)
                    <?php
                    $totale_stocks += ($stock->ammontare * $stock->prezzo_singolo);
                    ?>
                @endforeach
                <?php
                echo ' ' . $totale_stocks . '$';
                ?>
                </h1>
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
                                <th scope="col">Nome</th>
                                <th scope="col">Ammontare</th>
                                <th scope="col">Prezzo Singolo</th>
                                <th scope="col">Totale</th>
                                <th scope="col">%</th>
                                <th scope="col">Vedi</th>
                                <th scope="col">Modifica</th>
                                <th scope="col">Elimina</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($stocks as $stock)
                                <tr>
                                    <th scope="row"><img class="immagine-index"
                                            src="{{ asset('storage/' . $stock->immagine) }}" alt="{{ $stock->codice }}">
                                    </th>
                                    <td>{{ $stock->codice }}</td>
                                    <td>{{ $stock->nome }}</td>
                                    <td>{{ $stock->ammontare }}</td>
                                    <td>{{ $stock->prezzo_singolo }}&dollar;</td>
                                    <?php
                                    $totale = $stock->ammontare * $stock->prezzo_singolo;
                                    echo '<td>' . $totale . '$</td>';
                                    ?>
                                    <td>TBA</td>
                                    <td><a class="btn btn-success text-white"
                                            href="{{ route('admin.stocks.show', $stock->id) }}">Vedi</a></td>
                                    <td>
                                        <a class="btn btn-success text-white"
                                            href="{{ route('admin.stocks.edit', $stock->id) }}">Modifica</a>
                                    </td>
                                    <td>
                                        <form action="{{ route('admin.stocks.destroy', $stock) }}" method="post">
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
