<?php

$nota = $_POST['Notas'];


switch ($nota) {

    case 0:

        echo "SUSPENSO";

        break;

    case 1:

        echo "SUSPENSO";

        break;
    case 2:

        echo "SUSPENSO";

        break;
    case 3:

        echo "SUSPENSO";

        break;
    case 4:

        echo "SUSPENSO";

        break;
    case 5:

        echo "APROBADO";

        break;
    case 6:

        echo "APROBADO";

        break;
    case 7:

        echo "NOTABLE";

        break;
    case 8:

        echo "NOTABLE";

        break;
    case 9:

        echo "SOBRESALIENTE";

        break;
    case 10:

        echo "SOBRESALIENTE";

        break;

    default:
        print "Valor incorrecto";
}

?>