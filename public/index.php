<?php
// Ativar exibição de erros
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../controllers/PetController.php';
<<<<<<< HEAD
require_once '../controllers/UsuarioController.php';
=======
require_once '../controllers/FichaTecnicaController.php';
require_once '../controllers/UsuarioController.php'; 
>>>>>>> parent of 44708da (Merge pull request #9 from camilla-ggoncalves/alteracoes-guilherme)
require_once '../controllers/VacinacaoController.php';

$request = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// ---------------- ROTAS DINÂMICAS ------------------

// Editar Pet (formulário)
if (preg_match('#^/projeto/vetz/update-pet/(\d+)$#', $request, $matches) && $_SERVER['REQUEST_METHOD'] === 'GET') {
    (new PetController())->showUpdateForm($matches[1]);
    exit;
}

<<<<<<< HEAD
if (preg_match('#^/projeto/vetz/update-pet/(\d+)$#', $request, $matches) && $_SERVER['REQUEST_METHOD'] === 'POST') {
    (new PetController())->showUpdateForm($matches[1]);
    exit;
}

if (preg_match('#^/projeto/vetz/delete-pet/(\d+)$#', $request, $matches) && $_SERVER['REQUEST_METHOD'] === 'GET') {
    (new PetController())->deletePetById($matches[1]);
    exit;
}

if (preg_match('#^/projeto/vetz/delete-pet/(\d+)$#', $request, $matches) && $_SERVER['REQUEST_METHOD'] === 'POST') {
    (new PetController())->deletePetById($matches[1]);
    exit;
}

// Editar Vacina
if (preg_match('#^/projeto/vetz/editar-vacina/(\d+)$#', $request, $matches)) {
    $controller = new VacinacaoController();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $controller->editar($matches[1], $_POST['data'], $_POST['doses'], $_POST['id_vacina'], $_POST['id_pet'], $_POST['id_usuario']);
    } else {
        $vacina = $controller->buscarPorId($matches[1]);
        include '../views/vacinacao/editar.php';
    }
    exit;
}

// Excluir Vacina
if (preg_match('#^/projeto/vetz/excluir-vacina/(\d+)$#', $request, $matches)) {
    (new VacinacaoController())->excluir($matches[1]);
    exit;
}

// Atualizar Usuário - Exibir formulário
if (preg_match('#^/projeto/vetz/update-usuario/(\d+)$#', $request, $matches) && $_SERVER['REQUEST_METHOD'] === 'GET') {
    (new UsuarioController())->showUpdateForm($matches[1]);
    exit;
}

// Atualizar Usuário - Processar POST
if (preg_match('#^/projeto/vetz/update-usuario/(\d+)$#', $request, $matches) && $_SERVER['REQUEST_METHOD'] === 'POST') {
    (new UsuarioController())->updateUsuario($matches[1]);
    exit;
}

// ---------------- ROTAS FIXAS ------------------
switch ($request) {

    case '/projeto/vetz/recuperarForm':
        include '../views/recuperar.php';
        break;

    case '/projeto/vetz/cadastrar':
        (new UsuarioController())->cadastrar();
        break;

    case '/projeto/vetz/cadastrarForm':
        (new UsuarioController())->cadastrarForm();
        break;

    case '/projeto/vetz/loginForm':
        (new UsuarioController())->loginForm();
        break;

    case '/projeto/vetz/login':
        (new UsuarioController())->login();
        break;

    case '/projeto/vetz/enviarCodigo':
        (new UsuarioController())->enviarCodigo();
        break;

    case '/projeto/vetz/verificarCodigo':
        (new UsuarioController())->verificarCodigo();
        break;

    case '/projeto/vetz/redefinirSenha':
        (new UsuarioController())->redefinirSenha();
        break;

=======
// Processar o update (POST)
if (preg_match('#^/projeto/vetz/update-pet/(\d+)$#', $request, $matches) && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $matches[1];
    $controller = new PetController();
    $controller->updatePet($id);
    exit;
}

if (preg_match('#^/projeto/vetz/delete-pet/(\d+)$#', $request, $matches)) {
    $id = $matches[1];
    $controller = new PetController();
    $controller->deletePetById($id);
    exit;
}

if (preg_match('#^/projeto/vetz/editar-vacina/(\d+)$#', $request, $matches)) {
    $id = $matches[1];
    $controller = new VacinacaoController();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $controller->editar(
            $id,
            $_POST['data'],
            $_POST['doses'],
            $_POST['id_vacina'],
            $_POST['id_pet'],
            $_POST['id_usuario']
        );
    } else {
        $vacina = $controller->buscarPorId($id);
        include '../views/vacinacao/editar.php';
    }
    exit;
}

