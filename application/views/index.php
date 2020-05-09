<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('includes/header'); //Carregando o conteúdo da view header.php
$model = isset($infoFormRotina) ? $infoFormRotina : null;
$formAction = $model ? base_url('RotinasController/update/' . $model->id) : base_url('RotinasController/store');
?>
    <div class="container mt-3">
        <div class="row">
            <div class="bg-light col-md-12">
                <h4 class="pt-3">Cadastrar Usuários</h4>
                <form action="<?php echo $formAction; ?>" method="post" accept-charset="utf-8">
                    <div class="row">
                        <div class="col-md-2">
                            <label>Código</label>
                            <input type="text" value="<?php echo(isset($model->codigo) ? $model->codigo : null); ?>"
                                   name="codigo" id="codigo"
                                   maxlength="4" class="form-control"
                                   title="Digite seu código de usuário do Winthor" required=""/>
                        </div>

                        <div class="col-md-4">
                            <label>Nome</label>
                            <input type="text" name="nome" class="form-control"
                                   value="<?php echo(isset($model->nome) ? $model->nome : null); ?>" required="" title="Digite seu Nome"/>
                        </div>

                        <div class="col-md-3">
                            <label>Cargo</label>
                            <select name="perfil" class="form-control">
                                <?php
                                foreach ($perfis as $key => $perfil) {
                                    echo "<option value='$key' " . ($key == $model->perfil ? 'selected' : null) . ">$perfil</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <div class="col-md-3">
                            <label>Setor</label>
                            <select name="setor" class="form-control">
                                <?php
                                foreach ($setores as $key => $setor) {
                                    echo "<option value='$key' " . ($key == $model->setor ? 'selected' : null) . ">$setor</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <div class="col-md-12">
                            <label>Rotinas</label>
                            <select name="rotinas[]" id="rotinas" class="form-control" multiple>
                                <?php
                                $rotinas = isset($model->rotinas) ? explode(',', $model->rotinas) : null;
                                foreach ($listaRotinas as $rotina) {
                                    echo "<option value='{$rotina->codigo}' " . ($rotinas && in_array($rotina->codigo, $rotinas) ? 'selected' : null) . ">{$rotina->codigo} - {$rotina->descricao}</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <div class="form-group mt-2 text-right col-md-12">
                            <button class="btn btn-danger btn-lg" type="submit">Salvar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script type="text/javascript">
        document.getElementById('codigo').onkeypress = function (e) {
            e = e || window.event;
            var charCode = (typeof e.which == "undefined") ? e.keyCode : e.which;
            var charStr = String.fromCharCode(charCode);
            var reg = /^\d+$/;
            if (!reg.test(charStr)) {
                return false;
            }
        };

        $(document).ready(function () {
            $('#rotinas').select2({
                tags: true,
                multiple: true,
                placeholder: "Digite as rotinas utilizadas por você",
                tokenSeparators: [",", " ", ";"],
            });
        });
    </script>
<?php
$this->load->view('includes/footer'); //Carregando o conteúdo da view footer.php
?>