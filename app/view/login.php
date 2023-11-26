<?php

include 'head.php';
?>

<div id="login_div">
  <div class="login_art" id="imgbeeanimated1">
    <img id="login-bee" src="<?=assets('imgs/hubhive_bee2.png')?>" alt="nao tem">
  </div>
    <div id="formLogininputs" class="form-box">
      
    <div class="row">
      <a id="voltarPag" href="<?=route("welcome")?>">
          <svg width="24" height="24" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M9.248 17.648a1.2 1.2 0 0 1-1.696 0l-4.8-4.8a1.2 1.2 0 0 1 0-1.696l4.8-4.8a1.2 1.2 0 0 1 1.696 1.696L6.497 10.8H20.4a1.2 1.2 0 1 1 0 2.4H6.497l2.751 2.752a1.2 1.2 0 0 1 0 1.696Z" clip-rule="evenodd"></path>
          </svg>
      </a>
      <?php
      if(isset($_GET['new'])):?>
        <h3 class='uppercase'>Crie sua conta e comece a jornada</h3>
        <?php else: ?>
          <h3 class='uppercase'>Que bom te ver de volta!</h3>
          <?php endif ?>
    </div>
      <?php
      if(isset($_GET['new'])):
        $act = route('login/create');
        $route = route('login'); ?>
        <form class='form' method='POST' action=<?=$act?>>
          <div class='form-container'>
            <input type='text' name='nome' required placeholder='Nome completo'>
            <input type='text' name='usuario' required placeholder='Nome de Usuário'>
            <input type='email' name='email' required placeholder='E-mail'>
            <input type='password' id="inputsenhatologin" name='senha' required  placeholder='Senha'>
            <span class="versenha" onclick="changeSenhaVisibility('inputsenhatologin')">
              <svg width="24" height="24" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="M21.87 11.496c-.64-1.11-4.16-6.68-10.14-6.5-5.53.14-8.73 5-9.6 6.5a1 1 0 0 0 0 1c.63 1.09 4 6.5 9.89 6.5h.25c5.53-.14 8.74-5 9.6-6.5a1.001 1.001 0 0 0 0-1Zm-9.65 5.5c-4.31.1-7.12-3.59-8-5 1-1.61 3.61-4.9 7.61-5 4.29-.11 7.11 3.59 8 5-1.03 1.61-3.61 4.9-7.61 5Z"></path>
                <path d="M12 8.5a3.5 3.5 0 1 0 0 7 3.5 3.5 0 0 0 0-7Zm0 5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3Z"></path>
              </svg>
            </span>
          </div>
          <div class="end">
            <button>Criar conta</button>
          </div>
      </form>
      <div class='form-section'>
        <p>Já possui uma conta? <a href=<?=$route?>>Fazer login</a> </p>
      </div>
      <?php else:
        $act = route('login/login');
        $route = route('login?new');?>
        <form class='form' method='POST' action=<?=$act?>>
          <div id='formInputsLogin' <?php if (isset($send['msg'])):?> style="border: 2px solid #d64848;"<?php endif ?> class='form-container'>
          <input type='email' name='email' required placeholder='E-mail'>
          <input type='password' id="inputsenhatologin" name='senha' required placeholder='Senha'>
          <span class="versenha" onclick="changeSenhaVisibility('inputsenhatologin')">
              <svg width="24" height="24" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="M21.87 11.496c-.64-1.11-4.16-6.68-10.14-6.5-5.53.14-8.73 5-9.6 6.5a1 1 0 0 0 0 1c.63 1.09 4 6.5 9.89 6.5h.25c5.53-.14 8.74-5 9.6-6.5a1.001 1.001 0 0 0 0-1Zm-9.65 5.5c-4.31.1-7.12-3.59-8-5 1-1.61 3.61-4.9 7.61-5 4.29-.11 7.11 3.59 8 5-1.03 1.61-3.61 4.9-7.61 5Z"></path>
                <path d="M12 8.5a3.5 3.5 0 1 0 0 7 3.5 3.5 0 0 0 0-7Zm0 5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3Z"></path>
              </svg>
            </span>
          </div>
          <?php
          if (isset($send['msg'])){
            ?>
              <div id='modalNoLogin' class='modalError'>
                <p><?=$send['msg']?></p>
              </div>
            <?php
          } ?>
          <div class="end">
            <button>Entrar</button>
          </div>
      </form>
      <div class='form-section'>
        <p>É novo por aqui? <a href=<?=$route?>>Criar uma conta</a> </p>
      </div>
      <?php endif;?>
    </div>
</div>

</body>
<script>
  function changeSenhaVisibility(idInput) {
    const inputg = document.getElementById(idInput);
    if (inputg.type === "password") {
        inputg.type = "text";
    } else if (inputg.type === "text") {
        inputg.type = "password";
    }
}
</script>

</html>
