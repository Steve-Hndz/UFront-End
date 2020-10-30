<main>
    <div class="view">
        <div class="pacientes">
            <div class="pacientes__container-title">
                <h3 class="pacientes__title">Información de los pacientes</h3>
            </div>
            <div class="pacientes__container-img">
                <img class="pacientes__img" src="<?= BASE_DIR; ?>assets/images/clip-pacientes.png" alt="imagen alusiva a los donantes" class="donantes__img">
            </div>
            <div class="pacientes__txtregistrar">
                <p>¿Necesitas ayuda? <span>Puedes registrarte como paciente aquí</span></p>
                <a href="<?=BASE_DIR?>Account/register&type=paciente" class="button button--outline"> Registro de Paciente ➤</a>
            </div>
        </div>

        <div class="pacientes__container">
            <!--
            <div class="pacientes__form">
                <div class="pacientes__select-tittle">
                    <p>Departamento</p>
                    <div class="select">

                        <select>
                            <option>--Select--</option>
                            <?php foreach ($departamentosList as $departamento) { ?>
                                <option value="<?= $departamento->id_departamento ?>" <?= ((isset($filter['departamento'])) && $filter['departamento'] == $departamento->id_departamento) ? "selected" :  "" ?>><?= $departamento->nombre_departamento ?></option>
                            <?php } ?>
                        </select>
                        <div class="select_arrow">
                        </div>
                    </div>
                </div>
                <div class="pacientes__select-tittle">
                    <p>Municipio</p>
                    <div class="select">
                        <select>
                            <option>--Select--</option>
                            <?php foreach ($municipiosList as $municipios) { ?>
                                <option value="<?=$municipios->nombre_municipio?>"><?=$municipios->nombre_municipio?></option>
                            <?php } ?>
                        </select>
                        <div class="select_arrow">
                        </div>
                    </div>
                </div>

                <div class="pacientes__input">
                    <input type="text" placeholder="Buscar" />
                    <span>
                        <button><i class="fa fa-search"></i></button>
                    </span>
                </div>
            </div>
            -->

            <div class="content_table">
                <table class="table_full" id="tblPacientes">
                    <thead class="title_table">
                        <th data-titulo="nombre"><strong>Nombre</strong></th>
                        <th data-titulo="apellido"><strong>Apellido</strong></th>
                        <th data-titulo="departamento"><strong>Departamento</strong></th>
                        <th data-titulo="municipio"><strong>Municipio</strong></th>
                        <th data-titulo="hospital"><strong>Hospital</strong></th>
                        <th data-titulo="tipoSangre"><strong>Tipo Sangre</strong></th>
                        <th data-titulo="telefono"><strong>Teléfono</strong></th>
                        <th data-titulo="estado"><strong>Estado</strong></th>
                    </thead>
                    <tbody>
                    <?php foreach ($list as $paciente) : ?>
                        
                            <tr class="body_table">
                                <td data-titulo="Nombre: "><strong><?php echo $paciente->nombre_paciente ?></strong></td>
                                <td data-titulo="Apellido: "><strong><?php echo $paciente->apellido_paciente ?></strong></td>
                                <td data-titulo="Departamento: "><strong> <?php echo $paciente->nombre_departamento ?> </strong></td>
                                <td data-titulo="Municipio: "><strong><?php echo $paciente->nombre_municipio ?></strong></td>
                        
                                <td data-titulo="Hospital"><strong><?php echo $paciente->nombre_hospital ?></strong></td>
                                <td data-titulo="Tipo de Sangre: " class="tipe_blood"><strong><?php echo $paciente->nombre_sangre ?></strong></td>
                                <td data-titulo="Telefono: "><strong><?php echo $paciente->telefono_paciente ?></strong></td>
                                <td data-titulo="Estado: "><strong><?php if ($paciente->estado_paciente == "0") {
                                   echo "Activo";
                                } else { echo "Inactivo";} ?></strong></td>
                            </tr>
                        
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>