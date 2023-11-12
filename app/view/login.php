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
            <input type='password' name='senha' required  placeholder='Senha'>
          </div>
          <div class="row">
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
          <input type='password' name='senha' required placeholder='Senha'>
          </div>
          <?php
          if (isset($send['msg'])){
            ?>
              <div id='modalNoLogin' class='modalError'>
                <p><?=$send['msg']?></p>
              </div>
            <?php
          } ?>
          <div class="row">
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

</html>
