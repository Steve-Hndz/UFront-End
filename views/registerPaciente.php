<main>
    <div class="plant">
      <img class="plant__img" src="<?=BASE_DIR?>assets/images/clip-doctor-and-patient.png" alt="doctor y paciente">
    </div>

    <div class="plant__tittle">
      <h2 class="form__holder-h2">Registro de nuevo Paciente</h2>
    </div>

    <div class="wrapper">

      <div class="form__holder">
        <form action="" class="form" method="POST">
          <div class="form__group">
            <img class="form__group-img" src="<?=BASE_DIR?>assets/images/user.png"alt="" />
            <input class="form__group-input" type="text" name="nombre" placeholder="Nombre" required/>
          </div>

          <div class="form__group">
            <img class="form__group-img" src="<?=BASE_DIR?>assets/images/user.png" alt="" />
            <input class="form__group-input" type="text" name="apellido" placeholder="Apellido" required/>
          </div>

          <div class="form__group">
            <img class="form__group-img" src="<?=BASE_DIR?>assets/images/telephone.png" alt="" />
            <input class="form__group-input" type="tel" pattern="[0-9]{4}-[0-9]{4}" name="telefono" placeholder="Teléfono" required/>
          </div>

          <div class="form__group">
            <img class="form__group-img" src="<?=BASE_DIR?>assets/images/map.png" alt="" />
              <select class="form__group-select" name="departamento" id="departamento" required>
              <option disabled selected>Departamento</option>
              <?php foreach ($departamentosList as $departamento) { ?>
                <option value="<?=$departamento->id_departamento?>" <?=((isset($filter['departamento'])) && $filter['departamento'] == $departamento->id_departamento)? "selected":  ""?>><?=$departamento->nombre_departamento?></option>
              <?php } ?>
              </select>
          </div>

          <div class="form__group">
              <img class="form__group-img" src="<?=BASE_DIR?>assets/images/map.png" alt="" />
              <select class="form__group-select" name="municipio" id="municipio" required>
              <option disabled selected>Municipio</option>
              <?php foreach ($municipiosList as $municipios) { ?>
                <option value="<?=$municipios->id_municipio?>"><?=$municipios->nombre_municipio?></option>
              <?php } ?>
              </select>
          </div>

          <div class="form__group">
            <img class="form__group-img" src="<?=BASE_DIR?>assets/images/map.png" alt="" />
            <select class="form__group-select" name="hospital" id="hospital" required>
              <option disabled selected>Hospitales</option>
              <?php foreach ($hospitalesList as $hospitales) { ?>
                <option value="<?=$hospitales->id_hospital?>"><?=$hospitales->nombre_hospital?></option>
              <?php } ?>
              </select>
          </div>

          <div class="form__group">
              <img class="form__group-img" src="<?=BASE_DIR?>assets/images/gota.png" alt="" />
              <select class="form__group-select" name="sangre" id="sangre" required>
              <option disabled selected>Tipo de Sangre</option>
              <?php foreach ($tipoSangreList as $tiposSangre) { ?>
                <option value="<?=$tiposSangre->id_sangre?>"><?=$tiposSangre->nombre_sangre?></option>
              <?php } ?>
              </select>
          </div>

          <div class="form__group">
            <img class="form__group-img" src="<?=BASE_DIR?>assets/images/info.png" alt="" />
            <textarea class="form__group-input" name="descripcion" rows="6" cols="36" placeholder="Descripción (urgencia, detalles, cómo llegar, etc...)" required></textarea>
          </div>

          <div class="form__group">
            <button class="button button--fill" type="submit">Registrarse</button>
          </div>
        </form>
      </div>
    </div>
</main>
