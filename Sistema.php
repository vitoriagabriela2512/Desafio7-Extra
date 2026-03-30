<?php

class Sistema {

    private $usuario;
    private $senha;
    private $tentativas;

    public function __construct($usuario, $senha) {
        $this->usuario = $usuario;
        $this->senha = $senha;
        $this->tentativas = 0;
    }

    // validarSenha
    public function validarSenha($senhaInformada) {

        if ($senhaInformada === $this->senha) {
            return true;
        } else {
            $this->tentativas++;
            return false;
        }
    }

    // verificarBloqueio
    public function verificarBloqueio() {
        if ($this->tentativas >= 3) {
            return "Conta Bloqueada";
        }
        return "";
    }

    // exibirStatus
    public function exibirStatus($usuarioInformado, $senhaInformada) {

        // verifica usuário
        if ($usuarioInformado !== $this->usuario) {
            echo "<strong>Usuário Não Encontrado</strong>";
            return;
        }

        // verifica bloqueio antes
        if ($this->verificarBloqueio() == "Conta Bloqueada") {
            echo "<strong>Conta Bloqueada</strong>";
            return;
        }

        // valida senha
        if ($this->validarSenha($senhaInformada)) {
            echo "<strong>Acesso Autorizado</strong>";
        } else {

            // verifica se bloqueou após erro
            if ($this->verificarBloqueio() == "Conta Bloqueada") {
                echo "<strong>Conta Bloqueada</strong>";
            } else {
                echo "<strong>Senha Incorreta</strong>";
            }
        }
    }
}