if (preg_match('#^/projeto/vetz/excluir-vacina/(\d+)$#', $request, $matches)) {
    $id = $matches[1];
    $controller = new VacinacaoController();
    $controller->excluir($id);
    exit;
}

// Exibir o formulário de edição de usuário (GET)
if (preg_match('#^/projeto/vetz/update-usuario/(\d+)$#', $request, $matches) && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $id = $matches[1];
    $controller = new UsuarioController();
    $controller->showUpdateForm($id);
    exit;
}

// Processar o update de usuário (POST)
if (preg_match('#^/projeto/vetz/update-usuario/(\d+)$#', $request, $matches) && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $matches[1];
    $controller = new UsuarioController();
    $controller->updateUsuario($id);
    exit;
}

// Roteamento padrão fixo
switch ($request) {
>>>>>>> parent of 44708da (Merge pull request #9 from camilla-ggoncalves/alteracoes-guilherme)
    case '/projeto/vetz/public/':
        (new PetController())->showForm();
        break;

    case '/projeto/vetz/save-pet':
        (new PetController())->savePet();
        break;

    case '/projeto/vetz/list-pet':
        (new PetController())->listPet();
        break;

    case '/projeto/vetz/delete-pet':
        (new PetController())->deletePetById();
        break;

    case '/projeto/vetz/update-pet':
        (new PetController())->updatePet(); // Agora está certo, pois o ID vem do $_POST
        break;
<<<<<<< HEAD
        
    case '/projeto/vetz/cadastrar-vacina':
        (new VacinacaoController())->exibirFormulario();
        break;

    case '/projeto/vetz/salvar-vacina':
        (new VacinacaoController())->cadastrarVacina();
        break;

    case '/projeto/vetz/list-vacinas':
        (new VacinacaoController())->listVacina();
=======

    case '/projeto/vetz/update-pet':
        $controller = new PetController();
        $controller->updatePet(); // POST do formulário
        break;

    case '/projeto/vetz/delete-pet':
        $controller = new PetController();
        $controller->deletePetById(); // POST do formulário
        break;

    if (preg_match('#^/projeto/vetz/delete-pet/(\d+)$#', $request, $matches)) {
    $id = $matches[1];
    $controller = new PetController();
    $controller->deletePet($id);
    exit;
}

if (preg_match('#^/projeto/vetz/cadastrar-vacina/(\d+)$#', $request, $matches)) {
    $id = $matches[1];
    $controller = new VacinacaoController();
    $controller->cadastrarVacina($id);
    
    exit;
}

    case '/projeto/vetz/list-vacinas':
        $controller = new VacinacaoController();
        $controller->listVacina();
        break;

    case '/projeto/vetz/cadastrar-vacina':
            $controller = new VacinacaoController();
            $controller->cadastrarVacina();
            include '../views/vacinacao_form.php'; // Exibe o formulário de cadastro
        break;

    case '/projeto/vetz/cadastrar':
        $controller = new UsuarioController();
        $controller->cadastrar();
        break;

    case '/projeto/vetz/login':
        $controller = new UsuarioController();
        $controller->login();
        break;

    case '/projeto/vetz/enviarCodigo':
        $controller = new UsuarioController();
        $controller->enviarCodigo();
        break;

    case '/projeto/vetz/verificarCodigo':
        $controller = new UsuarioController();
        $controller->verificarCodigo();
        break;

    case '/projeto/vetz/redefinirSenha':
        $controller = new UsuarioController();
        $controller->redefinirSenha();
        break;

    case '/projeto/vetz/cadastrarei':
        $controller = new UsuarioController();
        $controller->cadastrar();
>>>>>>> parent of 44708da (Merge pull request #9 from camilla-ggoncalves/alteracoes-guilherme)
        break;

    case '/projeto/vetz/list-ficha':
        $controller = new FichaController();
        $controller->listFicha();
        break;


<<<<<<< HEAD
    case '/projeto/vetz/perfil-usuario':
        if (!isset($_GET['id'])) {
            echo "ID não especificado.";
            exit;
        }
        $controller = new UsuarioController();
        $usuario = $controller->perfil($_GET['id']);
        require_once '../views/usuario/perfil_usuario.php';
        break;

    case '/projeto/vetz/excluir-usuario':
        if (!isset($_GET['id'])) {
            echo "ID não especificado.";
            exit;
        }
        $controller = new UsuarioController();
        $sucesso = $controller->excluir($_GET['id']);
        echo $sucesso ? "Usuário excluído com sucesso." : "Erro ao excluir usuário.";
        break;

    case '/projeto/vetz/perfil':
        // Adicione a lógica se necessário
        break;
=======

>>>>>>> parent of 44708da (Merge pull request #9 from camilla-ggoncalves/alteracoes-guilherme)

    default:
        http_response_code(404);
        echo "Página não encontrada: $request";
        break;
}
