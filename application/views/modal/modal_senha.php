<div class="modal fade" id="modal_senha" tabindex="-1" role="dialog" aria-labelledby="modal_senha_label" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal_senha_label">Alterar senha</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p class="text-justify">Para a troca da senha será preciso informar a senha atual. Após a troca da senha, se for bem sucedida, o sistema fará logoff para que o usuário acesse novamente com a nova senha.</p>
        <form id="form-senha">
          <input type="hidden" name="id">
          <div class="form-group">
            <label for="atual">Senha atual</label>
            <input type="password" class="form-control" name="senha_atual" id="atual">
          </div>
          <hr>
          <div class="alert alert-info" role="alert">
            A senha deve conter pelo menos 8 caracteres.
          </div>
          <div class="form-group">
            <label for="nova">Nova senha</label>
            <input type="password" class="form-control" name="senha_nova" id="nova">
            <div class="progress mt-1">
              <div class="progress-bar progress-bar-striped progress-bar-animated tamanho" role="progressbar" aria-valuemin="0" aria-valuemax="100" id="progress1"></div>
            </div>
          </div>
          <div class="form-group">
            <label for="conf_nova">Confirmar nova senha</label>
            <input type="password" class="form-control" id="conf_nova">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" id="btn-senha" disabled>Alterar senha</button>
      </div>
    </div>
  </div>
</div>