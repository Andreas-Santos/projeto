<?php
switch ($_REQUEST["acao"]) {
  case 'cadastrar':
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = md5($_POST['senha']);
    $data_nasc = $_POST['data_nasc'];

    $sql = "INSERT INTO usuarios (nome, email, senha, data_nasc)
              VALUES ('{$nome}', '{$email}', '{$senha}', '{$data_nasc}')";

    $res = $conn->query($sql);
    if ($res) {
      echo "<script>alert('Cadastro realizado com sucesso!');</script>";
      echo "<script>location.href='?page=listar';</script>";
    } else {
      echo "<script>alert('Não foi possível realizar o cadastro!');</script>";
      echo "<script>location.href='?page=listar';</script>";
    }

    break;

  case 'editar':
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = md5($_POST['senha']);
    $data_nasc = $_POST['data_nasc'];

    $sql = "UPDATE usuarios SET
              nome='{$nome}',
              email='{$email}',
              senha='{$senha}',
              data_nasc='{$data_nasc}'
            WHERE 
              id=". $_REQUEST["id"];

    $res = $conn->query($sql);
    if ($res) {
      echo "<script>alert('Editado com sucesso!');</script>";
      echo "<script>location.href='?page=listar';</script>";
    } else {
      echo "<script>alert('Não foi possível editar o cadastro!');</script>";
      echo "<script>location.href='?page=listar';</script>";
    }

    break;

  case 'excluir':
    $id = $_REQUEST['id'];

    $sql = "DELETE FROM usuarios WHERE id=$id";

    $res = $conn->query($sql);

    if($res) {
      echo "<script>alert('Usuário deletado com sucesso!');</script>";
      echo "<script>location.href='?page=listar';</script>";
    }
    else {
      echo "<script>alert('Não foi possível deletar usuário!');</script>";
      echo "<script>location.href='?page=listar';</script>";
    }

    break;

  default:
    break;
}
