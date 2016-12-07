@extends('app')

@section('content')
<div class="container">
    <h1>Leads</h1>

    <table class="table table-striped table-bordered table-hover">
        <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Telefone</th>
            <th>Nascimento</th>
            <th>CEP</th>
            <th>Rua</th>
            <th>Bairro</th>
            <th>Cidade</th>
            <th>Estado</th>
        </tr>
        </thead>
        <tbody>
        @foreach($leads as $lead)
            <tr>
                <td>{{ $lead->id }}</td>
                <td>{{ $lead->nome }}</td>
                <td>{{ $lead->email }}</td>
                <td>{{ $lead->telefone }}</td>
                <td>{{ $lead->nascimento }}</td>
                <td>{{ $lead->cep }}</td>
                <td>{{ $lead->rua }}</td>
                <td>{{ $lead->bairro }}</td>
                <td>{{ $lead->cidade }}</td>
                <td>{{ $lead->estado }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection