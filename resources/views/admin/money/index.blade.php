@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row row-title-index m-2">
            <h1 class="fw-bold">Mia Liquidit&agrave;</h1>
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
                                <th scope="col">Nome</th>
                                <th scope="col">Ammontare</th>
                                <th scope="col">%</th>
                                <th scope="col">Vedi</th>
                                <th scope="col">Modifica</th>
                                <th scope="col">Elimina</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($money as $s_money)
                                <tr>
                                    <th scope="row"><img class="immagine-index"
                                            src="{{ asset('storage/' . $s_money->immagine) }}" alt="{{ $s_money->nome }}">
                                    </th>
                                    <td>{{ $s_money->nome }}</td>
                                    <td>{{ $s_money->ammontare }}</td>
                                    <td>TBA</td>
                                    <td><a class="btn btn-success text-white"
                                            href="{{ route('admin.money.show', $s_money->id) }}">Vedi</a></td>
                                    <td>
                                        <a class="btn btn-success text-white"
                                            href="{{ route('admin.money.edit', $s_money->id) }}">Modifica</a>
                                    </td>
                                    <td>
                                        <form action="{{ route('admin.money.destroy', $s_money) }}" method="post">
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
