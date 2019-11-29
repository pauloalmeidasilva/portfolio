
<!-- MENU LATERAL - FIM -->
<section class="col-sm-10 offset-sm-2">
    <div class="card p-5 mx-1 shadow" style="margin-top: 70px;">
        <h3>Conhecimentos</h3>

        <div class="text-right">
            <button type="button" id="btn-novo" class="btn btn-success" data-toggle="modal" data-target="#modal-cad">Novo Conhecimento</button>
        </div>

        <form class="mt-3">
            <fieldset>
                <legend>Filtros</legend>
                <div class="form-group">
                    <label for="filtro">Por Nome</label>
                    <input type="text" class="form-control" id="filtro" name="filtro">
                </div>
            </fieldset>                        
        </form>

        <div class="table-responsive mt-3">
            <table id="conteudo" class="table table-bordered table-striped">
                <thead class="text-center">
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Experiência (anos)</th>
                        <th>Experiência (%)</th>
                    </tr>
                </thead>
                <tfoot class="text-center">
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Experiência (anos)</th>
                        <th>Experiência (%)</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</section>

<!-- Modal ADD e EDIT -->
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
                    <input type="hidden" id="pessoa_id" name="pessoa_id" value="<?=$this->session->userdata('Dados')['id']?>">
                    <div class="form-group">
                        <label for="nome_linguagem">Nome</label>
                        <input type="text" id="nome_linguagem" name="nome_linguagem" class="form-control">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm-6">
                            <label for="tempo_experiencia">Tempo de experiência</label>
                            <input type="text" id="tempo_experiencia" name="tempo_experiencia" class="form-control">
                        </div>
                        <div class="form-group col-sm-5">
                            <label for="porcentagem_experiencia">Grau de Experiência</label>
                            <input type="range" id="porcentagem_experiencia" name="porcentagem_experiencia" class="form-control-range" min="0" max="100" value="25">
                        </div>
                        <div class="form-group col-sm-1 pt-4">
                            <span id="valor"></span>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btn-cad" class="btn btn-primary">Salvar mudanças</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal DELETE -->
<div class="modal fade" id="modal-del" tabindex="-1" role="dialog" aria-labelledby="modal-del-label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="modal-del-label">Deletar Curso</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5>Código da Curso: </h5><h5 id="id-del"></h5>
                <h5>Nome da Curso: </h5><h5 id="nome-del"></h5>
                <p>Deseja Realmente deletar este curso?</p>

            </div>
            <div class="modal-footer">
                <button type="button" id="btn-del" class="btn btn-danger">Salvar mudanças</button>
            </div>
        </div>
    </div>
</div>
</div>
</div>