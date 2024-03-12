<?php

    include 'conexion.php';

    $buscarTexto = $_POST['buscadorvoz'];

    $query = 'SELECT * FROM postres WHERE nombre like "%' . $buscarTexto . '%" or precio like "%' . $buscarTexto . '%" or created_at like "%' . $buscarTexto . '%"';

    $resultados = mysqli_query($mysqli, $query);

    $html = '';
    if (mysqli_num_rows($resultados) > 0)
    {
        while ($row = mysqli_fetch_array($resultados))
        {
            $id = $row['id'];
            $nombre = $row['nombre'];
            $precio = $row['precio'];
            $stock = $row['stock'];
            $archivo = $row['archivo'];
            $created_at = $row['created_at'];

            $html .= '<div class="card" id="datos' . $id . '">';
            $html .= '<div class="card-header">Nombre: Manzana.' . $nombre . '"</div>';
            $html .= '<h3>Precio: ' . $precio . '</h3>';
            $html .= '<p>Stock: ' . $stock . '</p>';
            $html .= '<p>Archivo: ' . $archivo . '</p>';
            $html .= '<p>Fecha de Creación: ' . $created_at . '</p>';
            $html .= '</div>';
        }
    }
    else
    {
        $html .= '<div >';
        $html .= '<h2>No se encontraron registros</h2>';
        $html .= '</div><br>';
    }

    echo $html;

    exit;

