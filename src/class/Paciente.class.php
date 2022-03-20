<?php
class Paciente 
{
  private $documento;
  private $nombre;
  private $direccion;
  private $telefono;
  private $fecha_nacimiento;
  private $estado;
  private $genero;
  private $eps;

  public function __construct(
    $documento = null,
    $nombre = null,
    $direccion = null,
    $telefono = null,
    $fecha_nacimiento = null,
    $estado = null,
    $genero = null,
    $eps = null
  ) 
  {
    $this->documento = $documento;
    $this->nombre = $nombre;
    $this->direccion = $direccion;
    $this->telefono = $telefono;
    $this->fecha_nacimiento = $fecha_nacimiento;
    $this->estado = $estado;
    $this->genero = $genero;
    $this->eps = $eps;
  }

  // Setters and Getters
  public function getDocumento()
  {
    return $this->documento;
  }

  public function setDocumento($documento)
  {
    $this->documento = $documento;
    return $this;
  }

  public function getNombre()
  {
    return $this->nombre;
  }

  public function setNombre($nombre)
  {
    $this->nombre = $nombre;
    return $this;
  }

  public function getDireccion()
  {
    return $this->direccion;
  }

  public function setDireccion($direccion)
  {
    $this->direccion = $direccion;
    return $this;
  }

  public function getTelefono()
  {
    return $this->telefono;
  }

  public function setTelefono($telefono)
  {
    $this->telefono = $telefono;
    return $this;
  }

  public function getFechaNacimiento()
  {
    return $this->fecha_nacimiento;
  }

  public function setFechaNacimiento($fecha_nacimiento)
  {
    $this->fecha_nacimiento = $fecha_nacimiento;
    return $this;
  }

  public function getEstado()
  {
    return $this->estado;
  }

  public function setEstado($estado)
  {
    $this->estado = $estado;
    return $this;
  }

  public function getGenero()
  {
    return $this->genero;
  }

  public function setGenero($genero)
  {
    $this->genero = $genero;
    return $this;
  }

  public function getEps()
  {
    return $this->eps;
  }

  public function setEps($eps)
  {
    $this->eps = $eps;
    return $this;
  }
}
?>