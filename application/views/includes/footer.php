<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="modal fade" id="aboutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Desenvolvedor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <div>
                    <img src="<?php echo base_url('/resources/img/eu.png'); ?>" alt="Frank Carrilho" class="rounded"
                         width="100">
                </div>
                <h3>Frank Carrilho
                    <small>BRA</small>
                </h3>
                <span class="label label-green">Técnico de Informática</span><br>
                <span class="label label-success">Bacharel em Ciência da Computação</span>
                <hr/>
                <p class="text-justify"><strong>Sobre o Sistema: </strong><br>
                    O Sistema apresentado tem como objetivo, colher informações das rotinas utilizadas
                    pelos usuários do sistema Winthor, afim de criar perfis padrões para cada setor.</p>
                <br>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success btn-sm" data-dismiss="modal">Fechar apresentação</button>
            </div>
        </div>
    </div>
</div>


<footer class="mt-5 footer text-center">
    <p>
        &copy; Big Amigão <?php echo date('Y'); ?> - Todos os direitos reservados.<br>
        Desenvolvido por: <b>Frank Carrilho.</b>
    </p>
</footer>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js"></script>
<script src="<?php echo base_url('/resources/js/iziToast.min.js'); ?>"></script>
<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<?php if (isset($_SESSION['msg'])):
    $msg = $_SESSION['msg'];
    ?>
    <script>
        $(document).ready(function () {
            <?php  if ($msg['type'] == 'error') {
            echo " iziToast.error({
                title: 'Erro',
                message:'" . trim(strip_tags($msg['text'])) . "'
            });";
        } else {
            echo " iziToast.success({
                title: 'Succeso',
                message:'" . trim(strip_tags($msg['text'])) . "'
            });";
        }?>
        });
    </script>
<?php endif; ?>
</body>
</html>