<?php  

class Alumno{

	private $id;
	private $Nombre;
	private $Apellido;
	private $Sexo;
	private $FechaNav;

	public function __GET( $k ){
		return $this->$k;
	}

	public function __SET( $k , $v ){
		return $this->$k = $v;
	} 

}

?>