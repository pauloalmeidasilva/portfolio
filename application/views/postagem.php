<section class="container-fluid margem offset">
  <div class="card shadow">
    <div class="card-header d-flex justify-content-between">
      <h3>Postagem</h3>
      <button type="button" id="btn-novo" class="btn btn-success" data-toggle="modal" data-target="#modal-cad">Nova Postagem</button>
    </div>
    <div class="card-body">
      <form class="mt-3">
        <fieldset>
          <legend>Filtros</legend>
          <div class="form-group">
            <input type="text" class="form-control" id="filtro" name="filtro">
          </div>
        </fieldset>                        
      </form>

      <div class="table-responsive mt-3">
        <table id="conteudo" class="table table-sm table-striped" style="width: 100%">
          <thead class="text-center">
            <tr>
              <th>ID</th>
              <th>Titulo</th>
              <th>Data de Postagem</th>
              <th>Visível no Site</th>
              <th>Ação</th>
            </tr>
          </thead>
          <tfoot class="text-center">
            <tr>
              <th>ID</th>
              <th>Titulo</th>
              <th>Data de Postagem</th>
              <th>Visível no Site</th>
              <th>Ação</th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
</section>