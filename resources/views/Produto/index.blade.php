<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSS only -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <title>Index de Produto</title>
</head>
<body>
    <div class="container">
        <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Nome</th>
                <th scope="col">Preço</th>
                <th scope="col">Tipo</th>
                <th scope="col">Ação</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($produtos_com_tipo as $produto_com_tipo)
                    <tr>
                        <th scope="row">{{$produto_com_tipo->id}}</th>
                        <td>{{$produto_com_tipo->nome}}</td>
                        <td>{{$produto_com_tipo->preco}}</td>
                        <td>{{$produto_com_tipo->descricao}}</td>
                        <td>
                            <!-- Button trigger modal -->
                            <form action="{{route('produto.destroy', $produto_com_tipo->id)}}" method="post">
                                <input name="_method" type="hidden" value="DELETE">
                                @csrf
                                <a href="{{route('produto.show', $produto_com_tipo->id)}}" class="btn btn-primary">Mostrar</a>
                                <a href="{{route('produto.edit', $produto_com_tipo->id)}}" class="btn btn-secondary">Alterar</a>
                                <button type="button" class="btn btn-danger destroyBtn" data-toggle="modal" data-target="#destroyModal" value="{{route('produto.destroy', $produto_com_tipo->id)}}">
                                    Remover
                                </button>
                                {{-- <input type="submit" class="btn btn-danger" value="Remover"> --}}
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="#" class="btn btn-primary">Voltar</a>
        <a href="{{route('produto.create')}}" class="btn btn-primary">Cadrastrar</a>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="destroyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Confirmar remoção</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
            Deseja remover este recurso?
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <form id="formRemocao" action="" method="post">
                <input name="_method" type="hidden" value="DELETE">
                @csrf
                <input type="submit" class="btn btn-danger" value="Remover">
            </form>
            </div>
        </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <script>
        // Crio um vetor com todos os elementos que contenham a classe destroyBtn
        var destroyButtons = document.querySelectorAll(".destroyBtn");
        // Selecionar o form de remoção
        var formRemocao = document.querySelector("#formRemocao");
        // Adicino um evento que quando os botões forem clicados, chama a função configuraModalRemocao
        destroyButtons.forEach(element => {
            element.addEventListener('click', configuraModalRemocao);
        });
        function configuraModalRemocao(){
            var value = this.getAttribute("value");
            formRemocao.setAttribute("action", value);
        }
    </script>
</body>
</html>