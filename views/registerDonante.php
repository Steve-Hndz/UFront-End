<main>
    <div class="plant">
      <img class="plant__img" src="<?=BASE_DIR?>assets/images/pablo-warehouse-worker.png" alt="doctor y paciente">
    </div>

    <div class="plant__tittle">
      <h2 class="form__holder-h2">Registro de Nuevo Donante</h2>
    </div>

    <div class="wrapper">

      <div class="form__holder">
        <form action="" class="form">
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
              <option value="">Usulután</option>
              <option value="">Ahuachapán</option>
              <option value="">Cabañas</option>
              <option value="">Chalatenango</option>
              <option value="">Cuscatlán</option>
              <option value="">La Libertad</option>
              <option value="">La Paz</option>
              <option value="">La Unión</option>
              <option value="">Morazán</option>
              <option value="">San Miguel</option>
              <option value="">San Salvador</option>
              <option value="">San Vicente</option>
              <option value="">Santa Ana</option>
              <option value="">Sonsonate</option>
              </select>
          </div>

          <div class="form__group">
              <img class="form__group-img" src="<?=BASE_DIR?>assets/images/map.png" alt="" />
              <select class="form__group-select" name="municipio" id="municipio" required>
              <option disabled selected>Municipio</option>
              <option value=""></option>
              </select>
          </div>

          <div class="form__group">
            <img class="form__group-img" src="<?=BASE_DIR?>assets/images/email.png" alt="" />
            <input class="form__group-input" type="email" name="correo" placeholder="Correo electrónico" required/>
          </div>

          <div class="form__group">
              <img class="form__group-img" src="<?=BASE_DIR?>assets/images/gota.png" alt="" />
              <select class="form__group-select" name="sangre" id="sangre" required>
              <option disabled selected>Tipo de Sangre</option>
              <option value="">O negativo</option>
              <option value="">O positivo</option>
              <option value="">A negativo</option>
              <option value="">A positivo</option>
              <option value="">B negativo</option>
              <option value="">B positivo</option>
              <option value="">AB positivo</option>
              <option value="">AB positivo</option>
              </select>
          </div>

          <div class="form__group">
            <img class="form__group-img" src="<?=BASE_DIR?>assets/images/info.png" alt="" />
            <textarea class="form__group-input" name="historial" rows="6" cols="36" placeholder="Historial (lugar de recuperación, sospechas de enfermedad, etc...)" required></textarea>
          </div>

          <div class="form__group">
            <h3>¿Posee carnet COVID-19?</h3>
            <input type="radio" name="carnet" value="si" required>
            <label for="carnet">Si</label>
            <input type="radio" name="carnet" value="no" required>
            <label for="carnet">No</label>
          </div>

          <div class="form__group">
            <img class="form__group-img" src="<?=BASE_DIR?>assets/images/info.png" alt="" />
            <textarea class="form__group-input" name="informacion" rows="6" cols="36" placeholder="Información adicional (disponibilidad de viajar, condiciones, etc...)" required></textarea>
          </div>

          <div class="form__group">
            <button class="button button--fill" type="submit">Registrarse</button>
          </div>
        </form>
      </div>
    </div>
</main>
