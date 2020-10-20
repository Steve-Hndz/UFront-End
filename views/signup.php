<main>
  <div class="container-auto">
    <h1 class="container__tittle">Registrar usuario</h1>

    <div class="form__holder form__holder-fill">
      <form action="" class="form">
        <div class="form__group-min">
          <h3>Nombre</h3>
          <img class="form__group-img" src="<?=BASE_DIR?>assets/images/user.png" alt="" />
          <input class="form__group-input" type="text" name="nombre" placeholder="fulano" required/>
        </div>

        <div class="form__group-min">
          <h3>Usuario</h3>
          <img class="form__group-img" src="<?=BASE_DIR?>assets/images/user.png" alt="" />
          <input class="form__group-input" type="text" name="user" placeholder="user123" required/>
        </div>

        <div class="form__group-min">
          <h3>Correo</h3>
          <img class="form__group-img" src="<?=BASE_DIR?>assets/images/email.png" alt="" />
          <input class="form__group-input" type="email" name="email" placeholder="correo@dominio.com" required/>
        </div>

        <div class="form__group-min">
          <h3>Contraseña</h3>
          <img class="form__group-img" src="<?=BASE_DIR?>assets/images/code.png" alt="" />
          <input class="form__group-input" type="password" name="password" placeholder="12345" required/>
        </div>

        <div class="form__group">
          <button class="button button--outline" type="submit">Registrarse</button>
        </div>
      </form>
    </div>
  </div>
</main>
