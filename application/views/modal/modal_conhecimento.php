<div class="modal fade" id="modal-cad" tabindex="-1" role="dialog" aria-labelledby="modal-cad-label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="modal-cad-label">Novo Conhecimento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-novo">
                    <input type="hidden" id="id" name="id">
                    <input type="hidden" id="id_pessoa" name="id_pessoa" value="<?=$this->session->userdata('Dados')['id']?>">
                    <div class="form-group">
                        <label for="nome_linguagem">Nome</label>
                        <input type="text" id="nome_linguagem" name="nome_linguagem" class="form-control" maxlength="100">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm-6">
                            <label for="tempo_experiencia">Tempo de experiência</label>
                            <input type="number" id="tempo_experiencia" name="tempo_experiencia" class="form-control" min="0" max="99">
                        </div>
                        <div class="form-group col-sm-5">
                            <label for="porcentagem_experiencia">Grau de Experiência</label>
                            <input type="range" id="porcentagem_experiencia" name="porcentagem_experiencia" class="custom-range" min="0" max="100" step="5" value="25">
                        </div>
                        <div class="form-group col-sm-1 pt-4">
                            <span id="valor"></span>
                        </div>
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
        </div>
    </div>
</div>