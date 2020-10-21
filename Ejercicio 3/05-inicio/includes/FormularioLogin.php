<?php
require_once __DIR__.'/includes/config.php';
require_once __DIR__.'/includes/Usuario.php';

class FormularioLogin extends Form {

	public function __construct(){

	}

	protected function procesaFormulario($datos){
		$result = array();
		$nombreUsuario = isset($datos['nombreUsuario']) ? $datos['nombreUsuario'] : null;
		if(empty($nombreUsuario)){
			$result[] = "El nombre de usuario no puede estar vacío";
		}

		$password = isset($datos['password']) ? $datos['password'] : null;
		if(empty($password)){
			$result[] = "El password no puede estar vacío.";
		}

		if(count($result[]) === 0){
			$usuario = Usuario::buscaUsuario($nombreUsuario);

			if(!$usuario) {
				$result[] = "El usuario o el password no coinciden";
			}
			else{
				if($usuario->compruebaPassword($password)){
					$_SESSION['login'] = true;
					$_SESSION['nombre'] = $nombreUsuario;
					$_SESSION['esAdmin'] = strcmp($fila['rol'], 'admin') == 0 ? true : false;
					header('Location: index.php');
					exit();
				}
				else{
					$result[] = "El usuario o el password no coinciden";
				}
			}
		}

	}

	protected function generaCamposFormulario($datosIniciales){

		$nombreUsuario = '';
		if($datosIniciales) {
			$nombreUsuario = isset($datosIniciales['nombreUsuario']) ? $datosIniciales['nombreUsuario'] : $nombreUsuario;
		}

        $html = <<<EOF
        <fieldset>
        <legend>Usuario y contraseña</legend>
        <div class="grupo-control">
        <label>Nombre de usuario:</label>
        <input type="text" name="nombreUsuario" value="$nombreUsuario"/>
        </div>
        <div class="grupo-control">
        <label>Password:</label>
        <input type="password" name="password"/>
        </div>
        <div class="grupo-control">
        <button type="submit" name="login">Entrar</button>
        </div>
        </fieldset>
        EOF;

		return $html;
	}

}


?>