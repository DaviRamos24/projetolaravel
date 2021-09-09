<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Index de TipoProduto</title>
</head>
<body>
    <div class="container">
        <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Descrição</th>
                <th scope="col">Ação</th>
              </tr>
            </thead>
            <tbody>
                {{-- [ {1, Pizza}, {2, Suco}, {3, Cerveja}, ... ] --}}
                @foreach ($tipos as $tipo)
                    <tr>
                        <th scope="row">{{$tipo->id}}</th>
                        <td>{{$tipo->descricao}}</td>
                        <td>
                            <!-- Buffon trigger modal -->
                            <form actin="{{route('tipoproduto.destroy', $tipo->id)}}" method=""
                                <input name="_method" type="hidden" value="DELETE">
                                @csrf
                            <a href="{{route('tipoproduto.show', $tipo->id)}}" class="btn btn-primary">Mostrar</a>
                            <a href="{{route('tipoproduto.edit', $tipo->id)}}" class="btn btn-secondary">Alterar</a>
                            <button type ="button" class="btn btn-danger" data-toggle="modal" data-data-target="#exampleModal">
                              Remover
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="#" class="btn btn-primary">Voltar</a>
        <a href="{{route('tipoproduto.create')}}" class="btn btn-primary">Cadrastrar</a>
    </div>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>