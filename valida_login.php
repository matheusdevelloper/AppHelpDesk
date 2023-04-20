<?php

    session_start();
    $usuario_autenticado = false;
    $_SESSION['autenticado'] = 'NAO';
    $usuario_id = null;
    $usuario_perfil_id = null;
    $perfis = array(1 => 'Administrativo', 2 => 'Usuário');

    $usuarios_app = array(
        array('id' => 1 ,'email' => 'adm@teste.com.br', 'senha' => '1234', 'perfil_id' => 1),
        array('id' => 2 ,'email' => 'yser@teste.com.br', 'senha' => '1234', 'perfil_id' => 1),
        array('id' => 3 ,'email' => 'jose@teste.com.br', 'senha' => '1234', 'perfil_id' => 2),
        array('id' => 4 ,'email' => 'maria@teste.com.br', 'senha' => '1234', 'perfil_id' => 2),
    );

    

    //Verificação dos dados de email e senha do usuario.
    foreach($usuarios_app as $user){
        
        if($_POST['email'] == $user['email'] && $_POST['senha'] == $user['senha']){

            $usuario_autenticado = true;
            $usuario_id = $user['id'];
            $_SESSION['perfil_id'] = $usuario_perfil_id;
            $usuario_perfil_id = $user['perfil_id'];  
        }
      
    }
      
    //Autenticação do usuário de ligin e senha
    //Caso autenticação for true a pagina será redirecionado para pagina home.
    if($usuario_autenticado){
        
        // echo "usuario autenticado.";
       
        $_SESSION['autenticado'] = 'SIM';
        $_SESSION['id'] = $usuario_id;
        $_SESSION['perfil_id'] = $usuario_perfil_id;
        header('Location: home.php');
        
    }else {
        $_SESSION['autenticado'] = 'NAO';
        header('Location: index.php?login=erro');

    }

   
    
?>