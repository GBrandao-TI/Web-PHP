<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Alterar Despesa</title>
  </head>
  <body>
    <main class="container">
        <h3>Alterar Despesa</h3>
    
        <form action="/despesa/editar" method="POST">
            <!-- Campo oculto para o ID da despesa -->
            <input type="hidden" name="id" value="<?= $resultado["id"]?>"/>
            <div class="row">
                <div class="col-6">
                    <label for="descricao" class="form-label">Descrição</label>
                    <input type="text" class="form-control" name="descricao" placeholder="Descrição" value="<?= $resultado["descricao"]?>">
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <label for="data" class="form-label">Data</label>
                    <input type="date" class="form-control" name="data" placeholder="Data" value="<?= $resultado["data"]?>">
                </div>
            </div>
            <div class="row">
                <div class="col-3">
                    <label for="valor" class="form-label">Valor</label>
                    <input type="number" step="0.01" class="form-control" name="valor" placeholder="Valor" value="<?= $resultado["valor"]?>">
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Enviar</button>
        </form>

        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </main>
  </body>
</html>
