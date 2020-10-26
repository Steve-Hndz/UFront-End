<main>
    <div class="donantes__view">
        <div class="donantes">
            <div class="donantes__container-title">
                <h3 class="donantes__title">Información de los donantes</h3>
            </div>
            <div class="donantes__container-img">
                <img src="<?= BASE_DIR; ?>assets/images/donantes.png" alt="imagen alusiva a los donantes"
                    class="donantes__img">
            </div>

            <div class="donantes__txtregistrar">
                <p>¿Quieres donar? <span>Puedes registrarte como donante Aquí</span></p>
                <button class="button button--outline"> Registro de Donante ➤</button>
            </div>
        </div>

        <div class="donantes__container">
            <!--
        <div class="donantes__form">

            <div class="donantes__select-tittle">
                <p>Departamento</p>
                <div class="select">

                    <select>
                        <option>--Select--</option>
                      <?php foreach ($departamentosList as $departamento) { ?>
                            <option value="<?=$departamento->nombre_departamento?>"><?=$departamento->nombre_departamento?></option>
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
                        <option>Hello 1</option>
                        <option>Hello 2</option>
                        <option>Hello 3</option>
                        <option>Hello 4</option>
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
        -->
            <div class="donante-content_table">
                <table class="table_full" id="dataTable">
                    <thead class="title_table">
                        <td><strong>Nombre</strong></td>
                        <td><strong>Apellido</strong></td>
                        <td><strong>Departamento</strong></td>
                        <td><strong>Municipio</strong></td>
                        <td><strong>Tipo Sangre</strong></td>
                        <td><strong>Teléfono</strong></td>
                        <td><strong>Estado</strong></td>
                    </thead>
                    <?php foreach ($list as $donante) : ?>
                    <tbody>
                        <tr class="body_table">
                            <td><strong><?php echo $donante->nombre_donante ?></strong></td>
                            <td><strong><?php echo $donante->apellido_donante ?></strong></td>
                            <td><strong> <?php echo $donante->nombre_departamento ?> </strong></td>
                            <td><strong><?php echo $donante->nombre_municipio ?></strong></td>
                            <td class="tipe_blood"><strong><?php echo $donante->nombre_sangre ?></strong></td>
                            <td><strong><?php echo $donante->telefono_donante ?></strong></td>
                            <td><strong><?php echo $donante->estado_donante ?></strong></td>
                        </tr>
                    </tbody>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>
</main>