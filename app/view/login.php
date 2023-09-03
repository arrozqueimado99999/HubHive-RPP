<?php

include 'head.php';
?>

<div id="login_div">
  <div class="login_art">
    <img id="login-bee" src="<?=assets('imgs/hubhive_bee2.png')?>" alt="nao tem">
  </div>
    <div class="form-box">
      
      <a href="<?=route("welcome")?>" id="exit">
      <svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M9.248 17.648a1.2 1.2 0 0 1-1.696 0l-4.8-4.8a1.2 1.2 0 0 1 0-1.696l4.8-4.8a1.2 1.2 0 0 1 1.696 1.696L6.497 10.8H20.4a1.2 1.2 0 1 1 0 2.4H6.497l2.751 2.752a1.2 1.2 0 0 1 0 1.696Z" clip-rule="evenodd"></path>
</svg>
      Voltar
      </a>
      <?php
      if(isset($_GET['new'])){
        $act = route('login/create');
        $route = route('login');
        print("
        <form class='form' method='POST' action='$act'>
          <h3 class='text-title uppercase'>Crie sua conta e comece a jornada</h3>
          <div class='form-container'>
            <input type='text' name='nome' required placeholder='Nome completo'>
            <input type='text' name='usuario' required placeholder='Nome de Usuário'>
            <input type='email' name='email' required placeholder='E-mail'>
            <input type='password' name='senha' required  placeholder='Senha'>
          </div>
          <button>Criar conta</button>
      </form>
      <div class='form-section'>
        <p>Já possui uma conta? <a href='$route'>Fazer login</a> </p>
      </div>
      ");
      }else{
        $act = route('login/login');
        $route = route('login?new');
        print("
        <form class='form' method='POST' action='$act'>
          <h3 class='text-title uppercase'>Que bom te ver de volta!</h3>
          <div class='form-container'>
          <input type='email' name='email' required placeholder='E-mail'>
          <input type='password' name='senha' required placeholder='Senha'>
          </div>
          <button>Entrar</button>
      </form>
      <div class='form-section'>
        <p>É novo por aqui? <a href='$route'>Criar uma conta</a> </p>
      </div>
      ");
      }
      
      ?>
    </div>
</div>

</body>
</html>
