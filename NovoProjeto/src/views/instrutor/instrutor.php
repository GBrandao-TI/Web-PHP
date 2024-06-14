<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Instrutores</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.5/css/dataTables.bootstrap5.min.css">
  </head>
  <body>

    <main class="container">
        <h1>Instrutores</h1>
        <a class="btn btn-primary" href="/instrutor/inserir">Cadastrar novo instrutor</a>

        <!-- Exibe a mensagem do retorno após a inserção, alteração ou exclusão-->
        <p>
        <?= $mensagem ?>
        </p>

        <table id="tabela" class="table table-striped table-hover">
            <thead>
                <th>
                    Id
                </th>
                <th>
                    Nome
                </th>
                <th>
                    Celular
                </th>
                <th>
                    CNH
                </th>
                <th>
                    Opções
                </th>
            </thead>
            <tbody>
                <?php while($instrutor = $resultado->fetch(PDO::FETCH_ASSOC)): ?>
                    <tr>
                        <td><?= $instrutor['id'] ?></td>
                        <td><?= $instrutor['nome'] ?></td>
                        <td><?= $instrutor['celular'] ?></td>
                        <td><?= $instrutor['cnh'] ?></td>
                        <td>
                            <a href="/instrutor/alterar/id/<?= $instrutor['id'] ?>" class="btn btn-warning">Alterar</a>
                            <a href="/instrutor/excluir/id/<?= $instrutor['id'] ?>" class="btn btn-danger">Excluir</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </main>

    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.0.5/js/dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.5/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#tabela').DataTable({
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/2.0.6/i18n/pt-BR.json'
                }
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
