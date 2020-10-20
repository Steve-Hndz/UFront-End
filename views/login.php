<main>
  <div class="container">
    <h1 class="container__tittle">Iniciar Sesion</h1>

    <div class="form__holder form__holder-fill">
      <form action="" class="form">
        <div class="form__group">
          <h3>Usuario</h3>
          <img class="form__group-img" src="<?=BASE_DIR?>assets/images/user.png" alt="" />
          <input class="form__group-input" type="text" name="user" placeholder="user123" required/>
        </div>

        <div class="form__group">
          <h3>Contraseña</h3>
          <img class="form__group-img" src="<?=BASE_DIR?>assets/images/code.png" alt="" />
          <input class="form__group-input" type="password" name="password" placeholder="12345" required/>
        </div>

        <div class="form__group">
          <button class="button button--fill" type="submit">Acceder</button>
        </div>
      </form>
    </div>
  </div>
</main>
