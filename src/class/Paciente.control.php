<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/PHP-PDO/src/core/Connection.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/PHP-PDO/src/class/Paciente.class.php';

class PacienteControl extends Connection
{
  public function __construct()
  {
    // Se llama al constructor de la clase Padre
    parent::__construct();
  }

  public function list_paciente()
  {
    // Fetch_OBJ
    $sql = $this->dbConnection->prepare("SELECT * FROM paciente");

    // ejecutamos
    $sql->execute();

    // Ahora vamos a indicar el fetch mode cuando llamamos a fetch:
    while ($row = $sql->fetch(PDO::FETCH_OBJ))
    {
      echo "Nombre: " . $row->nombre . "<br>";
      echo "Documento: " . $row->documento . "<br>";
      echo "Direccion: " . $row->direccion . "<br>";
      echo "Telefono: " . $row->telefono . "<br>";
      echo "Fecha Nacimiento: " . $row->fecha_nacimiento . "<br>";
      echo "Estado: " . $row->estado . "<br>";
      echo "EPS: " . $row->eps . "<br>";
      echo "****************************************<br><br>";
    }
  }

  public function list_paciente2()
  {
    // Fetch Obj
    $sql = $this->dbConnection->prepare("SELECT * FROM paciente");

    // Ejecutamos
    $sql->execute();

    // Vector de pacientes
    $array_paciente = array();

    // Ahora vamos a indicar el Fetch mode cuando llamamos a fetch:
    while ($row = $sql->fetch(PDO::FETCH_OBJ))
    {
      $pac_obj = new Paciente(
        $row->documento,
        $row->nombre,
        $row->direccion,
        $row->telefono,
        $row->fecha_nacimiento,
        $row->estado,
        $row->genero,
        $row->eps
      );

      // Crear un vector de objetos de la clase paciente
      $array_paciente[] = $pac_obj;
    }

    // Se retorna el vector de pacientes
    return $array_paciente;
  }

  public function insertPaciente(Paciente $pac_obj)
  {
    // Se prepara la consulta para insertar un paciente en la BD
    $sql = $this->dbConnection->prepare("INSERT INTO paciente
    (documento, nombre, direccion, telefono, fecha_nacimiento, estado, genero, eps) VALUES (?,?,?,?,?,?,?,?);");

    $documento = $pac_obj->getDocumento();
    $nombre = $pac_obj->getNombre();
    $direccion = $pac_obj->getDireccion();
    $telefono = $pac_obj->getTelefono();
    $fecha_nacimiento = $pac_obj->getFechaNacimiento();
    $estado = $pac_obj->getEstado();
    $genero = $pac_obj->getGenero();
    $eps = $pac_obj->getEps();

    $sql->bindParam(1, $documento);
    $sql->bindParam(2, $nombre);
    $sql->bindParam(3, $direccion);
    $sql->bindParam(4, $telefono);
    $sql->bindParam(5, $fecha_nacimiento);
    $sql->bindParam(6, $estado);
    $sql->bindParam(7, $genero);
    $sql->bindParam(8, $eps);

    // Execute 
    $sql->execute();
  }

  public function selectPaciente($documento)
  {
    // Fetch obj
    $sql = $this->dbConnection->prepare("SELECT * 
    FROM paciente 
    WHERE documento  = ?");
    $sql->bindParam(1, $documento);
    // ejecutamos
    $sql->execute();

    // ahora vamos a indicar el fetch mode cuando llamamos a fetch
    if ($row = $sql->fetch(PDO::FETCH_OBJ)) {
      // creacion de objeto de la clase paciente 
      $pac_obj = new Paciente(
        $row->documento,
        $row->nombre,
        $row->direccion,
        $row->telefono,
        $row->fecha_nacimiento,
        $row->estado,
        $row->genero,
        $row->eps
      );
    } else {
      $pac_obj = null;
    }
    // se retorna el objeto del paciente
    return $pac_obj;
  }

  public function deletePaciente($documento)
  {
    $sql = $this->dbConnection->prepare("DELETE FROM paciente 
    WHERE documento = ?");
    $sql->bindParam(1, $documento);
    $sql->execute();
  }
}