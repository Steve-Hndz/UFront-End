<main>
    <div class="donantes__container-img">
        <img src="<?= BASE_DIR; ?>assets/images/donantes.png" alt="imagen alusiva a los donantes" class="donantes__img">
    </div>
    <div class="donantes__txtregistrar">
        <p class="donantes__p">¿Quieres donar? <span>Puedes registrarte como donante Aquí</span></p>
        <button class="button button--outline"> Registrarme como Donante ➤</button>
    </div>
    <div class="donantes__container-title">
        <h3 class="donantes__title">Información de los donantes</h3>
    </div>

    <div class="donantes__container">
        <div class="donantes__form">

            <div class="donantes__select-tittle">
                <p>Departamento</p>
                <div class="select">

                    <select>
                        <option>--Select--</option>
                        <?php foreach ($departamentosList as $departamento) { ?>
                            <option value="<?=$departamento->id_departamento?>" <?=((isset($filter['departamento'])) && $filter['departamento'] == $departamento->id_departamento)? "selected":  ""?>><?=$departamento->nombre_departamento?></option>
                        <?php } ?>
                    </select>
                    <div class="select_arrow">
                    </div>
                </div>
            </div>
            <div class="donantes__select-tittle">
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

            <div class="donantes__input">
                <input type="text" placeholder="Buscar" />
                <span>
                    <button><i class="fa fa-search"></i></button>
                </span>
            </div>
        </div>


        <div class="content_table">
            <table class="table_full">
                <thead class="title_table">
                    <td data-titulo="nombre"><strong>Nombre</strong></td>
                    <td data-titulo="apellido"><strong>Apellido</strong></td>
                    <td data-titulo="departamento"><strong>Departamento</strong></td>
                    <td data-titulo="municipio"><strong>Municipio</strong></td>
                    <td data-titulo="tipoSangre"><strong>Tipo Sangre</strong></td>
                    <td data-titulo="telefono"><strong>Teléfono</strong></td>
                    <td data-titulo="estado"><strong>Estado</strong></td>
                </thead>
                <?php foreach ($list as $donante) : ?>
                <tbody>
                    <tr class="body_table">
                        <td data-titulo="Nombre: "><strong><?php echo $donante->nombre_donante ?></strong></td>
                        <td data-titulo="Apellido: "><strong><?php echo $donante->apellido_donante ?></strong></td>
                        <td data-titulo="Departamento: "><strong> <?php echo $donante->nombre_departamento ?> </strong></td>
                        <td data-titulo="Municipio: "><strong><?php echo $donante->nombre_municipio ?></strong></td>
                        <td data-titulo="Tipo de Sangre: " class="tipe_blood"><strong><?php echo $donante->nombre_sangre ?></strong></td>
                        <td data-titulo="Telefono: "><strong><?php echo $donante->telefono_donante ?></strong></td>
                        <td data-titulo="Estado: "><strong><?php echo $donante->estado_donante ?></strong></td>
                    </tr>
                </tbody>
                <?php endforeach; ?>
            </table>
        </div>


    </div>
</main>