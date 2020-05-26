<div class="modal fade" id="modal-trabalho" tabindex="-1" role="dialog" aria-labelledby="modal-trabalho-label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="modal-trabalho-label">Novo Trabalho</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-novo">
                    <input type="hidden" id="id" name="id">
                    <input type="hidden" id="id_pessoa" name="id_pessoa" value="<?=$this->session->userdata('Dados')['id']?>">
                    <div class="form-group">
                        <label for="cargo">Cargo</label>
                        <input type="text" id="cargo" name="cargo" class="form-control" maxlength="100">
                    </div>
                    <div class="form-group">
                        <label for="empresa">Nome da Empresa</label>
                        <input type="text" id="empresa" name="empresa" class="form-control" maxlength="100">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inicio">Ano de Início</label>
                            <input type="number" id="inicio" name="inicio" class="form-control" min="1950" max="<?=date('Y')?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="termino">Ano de Término</label>
                            <input type="number" id="termino" name="termino" class="form-control" min="1950" max="<?=date('Y')?>">
                        </div>
                    </div>
                    <div class="custom-control custom-checkbox mb-3">
                        <input type="checkbox" class="custom-control-input" name="atual" id="atual" value="1">
                        <label class="custom-control-label" for="atual">Ainda estou nesse emprego</label>
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
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btn-cad" class="btn btn-primary">Salvar mudanças</button>
            </div>
        </form>
    </div>
</div>
</div>