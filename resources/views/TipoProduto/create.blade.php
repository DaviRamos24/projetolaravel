<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Create de Tipo Produto</title>
</head>
<body>
    <div class="container">
        <form method="post" action="/tipoproduto">
            @csrf
            <div class="form-group">
              <label for="id-input-id">ID</label>
              <input type="text" class="form-control" id="id-input-id" aria-describedby="id-help" placeholder="#" disabled>
              <small id="id-help" class="form-text text-muted">Não é necessário informar o ID durante a criação</small>
            </div>
            <div class="form-group">
              <label for="id-input-nome">Descrição</label>
              <input type="text" name="descricao" class="form-control" id="id-input-nome" placeholder="Digite o nome do recurso">
            </div>
            <div class="form-group h2">
                <a href="/tipoproduto" class="btn btn-primary">Voltar</a>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
          </form>
    </div>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>