<?php
/**
 * Valida o formato de um e-mail.
 * Retorna true se válido, false caso contrário.
 */
function validarEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

/**
 * Remove espaços desnecessários no início e no fim do texto.
 */
function limparTexto($texto) {
    return trim($texto);
}
