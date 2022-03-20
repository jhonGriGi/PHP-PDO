<?php
include_once '../../class/Paciente.control.php';

$opcionFormulario = isset($_GET['op']) ? $_GET['op'] : "";

if ($opcionFormulario != "") {
  switch ($opcionFormulario) {
    // el caso 1 es para insertar un paciente en la bdd
    case 1:
      // se reciben los datos que llegan por el POST del formulario
      $nombre = isset($_POST['txtNombre']) ? $_POST['txtNombre'] : "";
      $documento = isset($_POST['txtDocumento']) ? $_POST['txtDocumento'] : "";
      $fecha_nac = isset($_POST['txtFechaNacimiento']) ? $_POST['txtFechaNacimiento'] : "";
      $direccion = isset($_POST['txtDireccion']) ? $_POST['txtDireccion'] : "";
      $telefono = isset($_POST['txtTelefono']) ? $_POST['txtTelefono'] : "";
      $estado = isset($_POST['txtEstado']) ? $_POST['txtEstado'] : "";
      $genero = isset($_POST['txtGenero']) ? $_POST['txtGenero'] : "";
      $eps = isset($_POST['txtEps']) ? $_POST['txtEps'] : "";

      // Se crea una instancia de la clase PacienteControl
      $paciente_control = new PacienteControl();

      // crear Objeto paciente con los datos del formulario
      $paciente = new Paciente(
        $documento,
        $nombre,
        $direccion,
        $telefono,
        $fecha_nac,
        $estado,
        $genero,
        $eps
      );

      // Se llama al metodo que inserta en la base de datos
      // Se envia por parametros el objeto de la clase paciente
      $paciente_control->insertPaciente($paciente);
      header('Location: list_pacientes.php');
      break;
    
    case 3:
      $documento = isset($_POST['txtDocumento']) ? $_POST['txtDocumento'] : "";

      $paciente_control = new PacienteControl();

      $paciente_control->deletePaciente($documento);
      header('Location: list_pacientes.php');
      break;

    default:
      # No se eligio una opcion correcta
      break;
  }
}