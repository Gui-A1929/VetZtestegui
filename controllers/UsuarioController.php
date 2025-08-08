<?php


require_once '../models/Usuario.php';

require_once __DIR__ . '/../models/Usuario.php';



class UsuarioController {
    private $model;

    public function __construct() {
        $this->model = new Usuario();
    }

    public function cadastrar() {
       
        $dados = $_POST;
        $ok = $this->model->cadastrar($dados['nome'], $dados['email'], $dados['senha']);
        if ($ok) {
            header('Location: login.php');
            exit;
        } else {
            echo "Erro ao cadastrar.";
        }
    }
    

    public function login() {
        //$email = $_POST['email'];
        //$senha = $_POST['senha'];
        $usuario = $this->model->autenticar($email, $senha);
        if ($usuario) {
            // Aqui você pode iniciar a sessão e redirecionar para o perfil
            session_start();
            $_SESSION['usuario'] = $usuario;
            header('Location: perfil.html');
            exit;
        } else {
            echo "Credenciais inválidas.";
        }
    }

    public function enviarCodigo() {
        $email = $_POST['email'];
        $codigo = rand(100000, 999999);
        $this->model->salvarCodigo($email, $codigo);
        echo "Código enviado: $codigo (simulação de envio)";
    }

    public function verificarCodigo() {
        $email = $_POST['email'];
        $codigo = $_POST['codigo'];
        $valido = $this->model->verificarCodigo($email, $codigo);
        echo $valido ? "Código verificado!" : "Código inválido ou expirado.";
    }

    public function redefinirSenha() {
        $email = $_POST['email'];
        $novaSenha = $_POST['nova_senha'];
        $ok = $this->model->redefinirSenha($email, $novaSenha);
        echo $ok ? "Senha alterada com sucesso!" : "Erro ao alterar senha.";
    }
<<<<<<< HEAD



        public function perfil($id) {
            $usuarioModel = new Usuario();
            return $usuarioModel->buscarPorId($id);
        }

        public function atualizar($dados, $file) {
            $usuarioModel = new Usuario();

            $imagem = null;
            if (isset($file['imagem']) && $file['imagem']['error'] === UPLOAD_ERR_OK) {
                $imagem = basename($file['imagem']['name']);
                move_uploaded_file($file['imagem']['tmp_name'], '../uploads/' . $imagem);
            }

            return $usuarioModel->atualizar($dados['id'], $dados['nome'], $dados['email'], $dados['senha'], $imagem);
        }

        public function excluir($id) {
            $usuarioModel = new Usuario();
            return $usuarioModel->excluir($id);
        }
    }
?>
=======
>>>>>>> parent of 44708da (Merge pull request #9 from camilla-ggoncalves/alteracoes-guilherme)

    public function listUsuario() {
        $usuario = new Usuario();
        $usuarios = $usuario->getAll();
        include '../views/usuario_list.php';
    }

<<<<<<< HEAD
=======
    public function showUpdateForm($id) {
        $usuarioModel = new Usuario();
        $usuario = $usuarioModel->getById($id);

        if ($usuario) {
            include '../views/update_usuario.php';
        } else {
            echo "Usuário não encontrado.";
        }
    }
>>>>>>> parent of 44708da (Merge pull request #9 from camilla-ggoncalves/alteracoes-guilherme)

    public function updateUsuario($id) {
        $usuario = new Usuario();
        $usuario->id = $id;
        $usuario->nome = $_POST['nome'];
        $usuario->email = $_POST['email'];
        $usuario->senha = $_POST['senha'];

        if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
            $extensao = pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION);
            $nomeImagem = uniqid() . '.' . $extensao;
            $caminhoDestino = __DIR__ . '/../uploads/' . $nomeImagem;

            if (move_uploaded_file($_FILES['imagem']['tmp_name'], $caminhoDestino)) {
                $usuario->imagem = $nomeImagem;
            }
        } else {
            $usuario->imagem = ''; // Mantenha imagem atual se não enviar nova
        }

        if ($usuario->update()) {
            header('Location: /projeto/vetz/list-usuario');
            exit;
        } else {
            echo "Erro ao atualizar o usuário.";
        }
    }
}