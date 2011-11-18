<?php

switch ($estatus) {
    case -1: {
            echo "estatus=REGISTRADO";
        } break;
    case 0: {

        } break;
    case 1: {
            echo "estatus=NUEVO_USUARIO&id_user=" . $id_applicant;
        }
}
?>
