<?php
//print_r($_POST);

require_once("../configuracion.php");
include('../conexionBD.php');

$accion = $_POST['accion'];
$IDAdmin = $_POST['txtIDAdmin'];
$Contrasena = $_POST['txtContrasena'];

$query = "SELECT IDAdmin, Usuario, Correo, Contrasena FROM administradores WHERE IDAdmin='$IDAdmin' AND Contrasena='$Contrasena'";

if($accion == "login")
{
		if(!$resultado = mysqli_query($miConexion,$query))
		{  
		?>
		
			<center>
				<h2>Error al intentar Iniciar sesi&oacute;n</h2>
				<h2><?=mysqli_error($miConexion)?></h2>
				<input type="button" value="Ir al formulario de inicio de sesi&oacute;n" onclick=self.location="<?=ROOTURL?>" />
			</center>
					
<?php	}else{
			$datosUsuario = mysqli_fetch_assoc($resultado);
			print_r($datosUsuario);
			if($IDAdmin==$datosUsuario['IDAdmin'] && $Contrasena==$datosUsuario['Contrasena'] && mysqli_num_rows($resultado)>0){
				
					//aquí se crea mi variable de sesión para ingresar a mi sistema de información
					$_SESSION['admin_session']=$datosUsuario;
					
					//print_r($_SESSION);
				?>
				<center>
					<h2>Usuario autorizado para ingresar</h2>
					<input type="button" value="Ir a la p&aacute;gina principal" onclick=self.location="<?=ROOTURL?>" />
				</center>
				
<?php			header("Location: ".ROOTURL); 
				}else{ ?>
					<center>
						<h2>Usuario no autorizado para ingresar o datos incorrecto</h2>
						<input type="button" value="Ir al formulario de inicio de sesi&oacute;n" onclick=self.location="<?=ROOTURL?>" />
					</center>
	
<?php				}
			
		}
}
?>