<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Despesas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.5/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.5/css/dataTables.bootstrap5.css">
  </head>
  <body>
    <main class="container">
        <h1>Despesas</h1>
        <a class="btn btn-primary" href="/despesa/inserir">Cadastrar nova despesa</a>

        <!-- Exibe a mensagem do retorno após a inserção, alteração ou exclusão-->
        <p>
        <?= $mensagem ?>
        </p>

        <table id="tabela" class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Descrição</th>
                    <th>Data</th>
                    <th>Valor</th>
                    <th>Opções</th>
                </tr>
            </thead>

            <tbody>
                <?php
                    // Loop para preencher a tabela com os dados das despesas
                    while($d = $resultado->fetch(PDO::FETCH_ASSOC)){
                ?>
                <tr>
                    <td><?= $d['id'] ?></td>
                    <td><?= $d['descricao'] ?></td>
                    <td><?= $d['data'] ?></td>
                    <td><?= $d['valor'] ?></td>
                    <td>
                        <a href="/despesa/alterar/id/<?= $d['id'] ?>" class="btn btn-warning">Alterar</a>
                        <a href="/despesa/excluir/id/<?= $d['id'] ?>" class="btn btn-danger">Excluir</a>
                    </td>
                </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
    </main>

    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.0.5/js/dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.5/js/dataTables.bootstrap5.min.js"></script>
    <script>
    var table = new DataTable('#tabela', {
        language: {
            url: 'https://cdn.datatables.net/plug-ins/2.0.6/i18n/pt-BR.json',
        },
    });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
