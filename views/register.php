<main>
  <div class="general__vertical">
    <div class="plant__tittle">
      <h2 class="form__holder-h2">Registro</h2>
    </div>

    <div class="wrapper">
      <div class="form__holder">
        <form action="Usuario/type" class="form" method="get">
          <div class="form__group">
            <img class="form__group-img" src="<?=BASE_DIR?>assets/images/user.png" alt="" />
              <select class="form__group-select" name=tipo"" id="">
              <option disabled selected>Tipo de registro</option>
              <option value="donante">Donante</option>
              <option value="paciente">Paciente</option>
              </select>
          </div>

          <div class="form__group">
            <button class="button button--fill" type="button"><a href="<?=BASE_DIR?>Usuario/registro">Ver formulario</a></button>
          </div>
        </form>
      </div>
    </div>
  </div>
</main>
