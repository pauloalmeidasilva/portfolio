<section class="col-sm-9 offset-sm-3 col-xl-10 offset-xl-2">
    <div class="card p-5 mx-1 shadow" style="margin-top: 80px;">
        <h3>Cursos Extracurriculares</h3>

        <div class="text-right">
            <button type="button" id="btn-novo" class="btn btn-success" data-toggle="modal" data-target="#modal-curso">Novo Curso</button>
        </div>

        <form class="mt-3">
            <fieldset>
                <legend>Filtros</legend>
                <div class="form-group">
                    <input type="text" class="form-control" id="filtro" name="filtro">
                </div>
            </fieldset>                        
        </form>

        <div class="table-responsive-xl mt-3">
            <table id="conteudo" class="table table-sm table-striped" style="width: 100%">
                <thead class="text-center">
                    <tr>
                        <th>ID</th>
                        <th>Descrição</th>
                        <th>Carga Horária</th>
                        <th>Visiível no Currículo</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tfoot class="text-center">
                    <tr>
                        <th>ID</th>
                        <th>Descrição</th>
                        <th>Carga Horária</th>
                        <th>Visiível no Currículo</th>
                        <th>Ação</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</section>