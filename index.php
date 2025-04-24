<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/styles.css">
    <script src="https://kit.fontawesome.com/81661c0d51.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="./img/utensils-solid.svg" type="image/x-icon">
    <title>CARTA</title>
</head>
<body>
    <?php
    if (file_exists('./xml/menu.xml')) {
        $menu = simplexml_load_file('./xml/menu.xml');
    } else {
        exit('No se ha encontrado el archivo XML');
    }

    // Características con íconos Font Awesome
    $iconos = [
        'vegano' => 'fa-solid fa-seedling',
        'vegetariano' => 'fa-solid fa-carrot',
        'carne' => 'fa-solid fa-drumstick-bite',
        'pescado' => 'fa-solid fa-fish',
        'marisco' => 'fa-solid fa-shrimp',
        'sin gluten' => 'fa-solid fa-ban',
        'gluten' => 'fa-solid fa-bread-slice',
        'lacteo' => 'fa-solid fa-cheese',
        'picante' => 'fa-solid fa-pepper-hot'
    ];
    ?>
    <h1 class="medio">MENU</h1>
    <div class="contenido">
        <div class="column-50">
            <h3 class="medio">ENTRANTES</h3>
            <table>
                <tbody>
                <?php
                foreach ($menu->plato as $plato) {
                    if ((string)$plato['tipo'] === 'entrante') {
                        echo '<tr>';
                        echo '<td>' . $plato->nombre . '</td>';
                        echo '<td>' . $plato->descripcion . '</td>';
                        echo '<td><span>' . $plato->precio . ' €</span></td>';
                        echo '<td><span>' . $plato->calorias . ' Kcal</span></td>';

                        echo '<td>';
                        foreach ($plato->caracteristicas->item as $item) {
                            $nombre = (string)$item;
                            if (isset($iconos[$nombre])) {
                                echo '<i class="' . $iconos[$nombre] . '" title="' . $nombre . '"></i> ';
                            }
                        }
                        echo '</td>';

                        echo '</tr>';
                    }
                }
                ?>
                </tbody>
            </table>
        </div>

        <div class="column-50">
            <h3 class="medio">PRINCIPALES</h3>
            <table>
                <tbody>
                <?php
                foreach ($menu->plato as $plato) {
                    if ((string)$plato['tipo'] === 'principal') {
                        echo '<tr>';
                        echo '<td>' . $plato->nombre . '</td>';
                        echo '<td>' . $plato->descripcion . '</td>';
                        echo '<td><span>' . $plato->precio . ' €</span></td>';
                        echo '<td><span>' . $plato->calorias . ' Kcal</span></td>';

                        echo '<td>';
                        foreach ($plato->caracteristicas->item as $item) {
                            $nombre = (string)$item;
                            if (isset($iconos[$nombre])) {
                                echo '<i class="' . $iconos[$nombre] . '" title="' . $nombre . '"></i> ';
                            }
                        }
                        echo '</td>';

                        echo '</tr>';
                    }
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="contenido">
        <div class="column-50">
            <h3 class="medio">POSTRES</h3>
            <table>
                <tbody>
                <?php
                foreach ($menu->plato as $plato) {
                    if ((string)$plato['tipo'] === 'postre') {
                        echo '<tr>';
                        echo '<td>' . $plato->nombre . '</td>';
                        echo '<td>' . $plato->descripcion . '</td>';
                        echo '<td><span>' . $plato->precio . ' €</span></td>';
                        echo '<td><span>' . $plato->calorias . ' Kcal</span></td>';

                        echo '<td>';
                        foreach ($plato->caracteristicas->item as $item) {
                            $nombre = (string)$item;
                            if (isset($iconos[$nombre])) {
                                echo '<i class="' . $iconos[$nombre] . '" title="' . $nombre . '"></i> ';
                            }
                        }
                        echo '</td>';

                        echo '</tr>';
                    }
                }
                ?>
                </tbody>
            </table>
        </div>

        <div class="column-50">
            <h3 class="medio">LEYENDA</h3>
            <table>
                <tbody>
                    <?php
                    $caracteristicasUnicas = [];

                    foreach ($menu->plato as $plato) {
                        foreach ($plato->caracteristicas->item as $item) {
                            $caract = (string)$item;
                            if (isset($iconos[$caract])) {
                                $caracteristicasUnicas[$caract] = $iconos[$caract];
                            }
                        }
                    }

                    foreach ($caracteristicasUnicas as $nombre => $icono) {
                        echo "<tr>";
                        echo '<td><i class="' . $icono . '" title="' . $nombre . '"></i></td>';
                        echo '<td><i class="fas fa-arrow-right"></i></td>';
                        echo "<td>" . ucwords($nombre) . "</td>"; // Hacer la primera letra de cada palabra mayúscula
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
