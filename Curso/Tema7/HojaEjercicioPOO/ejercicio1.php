<!-- EJERCICIO 1
Confeccionar una clase Tabla que permita indicarle en el constructor la cantidad de filas y columnas.
Definir otro método que permita cargar un dato en una determinada fila y columna además de definir su
color de fuente y fondo. Finalmente debe mostrar los datos en una tabla HTML. -->
<html>

<head>
    <title>Pruebas</title>
</head>

<body>
    <?php
    class Tabla
    {
        private $mat = array();
        private $cantFilas;
        private $cantColumnas;
        private $colorFuente = array();
        private $colorFondo = array();
        public function __construct($fi, $co)
        {
            $this->cantFilas = $fi;
            $this->cantColumnas = $co;
        }

        public function cargar($fila, $columna, $valor, $color, $fondo)
        {

            $this->mat[$fila][$columna] = $valor;
            $this->colorFuente[$fila][$columna] = $color;
            $this->colorFondo[$fila][$columna] = $fondo;
        }

        private function inicioTabla()
        {
            echo '<table border="1">';
        }

        private function inicioFila()
        {
            echo '<tr>';
        }

        private function mostrar($fila, $columna)
        {
            echo '<td style="background-color:' . $this->colorFuente[$fila][$columna] . '; color:' . $this->colorFondo[$fila][$columna] . '"> ' . $this->mat[$fila][$columna] . '</td>';
        }

        private function finFila()
        {
            echo '</tr>';
        }

        private function finTabla()
        {
            echo '</table>';
        }

        public function graficar()
        {
            $this->inicioTabla();
            for ($f = 1; $f <= $this->cantFilas; $f++) {
                $this->inicioFila();
                for ($c = 1; $c <= $this->cantColumnas; $c++) {
                    $this->mostrar($f, $c);
                }
                $this->finFila();
            }
            $this->finTabla();
        }
    }

    $tabla1 = new Tabla(2, 3);
    $tabla1->cargar(1, 1, "1", "red", "yellow");
    $tabla1->cargar(1, 2, "2", "blue", "green");
    $tabla1->cargar(1, 3, "3", "red", "white");
    $tabla1->cargar(2, 1, "4", "pink", "orange");
    $tabla1->cargar(2, 2, "5", "purple", "brown");
    $tabla1->cargar(2, 3, "6", "grey", "black");
    // echo "<pre>";
    // print_r($tabla1);
    // echo "<pre>";
    $tabla1->graficar();
    ?>
</body>

</html>