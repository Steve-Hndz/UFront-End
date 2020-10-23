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
            <button class="button button--outline"> Registro de Paciente ➤</button>
        </div>
      </div>

      <div class="pacientes__container">
          <div class="pacientes__form">
              <div class="pacientes__select-tittle">
                  <p>Departamento</p>
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
              <div class="pacientes__select-tittle">
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

              <div class="pacientes__input">
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
                      <td data-titulo="hospital"><strong>Hospital</strong></td>
                      <td data-titulo="tipoSangre"><strong>Tipo Sangre</strong></td>
                      <td data-titulo="telefono"><strong>Teléfono</strong></td>
                      <td data-titulo="estado"><strong>Estado</strong></td>
                  </thead>
                  <?php foreach ($list as $donante) : ?>
                  <tbody>
                      <tr class="body_table">
                          <td data-titulo="Nombre: "><strong><?php echo $donante->nombre_donante ?></strong></td>
                          <td data-titulo="Apellido: "><strong><?php echo $donante->apellido_donante ?></strong></td>
                          <td data-titulo="Departamento: "><strong>---</strong></td>
                          <td data-titulo="Municipio: "><strong>---</strong></td>
                          <td data-titulo="Hospital"><strong>---</strong></td>
                          <td data-titulo="Tipo de Sangre: " class="tipe_blood"><strong>---</strong></td>
                          <td data-titulo="Telefono: "><strong><?php echo $donante->telefono_donante ?></strong></td>
                          <td data-titulo="Estado: "><strong><?php echo $donante->estado_donante ?></strong></td>
                      </tr>
                  </tbody>
                  <?php endforeach; ?>
              </table>
          </div>
      </div>
    </div>
</main>
