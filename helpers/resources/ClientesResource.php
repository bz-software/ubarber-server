<?php

namespace app\helpers\resources;

use app\models\Clientes;

class ClientesResource extends Clientes{
    public function fields(){
        return [
            "cli_id",
            "cli_nome",
            "cli_telefone",
            "cli_email",
            "cli_avatar"
        ];
    }
}