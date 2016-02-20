<?php  

	require_once 'alumno.entidad.php';
	require_once 'alumno.model.php';

	//Logica
	$alm   = new Alumno();
	$model = new  AlumnoModel(); 

	if( isset($_REQUEST['action']) )
	{

		switch ( $_REQUEST['action'] ) {

			case 'actualizar':
				$alm->__SET('id',$_REQUEST['id']);
				$alm->__SET('Nombre',$_REQUEST['Nombre']);
				$alm->__SET('Apellido',$_REQUEST['Apellido']);
				$alm->__SET('Sexo',$_REQUEST['Sexo']);
				$alm->__SET('FechaNac',$_REQUEST['FechaNac']);

				$model->Actualizar($alm);
				header('Location: index.php');
				break;			

			case 'registrar':
				$alm->__SET('id',$_REQUEST['id']);
				$alm->__SET('Nombre',$_REQUEST['Nombre']);
				$alm->__SET('Apellido',$_REQUEST['Apellido']);
				$alm->__SET('Sexo',$_REQUEST['Sexo']);
				$alm->__SET('FechaNac',$_REQUEST['FechaNac']);

				$model->Registrar($alm);
				header('Location: index.php');
				break;			

			case 'eliminar':
				$model->Eliminar($_REQUEST['id']);
				header('Location: index.php');
				break;

			case 'editar':
				$alm = $model->Obtener($_REQUEST['id']);
				break;
			
			default:
				# code...
				break;

		} #end switch 
	} #end if 

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Pruba Crud</title>
</head>
<body>
	
	<form action="?action=<?= $alm->id > 0 ? 'actualizar' : 'registrar' ?>" method="POST">
		<input type="hidden" name="id" value="<?= $alm->__GET('id'); ?>">

		<table>
			<tr>
				<th>Nombre</th>
				<td><input required type="text" name="Nombre" value="<?= $alm->__GET('Nombre')  ?>" /></td>
			</tr>
			<tr>
				<th>Apellido</th>
				<td><input required type="text" name="Apellido" value="<?= $alm->__GET('Apellido')  ?>" /></td>
			</tr>
			<tr>
				<th>Sexo</th>
				<td>
					<select name="Sexo" id="Sexo">
						<option value="1" <?= $alm->__GET('Sexo') == 1 ? 'selected' : ''  ?> >Masculino</option>
						<option value="2"  <?= $alm->__GET('Sexo') == 2 ? 'selected' : ''  ?> >Femenino</option>
					</select>
				</td>
			</tr>
			<tr>
				<th>FechaNac</th>
				<td><input required type="text" name="FechaNac" value="<?= $alm->__GET('FechaNac')  ?>" /></td>
			</tr>
			<tr>
				<td colspan="2"><button type="submit">Guardar</button></td>
			</tr>
		</table>

		<table>
			<thead>
				<tr>
					<th>Nombre</th>
					<th>Apellido</th>
					<th>Sexo</th>
					<th>Nacimiento</th>
				</tr>
			</thead>
			<?php foreach( $model->Listar() as $r ) : ?>
				<tbody>
				<td><?= $r->__GET('Nombre'); ?></td>
				<td><?= $r->__GET('Apellido'); ?></td>
				<td><?= $r->__GET('Sexo') == 1 ? 'H' : 'F' ?></td>
				<td><?= $r->__GET('FechaNac'); ?></td>
				<td><a href="?action=editar&id=<?= $r->id ?>">Editar</a></td>
				<td><a href="?action=eliminar&id=<?= $r->id ?>">Eliminar</a></td>
				</tbody>
			<?php endforeach; ?>
		</table>

	</form>

	
</body>
</html>