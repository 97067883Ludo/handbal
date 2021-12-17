<?php
function printMenu(){
echo '
<nav class="navbar navbar-expand-sm bg-light justify-content-center">
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="index.php">Lijst</a>
    </li>
    <li class="nav-item">
      <a class="nav-link btn btn-primary text-white" href="archive.php">Archief</a>
    </li>
    <li class="nav-item">
    <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#myModal">
    Bestand Uploaden
  </button>
      <!-- The Modal -->
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Modal Heading</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          Modal body..
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        </div>

      </div>
    </div>
  </div>
    </li>
  </ul>
</nav>
';
}

?>