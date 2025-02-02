<?php include 'header.php'; ?>
<?php include 'db.php'; ?>

<div class="container">
    <h2>Filmes Cadastrados</h2>
    <table>
        <tr>
            <th>Título</th>
            <th>Descrição</th>
            <th>Ano</th>
            <th>Preço</th>
            <th>Disponível</th>
            <th>Ações</th>
        </tr>
        <?php
        $sql = "SELECT * FROM filmes";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['titulo'] . "</td>";
                echo "<td>" . $row['descricao'] . "</td>";
                echo "<td>" . $row['ano'] . "</td>";
                echo "<td>" . $row['preco'] . "</td>";
                echo "<td>" . ($row['disponivel'] ? 'Sim' : 'Não') . "</td>";
                echo "<td><a href='update.php?id=" . $row['id'] . "'>Editar</a> | <a href='delete.php?id=" . $row['id'] . "'>Excluir</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>Nenhum filme encontrado</td></tr>";
        }
        ?>
    </table>
</div>

<?php $conn->close(); ?>
</body>
</html>
