
<!-- MENU LATERAL - FIM -->
<section class="col-sm-10 offset-sm-2">
    <div class="card p-3 mx-1 shadow" style="margin-top: 70px;">
        <h3>Experiência Profissional</h3>

        <div class="text-right">
            <button type="button" id="btn-novo" class="btn btn-success" data-toggle="modal" data-target="#modal-cad">Novo Trabalho</button>
        </div>

        <form id="form-pesquisa" class="mt-3 mx-5">
            <fieldset>
                <legend>Filtros</legend>
                <div class="form-group">
                    <label for="search-curso">Pesquisa</label>
                    <input type="text" class="form-control" id="search-exp" name="search-curso">
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="campo" id="campo1" value="nome_profissao" checked>
                    <label class="form-check-label" for="campo1">Pela Profissão</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="campo" id="campo2" value="local">
                    <label class="form-check-label" for="campo2">Por local</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="campo" id="campo3" value="ano_inicio">
                    <label class="form-check-label" for="campo3">Por ano de Início</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="campo" id="campo4" value="ano_fim">
                    <label class="form-check-label" for="campo4">Por ano de Término</label>
                </div>
            </fieldset>                        
        </form>

        <h5 id="formacao-aviso" class="text-center"></h5>

        <div id="conteudo" class="container mt-3">
            <!-- Tabela ou aviso -->
        </div>
    </div>
</section>

<!-- Modal ADD e EDIT -->
<div class="modal fade" id="modal-cad" tabindex="-1" role="dialog" aria-labelledby="modal-cad-label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="modal-cad-label"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-novo">
                    <input type="hidden" id="id" name="id">
                    <input type="hidden" id="pessoa_id" name="pessoa_id" value="<?=$this->session->userdata('Dados')['id']?>">
                    <div class="form-group">
                        <label for="nome_curso">Nome do Curso</label>
                        <input type="text" id="nome_curso" name="nome_curso" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="local">Nome da Instituição</label>
                        <input type="text" id="local" name="local" class="form-control">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm-6">
                            <label for="ano_inicio">Ano do Início</label>
                            <input type="text" id="ano_inicio" name="ano_inicio" class="form-control">
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="ano_fim">Grau de Experiência</label>
                            <input type="text" id="ano_fim" name="ano_fim" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                            <label for="descricao">Descricao</label>
                            <textarea class="form-control" id="descricao" name="descricao" rows="3"></textarea>
                        </div>
                
            </div>
            <div class="modal-footer">
                <button type="submit" id="btn-cad" class="btn btn-primary">Salvar mudanças</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal DELETE -->
<div class="modal fade" id="modal-del" tabindex="-1" role="dialog" aria-labelledby="modal-del-label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="modal-del-label">Deletar Formação</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5>Código da Formação: </h5><h5 id="id-del"></h5>
                <h5>Nome da Formação: </h5><h5 id="nome-del"></h5>
                <p>Deseja Realmente deletar esta formação acadêmica?</p>

            </div>
            <div class="modal-footer">
                <button type="button" id="btn-del" class="btn btn-danger">Deletar</button>
            </div>
        </div>
    </div>
</div>
</div>
</div>