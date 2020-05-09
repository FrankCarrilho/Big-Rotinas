<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="shortcut icon" href="<?php echo base_url('resources/img/form.ico');?>">
    <link rel="stylesheet" href="<?php echo base_url('/resources/css/style.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('/resources/css/iziToast.css'); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title><?php echo(isset($titulo) ? $titulo : null); ?></title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!--
    Desenvolvido por: Frank Carrilho
    Manaus, 2019.

    "Realmente, de que adianta o homem ganhar o mundo inteiro e perder a sua vida?" Marcos 8:36
    -->
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-dark-big ">
    <div class="container">
        <a class="navbar-brand order-md-last" href="<?php echo base_url(); ?>">
            <img src="<?php echo base_url('/resources/img/logobig.png'); ?>" width="120" alt="Logomarca">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado"
                aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
            <span class="fa fa-bars icon-menu"></span>
        </button>

        <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
            <ul class="navbar-nav mr-auto text-center text-md-left">
                <li class="nav-item">
                    <a class="nav-link rounded" href="<?php echo base_url(); ?>"><span class="fa fa-home"></span>
                        HOME</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link rounded" href="<?php echo base_url('/ListarController'); ?>"><span
                                class="fa fa-list"></span> LISTAR</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link rounded" data-toggle="modal" data-target="#aboutModal" href="#"><span
                                class="fa fa-exclamation-circle"></span> SOBRE</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
 
