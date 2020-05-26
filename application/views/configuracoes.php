<section class="container-fluid margem offset">
  <div class="card shadow">
    <div class="card-header">
      <h3>Configurações</h3>
    </div>
    <div class="card-body">
      <!-- Nav tabs -->
      <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
          <a class="nav-link text-dark" id="tipo-projeto-tab" data-toggle="tab" href="#tipo-projeto" role="tab" aria-controls="tipo-projeto" aria-selected="true">Tipos de Projetos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark active" id="status-projeto-tab" data-toggle="tab" href="#status-projeto" role="tab" aria-controls="status-projeto" aria-selected="false">Status de Projetos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark" id="status-projeto-tab" data-toggle="tab" href="#status-projeto" role="tab" aria-controls="status-projeto" aria-selected="false">Escolaridade</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark" id="status-projeto-tab" data-toggle="tab" href="#status-projeto" role="tab" aria-controls="status-projeto" aria-selected="false">Subgrupo Escolaridade</a>
        </li>
      </ul>

      <!-- Tab panes -->
      <div class="tab-content">
        <div class="tab-pane border-left border-right border-bottom p-3" id="tipo-projeto" role="tabpanel" aria-labelledby="tipo-projeto-tab">
          <form id="form-tipo">
            <input type="hidden" name="id" id="id-tipo">
            <div class="form-row">
              <div class="form-group col-md-10">
                <label for="descricao-tipo">Descrição</label>
                <input type="text" class="form-control" name="descricao" id="descricao-tipo">
              </div>
              <div class="form-group col-md-2">
                <label for="status-tipo">Status</label>
                <select class="form-control" name="status" id="status-tipo">
                  <option value="1">Ativo</option>
                  <option value="0">Inativo</option>
                </select>
              </div>
            </div>
            <div class="text-right">
              <button type="button" id="btn-salvar-tipo" class="btn btn-success btn-120">Salvar</button>
            </div>
          </form>
          <div class="table-responsive mt-3">
            <table id="conteudo-tipo" class="table table-sm table-striped" style="width: 100%">
              <thead class="text-center">
                <tr>
                  <th>ID</th>
                  <th>Descrição</th>
                  <th>Status</th>
                  <th>Ação</th>
                </tr>
              </thead>
              <tfoot class="text-center">
                <tr>
                  <th>ID</th>
                  <th>Descrição</th>
                  <th>Status</th>
                  <th>Ação</th>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
        <div class="tab-pane border-left border-right border-bottom p-3 active" id="status-projeto" role="tabpanel" aria-labelledby="status-projeto-tab">
          <form id="form-status">
            <input type="hidden" name="id" id="id-status">
            <div class="form-row">
              <div class="form-group col-md-8">
                <label for="descricao-status">Descrição</label>
                <input type="text" class="form-control" name="descricao" id="descricao-status">
              </div>
              <div class="form-group col-md-2">
                <label for="cor-status">Cor</label>
                <input type="color" class="form-control" name="cor" id="cor-status">
              </div>
              <div class="form-group col-md-2">
                <label for="status-status">Status</label>
                <select class="form-control" name="status" id="status-status">
                  <option value="1">Ativo</option>
                  <option value="0">Inativo</option>
                </select>
              </div>
            </div>
            <div class="text-right">
              <button type="button" id="btn-salvar-status" class="btn btn-success btn-120">Salvar</button>
            </div>
          </form>
          <div class="table-responsive mt-3">
            <table id="conteudo-status" class="table table-sm table-striped" style="width: 100%">
              <thead class="text-center">
                <tr>
                  <th>ID</th>
                  <th>Descrição</th>
                  <th>Cor</th>
                  <th>Status</th>
                  <th>Ação</th>
                </tr>
              </thead>
              <tfoot class="text-center">
                <tr>
                  <th>ID</th>
                  <th>Descrição</th>
                  <th>Cor</th>
                  <th>Status</th>
                  <th>Ação</th>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>