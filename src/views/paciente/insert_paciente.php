
  <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/PHP-PDO/src/views/templates/header/header.php' ?>
  <form action="pacienteProcess.php?op=1" method="POST">
    <div class="form-group">
      <label class="label" for="user-name">Nombre del Paciente</label>
      <input type="text" id="user-name">
    </div>
  </form>
