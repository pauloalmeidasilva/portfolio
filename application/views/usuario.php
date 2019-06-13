
        <!-- MENU LATERAL - FIM -->
        <section class="col-sm-10 offset-sm-2">
            <div class="card p-5 mx-1 mb-3 shadow" style="margin-top: 70px;">
                <h3>Usuário</h3>

                <div class="text-right">
                    <button type="button" class="btn btn-warning text-white">Alterar Senha</button>
                </div>
                <!-- method="post" action="<?=base_url('usuario/atualizar')?> -->
                <form id="form-user">
                    <input type="hidden" name="id" value="<?=$this->session->userdata('Dados')['id']?>">

                    <fieldset>
                        <legend>Identificação</legend>
                        <div class="form-row">
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <label for="nome">Nome</label>
                                    <input type="text" class="form-control" id="nome" name="nome" value="<?=$this->session->userdata('Dados')['nome']?>">
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="nascimento">Data de Nascimento</label>
                                        <input  class="form-control" name="nascimento" id="nascimento" size="16" type="text" value="<?=$this->session->userdata('Dados')['nascimento']?>">
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="telefone">Telefone</label>
                                        <input type="text" class="form-control" id="telefone" name="telefone" value="<?=$this->session->userdata('Dados')['telefone']?>">
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label for="email">E-mail</label>
                                        <input type="email" class="form-control" id="email" name="email" value="<?=$this->session->userdata('Dados')['email']?>">
                                    </div>
                                </div>
                                
                            </div>
                            <div class="col-sm-2"></div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend>Objetivo</legend>
                        <div class="form-group">
                            <label for="interesse">Interesse</label>
                            <input type="text" class="form-control" id="interesse" name="interesse" value="<?=$this->session->userdata('Dados')['interesse']?>">
                        </div>
                        <div class="form-group">
                            <label for="notas_interesse">Notas de Cabeçalho</label>
                            <input type="text" class="form-control" name="notas_interesse" id="notas_interesse" value="<?=$this->session->userdata('Dados')['notas_interesse']?>">
                        </div>
                        <div class="form-group">
                            <label for="profissao">Profissão</label>
                            <input type="text" class="form-control" name="profissao" id="profissao" value="<?=$this->session->userdata('Dados')['profissao']?>">
                        </div>
                        <div class="form-group">
                            <label for="perfil">Perfil</label>
                            <textarea class="form-control" name="perfil" id="perfil" cols="30" rows="10"><?=$this->session->userdata('Dados')['perfil']?></textarea>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend>Outros</legend>
                        <div class="form-group">
                            <label for="fundo_site">Imagem de Fundo</label>
                            <input type="text" class="form-control" id="fundo_site" name="fundo_site" value="<?=$this->session->userdata('Dados')['fundo_site']?>">
                        </div>
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