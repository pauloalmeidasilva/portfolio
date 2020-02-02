<div class="modal fade" id="modal-formacao" tabindex="-1" role="dialog" aria-labelledby="modal-cad-label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="modal-cad-label">Nova Formação</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-novo">
                    <input type="hidden" id="id" name="id">
                    <input type="hidden" id="id_pessoa" name="id_pessoa" value="<?=$this->session->userdata('Dados')['id']?>">
                    <div class="form-group">
                        <label for="nome">Nome do Curso</label>
                        <input type="text" id="nome" name="nome" class="form-control" maxlength="100">
                    </div>
                    <div class="form-group">
                        <label for="instituicao">Nome da Instituição</label>
                        <input type="text" id="instituicao" name="instituicao" class="form-control" maxlength="100">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm-6">
                            <label for="inicio">Ano de Início</label>
                            <input type="number" id="inicio" name="inicio" class="form-control" min="1900" max="<?=date('Y')?>">
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="termino">Ano de Término</label>
                            <input type="number" id="termino" name="termino" class="form-control" min="1900" max="<?=date('Y')?>">
                        </div>
                    
                    <div class="form-group col-sm-6">
                        <label for="escolaridade">Escolaridade</label>
                        <select id="escolaridade" name="escolaridade" class="form-control">
                            <option value="">--- Selecione ---</option>
                            <?php foreach (get_ensino() as $valor => $item):?>
                            <option value="<?=$valor?>"><?=$item?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="nivel">Nível</label>
                        <select id="nivel" name="nivel" class="form-control" disabled>
                            <option value="">--- Selecione ---</option>
                            <?php foreach (get_nivel() as $valor => $item):?>
                            <option value="<?=$valor?>"><?=$item?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                    </div>
                    <div class="form-group">
                        <label for="descricao">Descricao</label>
                        <textarea class="form-control" id="descricao" name="descricao" rows="3" maxlength="500"></textarea>
                        <div class="text-right" id="info">500 caracteres</div>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" name="mostrar_curriculo" id="mostrar_curriculo" value="1">
                        <label class="custom-control-label" for="mostrar_curriculo">Visível no Currículo</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="btn-cad" class="btn btn-primary">Salvar mudanças</button>
                </div>
            </form>
        </div>
    </div>
</div>