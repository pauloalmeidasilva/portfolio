
<!-- MENU LATERAL - FIM -->
<section class="col-sm-9 offset-sm-3 col-xl-10 offset-xl-2">
  <div class="card p-3 mx-1 shadow" style="margin-top: 80px;">
    <h3>Usuário</h3>

    <div class="text-right">
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_senha">Alterar Senha</button>
    </div>
    <form id="form-user" enctype="multipart/form-data">
      <input type="hidden" name="id" value="<?=$this->session->userdata('Dados')['id']?>">

      <fieldset>
        <legend>Identificação</legend>
        <div class="form-row">
          <div class="col-lg-2">
            <div class="form-group">
              <img class="img-thumbnail" id="img" src="<?php if(isset($this->session->userdata('Dados')['foto']) && !is_null($this->session->userdata('Dados')['foto'])){ echo UPLOAD.$this->session->userdata('Dados')['foto'];}else{ echo IMG.'upload/default.png';}?>" style="max-height: 200px; cursor: pointer;">
              <input type="file" id="upload" name="imagem" hidden accept="image/*">
            </div>
          </div>
          <div class="col-lg-10">
            <div class="form-row">
              <div class="form-group col-lg-12">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" value="<?=$this->session->userdata('Dados')['nome']?>">
              </div>
              <div class="form-group col-lg-3">
                <label for="nascimento">Data de Nascimento</label>
                <input  class="form-control" name="nascimento" id="nascimento" size="16" type="date" value="<?=$this->session->userdata('Dados')['nascimento']?>">
              </div>
              <div class="form-group col-lg-3">
                <label for="telefone">Telefone</label>
                <input type="text" class="form-control" id="telefone" name="telefone" value="<?=$this->session->userdata('Dados')['telefone']?>">
              </div>
              <div class="form-group col-lg-6">
                <label for="email">E-mail</label>
                <input type="email" class="form-control" id="email" name="email" value="<?=$this->session->userdata('Dados')['email']?>">
              </div>
            </div>
          </div>
        </div>
      </fieldset>
      <fieldset>
        <legend>Outros</legend>
        
        <div class="form-row">
          <div class="form-group col-md">
            <label for="facebook">Facebook</label>
            <input type="text" class="form-control" name="facebook" id="facebook" value="<?=$this->session->userdata('Dados')['facebook']?>">
          </div>
          <div class="form-group col-md">
            <label for="linkedin">LinkedIn</label>
            <input type="text" class="form-control" name="linkedin" id="linkedin" value="<?=$this->session->userdata('Dados')['linkedin']?>">
          </div>
          <div class="form-group col-md">
            <label for="instagram">Instagram</label>
            <input type="text" class="form-control" name="instagram" id="instagram" value="<?=$this->session->userdata('Dados')['instagram']?>">
          </div>
        </div>
      </fieldset>
      <div class="text-center">
        <div id="user_aviso"></div>
        <button type="submit" class="btn btn-success">Alterar Dados</button>
      </div>
    </form>
  </div>
</section>
</div>
</div>