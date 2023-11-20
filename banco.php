<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banco de dados</title>
    <style>
        body {
            background-color: #fff; 
            color: #000; 
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        table {
            border: 1px solid #000; 
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table td, table th {
            border: 1px solid #000; 
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #fa8072; 
        }

        tr:nth-child(even) {
            background-color: #faebd7; 
        }

        a {
            color: #000; 
        }

        a:hover {
            color: #fa8072; 
        }

        h1 {
            color: #fa8072; 
        }
    </style>
</head>
<body>
    <?php
    include("connection.php");
    
    $sql    = "SELECT * FROM usuario";
    $result = $conn->query($sql);
    ?>
    <h1>Banco de dados</h1>
    <p>Número de registros: <?php echo $result->num_rows?></p>
    <a href="usu_cad.php">+ Adicionar registro</a><br><br>
    <table>
        <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>Cpf</th>
            <th>Email</th>
            <th>Data de nascimento</th>
            <th>Sexo</th>
            <th>Altura</th>
            <th>Data de diagnóstico</th>
            <th>Medicamentos</th>
            <th>Nivel de açucar no sangue</th>
            <th>Histórico médico</th>
            <th>Pressão arterial</th>
            <th>Alergias</th>
            <th>Tipo de diabetes</th>
            <th colspan="2">Ações</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
        ?>
        <tr>
            <td><a href="usuarios.php?id=<?php echo $row["id"]?>"><?php echo $row["id"]?></a></td>
            <td><?php echo $row["nome"]?></td>
            <td><?php echo $row["cpf"]?></td>
            <td><?php echo $row["email"]?></td>
            <td><?php echo $row["data_nascimento"]?></td>
            <td><?php echo $row["sexo"]?></td>
            <td><?php echo $row["altura"]?></td>
            <td><?php echo $row["data_diagnostico"]?></td>
            <td><?php echo $row["medicamentos"]?></td>
            <td><?php echo $row["nivel_acucar_sangue"]?></td>
            <td><?php echo $row["historico_medico"]?></td>
            <td><?php echo $row["pressao_arterial"]?></td>
            <td><?php echo $row["alergias"]?></td>
            <td><?php echo $row["tipo_diabetes"]?></td>
            <td><a href="usu_edit.php?id=<?php echo $row["id"]?>">Editar</a></td>
            <td><a href="usu_excluir.php?id=<?php echo $row["id"]?>">Excluir</a></td>
        </tr>
        <?php
            }
        } else {
        ?>
        <tr>
            <td colspan="15">Não há registros nesta tabela a exibir</td>
        </tr>
        <?php
        }
        ?>
    </table>
</body>
</html>
