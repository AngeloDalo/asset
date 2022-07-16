@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row row-title-index m-2">
            <h1 class="fw-bold">Mie Transazioni: </h1>
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
                            <th scope="col">Data</th>
                            <th scope="col">Ammontare</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Totale</th>
                            <th scope="col">Modifica</th>
                            <th scope="col">Elimina</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transactions as $transaction)
                            <tr>
                                <th scope="row">
                                    {{ $transaction->id }}
                                </th>
                                <td>{{ $transaction->data}}</td>
                                <td>{{ $transaction->ammontare }}</td>
                                <td>{{ $transaction->nome }}</td>
                                <td>{{ $transaction->totale }}$</td>
                                <td>
                                    <a class="btn btn-success text-white"
                                        href="{{ route('admin.transactions.edit', $transaction->id) }}">Modifica</a>
                                </td>
                                <td>
                                    <form action="{{ route('admin.transactions.destroy', $transaction) }}" method="post">
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
