@extends('templates.default')

@section('title', 'Sistema MCV/MVT')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center">Bem vindo {{ $nome }}</h1>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Email</th>
                <th scope="col">Ações</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($users as $u)
                    <tr>
                        <th scope="row">{{ $u->id }}</th>
                        <td>{{ $u->name }}</td>
                        <td>{{ $u->email }}</td>
                        <td>
                            <button type="button" class="btn btn-primary btn-sm">Editar</button>
                            <button type="button" class="btn btn-danger btn-sm">Deletar</button>
                        </td>
                    </tr>
                @endforeach
              
            </tbody>
        </table>
    </div>
@endsection