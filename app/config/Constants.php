<?php

#Caminhos Absolutos
define('URL_BASE', "mvc/");

# Caminho da URL Absoluto
define('DIR_PAGE', "http://{$_SERVER['HTTP_HOST']}/".URL_BASE);

#Caminho fixo absoluto
(substr($_SERVER['DOCUMENT_ROOT'],-1) == '/') ? $barra="" : $barra="/";
define('DIR_REQ', "{$_SERVER['DOCUMENT_ROOT']}{$barra}" . URL_BASE);