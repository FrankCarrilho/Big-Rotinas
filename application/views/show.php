<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('includes/header'); //Carregando o conteúdo da view header.php
?>
    <div class="container mt-3">
        <div class="row">
            <div class="col-12 bg-light">
                <h4 class="pt-3">Listar Usuários</h4>

                <table class="table table-bordered text-center">
                    <tr>
                        <th>Código</th>
                        <th>Nome</th>
                        <th>Setor</th>
                        <th>Rotinas</th>
                        <th>Ação</th>
                    </tr>

                    <?php foreach ($resultados as $resultado) : ?>
                        <tr>
                            <td> <?php echo $resultado->codigo; ?> </td>
                            <td> <?php echo $resultado->nome; ?> </td>
                            <td> <?php echo $resultado->setor; ?> </td>
                            <td> <?php echo $resultado->rotinas; ?> </td>
                            <td>
                                <a href="<?php echo base_url('/RotinasController/edit/') . $resultado->id; ?>"
                                   class="bg-success btn btn-sm"><span class="fa fa-pencil"></span></a>
                                <a href="<?php echo base_url('/RotinasController/destroy/') . $resultado->id; ?>"
                                   class="bg-danger btn btn-sm"> <span class="fa fa-trash"></span></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>
<?php
$this->load->view('includes/footer'); //Carregando o conteúdo da view footer.php
?>