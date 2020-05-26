<div class="modal fade" id="modal-cad" tabindex="-1" role="dialog" aria-labelledby="modal-cad-label" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="modal-cad-label">Novo Portfólio</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="form-novo" enctype="multipart/form-data">
          <input type="hidden" id="id" name="id">
          <input type="hidden" id="id_pessoa" name="id_pessoa" value="<?=$this->session->userdata('Dados')['id']?>">
          <div class="form-row">
            <div class="form-group col-md-4">
            <img class="img-thumbnail mx-auto d-block" id="img_1" src="<?=IMG.'upload/default.png'?>" height="100" style="cursor: pointer;">
            <input type="file" id="upload_1" name="imagem_1" hidden accept="image/*">
          </div>
          <div class="form-group col-md-4">
            <img class="img-thumbnail mx-auto d-block" id="img_2" src="<?=IMG.'upload/default.png'?>" height="100" style="cursor: pointer;">
            <input type="file" id="upload_2" name="imagem_2" hidden accept="image/*">
          </div>
          <div class="form-group col-md-4">
            <img class="img-thumbnail mx-auto d-block" id="img_3" src="<?=IMG.'upload/default.png'?>" height="100" style="cursor: pointer;">
            <input type="file" id="upload_3" name="imagem_3" hidden accept="image/*">
          </div>
        </div>
          <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" id="nome" name="nome" class="form-control" maxlength="100">
          </div>
          <div class="form-group">
            <label for="descricao">Descrição do Projeto</label>
            <textarea id="descricao" name="descricao" class="form-control" maxlength="100" rows="3"></textarea>
          </div>
          <div class="form-row">
            <div class="form-group col-sm-6">
              <label for="tipo">Tipo</label>
              <select id="tipo" name="tipo" class="form-control">
                <option value="0">---Selecione---</option>
              </select>
            </div>
            <div class="form-group col-sm-6">
              <label for="status">Status</label>
              <select id="status" name="status" class="form-control">
                <option value="0">---Selecione---</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="link_repositorio">Repositório</label>
            <input type="text" id="link_repositorio" name="link_repositorio" class="form-control" maxlength="100">
          </div>
          <div class="form-group">
            <label for="linguagem">Linguagem Utilizada</label>
            <input type="text" id="linguagem" name="linguagem" class="form-control" maxlength="100">
          </div>
          <div class="form-row">
            <div class="form-group col-sm-6">
              <label for="inicio">Início do Projeto</label>
              <input type="date" id="inicio" name="inicio" class="form-control">
            </div>
            <div class="form-group col-sm-6">
              <label for="termino">Termino do Projeto</label>
              <input type="date" id="termino" name="termino" class="form-control">
            </div>
          </div>
          <div class="custom-control custom-checkbox custom-control-inline">
            <input type="checkbox" class="custom-control-input" name="mostrar_curriculo" id="mostrar_curriculo" value="1">
            <label class="custom-control-label" for="mostrar_curriculo">Visível no Currículo</label>
          </div>
          <div class="custom-control custom-checkbox custom-control-inline">
            <input type="checkbox" class="custom-control-input" name="mostrar_link" id="mostrar_link" value="1">
            <label class="custom-control-label" for="mostrar_link">Mostrar Repositório</label>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" id="btn-cad" class="btn btn-primary">Salvar mudanças</button>
      </div>
    </div>
  </div>
</div>