<?php 

class AlumnoModel{

	private $pdo;

	public function __construct(){
		try{

			$this->pdo = new PDO('mysql:host=localhost;dbname=alumnos','root','');

			$this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

		}catch( Exception $e){ die($e->getMessage() ); }

	}

	public function Listar()
	{
		try{

			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM alumnos");
			$smt->execute();
			$res = $smt->fetchAll(PDO::FETCH_OBJ);

			foreach ( $res as $r ) {

				$alm = new Alumno();
				$alm->__SET('id',$r->id);
				$alm->__SET('Nombre',$r->Nombre);
				$alm->__SET('Apellido',$r->Apellido);
				$alm->__SET('Sexo',$r->Sexo);
				$alm->__SET('FechaNac',$r->FechaNac);

				$result[] = $alm;
			}

			return $result;


		}catch( Exception $e ){ die($e->getMessage()); }
	}

	public function Obtener($id)
	{

		try{

			$stm = $this->pdo->prepare("SELECT * FROM alumnos WHERE id= ? ");
			$stm->execute( array($id) );
			$res = $stm->fetchAll(PDO::FECTH_OBJ);

			$alm = new Alumno();

			$alm->__SET('Nombre', $res->Nombre );
			$alm->__SET('Apellido', $res->Apellido );
			$alm->__SET('Sexo', $res->Sexo );
			$alm->__SET('FechaNac', $res->FechaNac );

			return $alm;

		}catch( Exception $e ){ die( $e->getMessage() ); }


	}





}








 ?>