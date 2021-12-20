<?php
function printMenu(){
echo '
<nav class="navbar navbar-expand-sm bg-light justify-content-center">
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="btn btn-primary" href="index.php">Lijst</a>
    </li>
    <li class="nav-item button">
      <a class="btn btn-primary" href="archive.php">Archief</a>
    </li>
    <li class="nav-item">
      <a class="btn btn-primary" href="#" data-bs-toggle="modal" data-bs-target="#myModal">NieuweLijst</a>
          <!-- The Modal -->
      <div class="modal" id="myModal">
        <div class="modal-dialog">
          <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Nieuwe lijst uploaden</h4>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
              <form action="upload.php" method="post" enctype="multipart/form-data">
                
                <input type="file" name="fileToUpload" id="fileToUpload">
                <input type="submit" value="Upload Image" name="submit">
              </form>
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