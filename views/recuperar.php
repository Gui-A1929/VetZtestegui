<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Recuperar Senha - VetZ</title>
  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
      font-family: 'Arial', sans-serif;
    }

    body {
      background-color: #fdfcea;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      min-height: 100vh;
    }
      
    header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 20px 40px;
      border-bottom: 2px solid #b1b1b1;
    }

    .logo {
      height: 60px;
    }

    .btn-voltar {
      background-color: #b0e8a4;
      color: #000;
      font-weight: bold;
      padding: 10px 20px;
      border-radius: 8px;
      border: none;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    .btn-voltar:hover {
      background-color: #9bd68f;
    }

    main {
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 40px 20px;
    }

    .box {
      background: linear-gradient(#ffffff, #fcfcfc);
      border-radius: 20px;
      box-shadow: 5px 5px 10px rgba(0,0,0,0.2);
      padding: 30px;
      width: 400px;
      text-align: center;
    }

    .box h2 {
      font-size: 24px;
      color: #464b78;
      margin-bottom: 20px;
    }

    .box p {
      background-color: #fff;
      padding: 15px;
      border-radius: 15px;
      font-size: 15px;
      color: #333;
      margin-bottom: 30px;
    }

    .campo-codigo {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 10px;
      font-size: 16px;
    }

    .campo-codigo label {
      font-weight: bold;
      color: #464b78;
    }

    .campo-codigo input {
      padding: 10px;
      border-radius: 15px;
      border: none;
      width: 120px;
      text-align: center;
      font-size: 16px;
      background-color: #ffffff;
      box-shadow: 0 0 4px rgba(0,0,0,0.1);
    }

    footer {
      background-color: #c4f1bc;
      padding: 10px 20px;
      text-align: center;
      font-size: 14px;
      color: #444;
      position: relative;
    }

    .icons {
      position: absolute;
      right: 20px;
      top: 10px;
    }

    .icons img {
      width: 24px;
      margin-left: 10px;
    }

    @media (max-width: 480px) {
      .box {
        width: 90%;
      }
    }
  </style>
</head>
<body>

  <header>
    <img src="#" alt="Logo VetZ" class="logo">
    <button class="btn-voltar" onclick="window.history.back()">VOLTAR</button>
  </header>

  <main>
    <div class="box">
      <h2>Recuperando a senha</h2>
      <p>Será enviado um código para recuperação de senha<br>no email marc*********@gmail.com</p>

<<<<<<< HEAD
      <form id="form-email" action="/projeto/vetz/enviarCodigo" method="POST">
        <input name="email" id="email" type="email" placeholder="Digite seu e-mail" required>
        <button type="submit">Enviar código</button>
      </form>

      <div id="popup-codigo" style="display:none; position:fixed; top:0; left:0; width:100vw; height:100vh; background:rgba(0,0,0,0.4); z-index:1000; align-items:center; justify-content:center;">
        <div style="background:#fff; padding:30px; border-radius:15px; width:300px; margin:auto; text-align:center; position:relative;">
          <h3>Digite o código recebido</h3>
          <form id="form-codigo" action="/projeto/vetz/verificarCodigo" method="POST">
            <input name="email" id="popup-email" type="hidden">
            <input name="codigo" type="text" placeholder="Código" required style="margin-bottom:10px; width:90%;"><br>
            <input name="nova_senha" type="password" placeholder="Nova senha" required style="margin-bottom:10px; width:90%;"><br>
            <button type="submit">Trocar senha</button>
          </form>
          <button onclick="fecharPopup()" style="position:absolute; top:10px; right:10px; background:none; border:none; font-size:18px; cursor:pointer;">&times;</button>
          <div id="msg-codigo" style="margin-top:10px; color:#038654;"></div>
        </div>
      </div>

      <div id="popup-codigo" style="display:none; position:fixed; top:0; left:0; width:100vw; height:100vh; background:rgba(0,0,0,0.4); z-index:1000; align-items:center; justify-content:center;">
  <div style="background:#fff; padding:30px; border-radius:15px; width:300px; margin:auto; text-align:center; position:relative;">
    <h3>Digite o código recebido</h3>
    <form action="/projeto/vetz/verificarCodigo" method="POST">
      <input name="email" id="popup-email" type="hidden">
      <input name="codigo" type="text" placeholder="Código" required style="margin-bottom:10px; width:90%;"><br>
      <input name="nova_senha" type="password" placeholder="Nova senha" required style="margin-bottom:10px; width:90%;"><br>
      <button type="submit">Trocar senha</button>
    </form>
    <button onclick="fecharPopup()" style="position:absolute; top:10px; right:10px; background:none; border:none; font-size:18px; cursor:pointer;">&times;</button>
  </div>
</div>

      <!-- Novo popup de sucesso -->
      <div id="popup-sucesso" style="display:none; position:fixed; top:0; left:0; width:100vw; height:100vh; background:rgba(0,0,0,0.4); z-index:2000; align-items:center; justify-content:center;">
        <div style="background:#fff; padding:30px; border-radius:15px; width:300px; margin:auto; text-align:center; position:relative;">
          <h3 style="color:#038654;">Senha alterada com sucesso!</h3>
          <button onclick="fecharPopupSucesso()" style="margin-top:20px; background:#038654; color:#fff; border:none; border-radius:8px; padding:10px 20px; cursor:pointer;">OK</button>
        </div>
      </div>

      <div id="msg-email" style="margin-top:15px; color:#038654;"></div>
      <div id="codigo-teste" style="margin-top:10px; color:#b00; font-weight:bold;"></div>
=======
      <form action="/projeto/vetz/enviarCodigo" method="POST">
    <input name="email" type="email" placeholder="Digite seu e-mail" required>
    <button type="submit">Enviar código</button>
</form>
>>>>>>> parent of 44708da (Merge pull request #9 from camilla-ggoncalves/alteracoes-guilherme)
    </div>
  </main>

  <footer>
    Todos os direitos reservados 2025 © – VetZ
    <div class="icons">
     
    </div>
  </footer>

</body>
</html>
