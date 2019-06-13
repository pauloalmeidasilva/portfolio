
            <!-- MENU LATERAL - FIM -->
            <section class="col-sm-10 offset-sm-2">
                <div class="card p-3 mx-1 shadow" style="margin-top: 70px;">
                    <h3>Dashboard</h3>

                    <form id="form-user">
                        <input type="hidden" name="fun_codigo" value="<?php if(isset($perfil[0]->fun_codigo)){echo $perfil[0]->fun_codigo;} ?>">

                        <fieldset>
                            <legend>Identificação</legend>
                            <div class="form-group">
                                <label for="nome">Nome</label>
                                <input type="text" class="form-control" id="nome" name="fun_nome" value="<?php if(isset($perfil[0]->fun_nome)){echo $perfil[0]->fun_nome;}?>" disabled>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="nascimento">Data de Nascimento</label>
                                    <input  class="form-control form-control-inline input-medium datepicker-here" name="fun_nascimento" id="nascimento" size="16" type="text" value="<?php if(isset($perfil[0]->fun_nascimento)){echo $perfil[0]->fun_nascimento;}?>" data-language="pt-br" disabled>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="sexo">Sexo</label>
                                    <select class="form-control" name="fun_sexo" id="sexo" disabled>
                                        <?php 
                                        foreach (get_sexo() as $sigla => $sexo) {
                                            if ($sigla == $perfil[0]->fun_sexo) { ?>
                                                <option value="<?=$sigla?>" selected><?=$sexo?></option>

                                            <?php }else { ?>
                                                <option value="<?=$sigla?>"><?=$sexo?></option>
                                            <?php } ?>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="est-civil">Estado Civil</label>
                                    <select class="form-control" name="fun_estado_civil" id="est-civil" disabled>
                                        <?php 
                                        foreach (get_estado_civil() as $sigla => $opcao) {
                                            if ($sigla == $perfil[0]->fun_estado_civil) { ?>
                                                <option value="<?=$sigla?>" selected><?=$opcao?></option>
                                            <?php }else { ?>
                                                <option value="<?=$sigla?>"><?=$opcao?></option>
                                            <?php } ?>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="mae">Mãe</label>
                                    <input type="text" class="form-control" id="mae" name="fun_mae" value="<?php if(isset($perfil[0]->fun_mae)){echo $perfil[0]->fun_mae;} ?>" disabled>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="pai">Pai</label>
                                    <input type="text" class="form-control" id="pai" name="fun_pai" value="<?php if(isset($perfil[0]->fun_pai)){echo $perfil[0]->fun_pai;} ?>" disabled>
                                </div>
                            </div>
                        </fieldset>

                        <fieldset>
                            <legend>Identificação</legend>
                            <div class="form-group">
                                <label for="nome">Nome</label>
                                <input type="text" class="form-control" id="nome" name="fun_nome" value="<?php if(isset($perfil[0]->fun_nome)){echo $perfil[0]->fun_nome;}?>" disabled>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="nascimento">Data de Nascimento</label>
                                    <input  class="form-control form-control-inline input-medium datepicker-here" name="fun_nascimento" id="nascimento" size="16" type="text" value="<?php if(isset($perfil[0]->fun_nascimento)){echo $perfil[0]->fun_nascimento;}?>" data-language="pt-br" disabled>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="sexo">Sexo</label>
                                    <select class="form-control" name="fun_sexo" id="sexo" disabled>
                                        <?php 
                                        foreach (get_sexo() as $sigla => $sexo) {
                                            if ($sigla == $perfil[0]->fun_sexo) { ?>
                                                <option value="<?=$sigla?>" selected><?=$sexo?></option>

                                            <?php }else { ?>
                                                <option value="<?=$sigla?>"><?=$sexo?></option>
                                            <?php } ?>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="est-civil">Estado Civil</label>
                                    <select class="form-control" name="fun_estado_civil" id="est-civil" disabled>
                                        <?php 
                                        foreach (get_estado_civil() as $sigla => $opcao) {
                                            if ($sigla == $perfil[0]->fun_estado_civil) { ?>
                                                <option value="<?=$sigla?>" selected><?=$opcao?></option>
                                            <?php }else { ?>
                                                <option value="<?=$sigla?>"><?=$opcao?></option>
                                            <?php } ?>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="mae">Mãe</label>
                                    <input type="text" class="form-control" id="mae" name="fun_mae" value="<?php if(isset($perfil[0]->fun_mae)){echo $perfil[0]->fun_mae;} ?>" disabled>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="pai">Pai</label>
                                    <input type="text" class="form-control" id="pai" name="fun_pai" value="<?php if(isset($perfil[0]->fun_pai)){echo $perfil[0]->fun_pai;} ?>" disabled>
                                </div>
                            </div>
                        </fieldset>
                        
                    </form>
                </div>
            </section>

        </div>
    </div>