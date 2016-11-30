<?php
include "header.php";
include "config.php";
session_start();
	if($_SESSION["IDUtente"] == 1){ //Informazioni utente loggato, 1 = root
		$queryUtente = "SELECT * FROM Utenti 
    WHERE Utenti.IDUtente = " .$_SESSION["IDUtente"] .";";
		$query = $conn->query($queryUtente); //manda la query al DB
		if($query->num_rows){
      $arrayUtente = mysqli_fetch_array($query, MYSQLI_ASSOC);
    }

    //Informazioni relative alle camere prenotate
    $infoPren = "SELECT * FROM prenotazioni p, dottori d 
    WHERE p.IDDottore =  d.IDDottore AND p.Confermata = 1 ORDER BY DataInizio;";
    $queryPren = $conn->query($infoPren);
    $arrayPren = mysqli_fetch_all($queryPren, MYSQLI_ASSOC);

    //Informazioni relative alle camere NON prenotate
    $infoNotPren = "SELECT * FROM prenotazioni p, dottori d 
    WHERE p.IDDottore =  d.IDDottore AND p.Confermata = 0 ORDER BY DataInizio;";
    $queryNotPren = $conn->query($infoNotPren);
    $arrayNotPren = mysqli_fetch_all($queryNotPren, MYSQLI_ASSOC);

    //Informazioni relative ai dottori
    $infoDottori = "SELECT * FROM dottori d;";
    $queryInfoDottori = $conn->query($infoDottori);
    $arrayDottori = mysqli_fetch_all($queryInfoDottori, MYSQLI_ASSOC);
    
    //Informazioni relative alle camere
    $infoCamere = "SELECT * FROM camere c;";
    $queryInfoCamere = $conn->query($infoCamere);
    $arrayCamere = mysqli_fetch_all($queryInfoCamere, MYSQLI_ASSOC);
    ?>


    <body>
      <div class="container-fluid">
        <br>
        <div class="box">
         <h1 align="center"> 
          Pannello di controllo Admin
          <img src="img/admin.png" class="img-responsive center-block" height="80" width="80" alt="admin"> 
        </h1>
        <h3> 
          <?php
          echo "&nbsp; Benvenuto " . ucfirst($arrayUtente['Username']);
          ?>
          <a href="logout.php" class="btn btn-primary btn-sm">
            <span class="glyphicon glyphicon-log-out"></span> Log out
          </a>
        </h3>


        <div id="exTab2">  
          <ul class="nav nav-tabs">
            <li>
              <a href="#1" data-toggle="tab"> Visualizza Prenotazioni </a>
            </li>
            <li>
              <a href="#2" data-toggle="tab"> Richiedi Prenotazione </a>
            </li>
            <li>
              <a href="#3" data-toggle="tab"> Conferma Prenotazioni </a>
            </li>   
            <li>
              <a href="#4" data-toggle="tab"> Nuovo Dottore </a>
            </li>          
            <li>
              <a href="#5" data-toggle="tab"> Nuova Camera </a>
            </li>
          </ul>

          <div class="tab-content ">
            <div class="tab-pane" id="1">
             <h3> Camere prenotate. </h3>
             <table class="table table-striped">
              <thead class="thead-inverse">
                <tr>
                  <th>IDPrenotazione</th>
                  <th>DataInizio</th>
                  <th>DataFine</th>
                  <th>IDCamera</th>
                  <th>Dottore</th>
                </tr>
              </thead>
              <tbody>
                <?php
                for($x = 0; $x < sizeof($arrayPren); $x++){
                  ?>
                  <tr>
                    <th scope="row"><?php echo $arrayPren[$x]["IDPrenotazione"] ?></th>
                    <td><?php echo $arrayPren[$x]["DataInizio"] ?></td>
                    <td><?php echo $arrayPren[$x]["DataFine"] ?></td>
                    <td><?php echo $arrayPren[$x]["IDCamera"] ?></td>
                    <td><?php echo $arrayPren[$x]["Nome"] . " ". $arrayPren[$x]["Cognome"] ?></td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>

            <div class="tab-pane" id="2">
              <form method="POST" action="inviaPrenotazione.php">
                <div class="form-group">
                  <label for="Dottori"> Dottori </label>
                  <select name ="Dottori" class="form-control" id="Dottori">
                    <?php
                    for($x = 0; $x < sizeof($arrayDottori); $x++){
                      ?>
                      <option value=<?php echo $arrayDottori[$x]["IDDottore"] ?>>

                        <?php echo $arrayDottori[$x]["Nome"] . " ". $arrayDottori[$x]["Cognome"] ?>

                      </option>
                      <?php } ?>

                    </select>
                  </div>
                  <div class="form-group">
                    <label for="Camere"> Camere </label>
                    <select name="Camere" class="form-control" id="Camere">
                     <?php
                     for($x = 0; $x < sizeof($arrayCamere); $x++){
                      ?>
                      <option value=<?php echo $arrayCamere[$x]["IDCamera"] ?>>

                        <?php echo " IDCamera ".$arrayCamere[$x]["IDCamera"] . " - Posti Letto ". $arrayCamere[$x]["PostiLetto"] ?>
                        
                      </option>
                      <?php } ?>
                    </select>  
                  </div>
                  <div class="form-group row">
                    <label for="example-date-input" class="col-xs-2 col-form-label">DataInizio</label>
                    <div class="col-xs-10">
                      <input name="DataInizio" class="form-control" type="date" value="2016-11-02" id="example-date-input">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="example-date-input" class="col-xs-2 col-form-label">DataFine</label>
                    <div class="col-xs-10">
                      <input name="DataFine" class="form-control" type="date" value="2016-11-03" id="example-date-input">
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary">Invia Prenotazione</button>
                </form>
              </div>

              <div class="tab-pane" id="3">
               <h3> Camere in attesa di conferma di prenotazione. </h3>
               <table class="table table-striped">
                <thead class="thead-inverse">
                  <tr>
                    <th>IDPrenotazione</th>
                    <th>DataInizio</th>
                    <th>DataFine</th>
                    <th>IDCamera</th>
                    <th>Dottore</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  for($x = 0; $x < sizeof($arrayNotPren); $x++){
                    ?>
                    <tr>
                      <th scope="row"><?php echo $arrayNotPren[$x]["IDPrenotazione"] ?></th>
                      <td><?php echo $arrayNotPren[$x]["DataInizio"] ?></td>
                      <td><?php echo $arrayNotPren[$x]["DataFine"] ?></td>
                      <td><?php echo $arrayNotPren[$x]["IDCamera"] ?></td>
                      <td><?php echo $arrayNotPren[$x]["Nome"] . " ". $arrayNotPren[$x]["Cognome"] ?></td>
                      <td>
                        <a href="confermaPrenotazione.php?ID=<?php echo $arrayNotPren[$x]["IDPrenotazione"] ?> ">
                          <button type="submit" class="btn btn-primary"> Conferma </button>
                        </a>
                        
                        <a href="rifiutaPrenotazione.php?ID=<?php echo $arrayNotPren[$x]["IDPrenotazione"] ?> ">
                          <button type="submit" class="btn btn-danger"> Rifiuta </button>
                        </a>
                      </td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>

              <div class="tab-pane" id="4">
                <form method="POST" action="nuovoDottore.php">
                  <div class="form-group row">
                    <br>
                    <label for="Nome" class="col-xs-2 col-form-label">Nome</label>
                    <div class="col-xs-10">
                      <input class="form-control" name="Nome" type="text" id="Nome">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="Dottore-Cognome" class="col-xs-2 col-form-label"> Cognome </label>
                    <div class="col-xs-10">
                      <input class="form-control" type="text" name="Cognome" id="Dottore-Cognome">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="Dottore-Nascita" class="col-xs-2 col-form-label"> Data di nascita </label>
                    <div class="col-xs-10">
                      <input class="form-control" name="Nascita" type="date" value="2016-10-20" id="Dottore-Nascita">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="Dottore-Telefono" class="col-xs-2 col-form-label">Telefono</label>
                    <div class="col-xs-10">
                      <input class="form-control" name="Telefono" type="tel" value="30" id="Dottore-Telefono">
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary"> Inserisci nuovo Dottore </button>
                </form>
              </div>

              <div class="tab-pane" id="5">
                <form method="POST" action="nuovaCamera.php">
                  <div class="form-group row">
                    <br>
                    <label for="Camera" class="col-xs-2 col-form-label">Camera</label>
                    <div class="col-xs-10">
                      <input class="form-control" name="Camera" type="text" id="Camera">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="PostiLetto" class="col-xs-2 col-form-label">PostiLetto</label>
                    <div class="col-xs-10">
                      <input class="form-control" name="PostiLetto" type="number" value="20" id="PostiLetto">
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary"> Inserisci nuova Camera </button>
                </form>
              </div>

              <br>
            </div>
          </div>

        </div>
        <br>
      </div>
    </body>

    <?php


  }

  else{
   header("location: index.php");
 }
 ?>