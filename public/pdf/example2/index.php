  <?php
    
    function getPlantilla(){
    require '../config/database.php';
    $objeto = new Conexion();
    $conexion = $objeto->Conectarse();
    
    //SQL Categorias
    $sql = 'SELECT * FROM categorias';
    $statement = $conexion->prepare($sql);
    $statement->execute();
    $categorias = $statement->fetchAll(PDO::FETCH_OBJ);

    //SQL Fabricantes
    $sql2 = 'SELECT * FROM marcas';
    $statement2 = $conexion->prepare($sql2);
    $statement2->execute();
    $fabricantes = $statement2->fetchAll(PDO::FETCH_OBJ);

    //SQL DISPOSITIVO
    $sql3 ='SELECT id_productos, nombre_productos, modelo, serie, fecha_alta, fecha_baja, activo, c.nombre_categorias, b.nombre_marca, c.nombre_categorias, d.username
	          FROM   productos as a, marcas as b, categorias as c, usuarios as d 
	          WHERE  a.id_marca=b.id_marca and a.id_categorias=c.id_categorias and a.id_usuario=d.id_usuario';
    $statement3 = $conexion->prepare($sql3);
    $statement3->execute();
    $productos = $statement3->fetchAll(PDO::FETCH_OBJ);

    $plantilla =  '<body>
    <header class="clearfix">
      <div id="logo">
        <img src="../public/pdf/example2/sat.png" width="138" height="138">
      </div>
      <div id="company">
        <h2 class="name">Sistema de Administración Tributaria</h2>
        <div>Av. Paseo tabasco 1203, edificio de la torre empresarial</div>
        <div>Servicios financieros</div>
        <div><a href="mailto:francisco.ruiz@sat.gob.mx">francisco.ruiz@sat.gob.mx</a></div>
      </div>
      </div>
    </header>
    <main>

        <div id="invoice">
          <h1>CATEGORÍAS</h1><br>
        </div>
      </div>
      <table border="0" cellspacing="0" cellpadding="0">
        <thead>
          <tr>
            <th class="no">#</th>
            <th class="desc">NOMBRE DE LA CATEGORÍA </th>
            <th class="qty">ESTADO</th>
          </tr>
        </thead>
        <tbody>';

  foreach($categorias as $cate){
    if(($cate -> activo_categorias) == 1){$activocate ="Disponible";}else{$activocate="No disponible";}
    $count = $count+1;
          $plantilla .= '<tr>
            <td class="no"><center>'.$count.'</center></td>
            <td class="desc">'.$cate -> nombre_categorias.'</td>
            <td class="qty"><center>'. $activocate.'<center></td>
          </tr>';

        }
        $plantilla .= '</tbody>
      </table><br><br><br><br><br><br>

      <div id="invoice">
      <h1>FABRICANTES</h1><br>
    </div>
  </div>
  <table border="0" cellspacing="0" cellpadding="0">
    <thead>
      <tr>
        <th class="no">#</th>
        <th class="desc">NOMBRE DEL FABRICANTE </th>
        <th class="qty">ESTADO</th>
      </tr>
    </thead>
    <tbody>';


foreach($fabricantes as $fabri){
  if(($fabri -> activo_marca) == 1){$activomarca ="Disponible";}else{$activomarca="No disponible";}
  $count2 = $count2+1;
      $plantilla .= '<tr>
        <td class="no"><center>'.$count2.'</center></td>
        <td class="desc">'.$fabri -> nombre_marca.'</td>
        <td class="qty"><center>'.$activomarca.'<center></td>
      </tr>';

    }
    $plantilla .= '</tbody>
  </table><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

  <div id="invoice">
  <h1>DISPOSITIVOS</h1><br>
</div>
</div>
<table border="0" cellspacing="0" cellpadding="0">
<thead>
  <tr>
    <th class="no">#</th>
    <th class="desc">NOMBRE </th>
    <th class="desc">MARCA </th>
    <th class="desc">MODELO</th>
    <th class="desc">SERIE</th>
    <th class="desc">TIPO</th>
    <th class="desc">FECHA ALTA</th>
    <th class="desc">USUARIO</th>
  </tr>
</thead>
<tbody>';


foreach($productos as $produc){
  $count3 = $count3+1;
  $plantilla .= '<tr>
    <td class="no"><center>'.$count3.'</center></td>
    <td class="desc">'.$produc -> nombre_productos.'</td>
    <td class="desc">'.$produc -> nombre_marca.'</td>
    <td class="desc">'.$produc -> modelo.'</td>
    <td class="desc">'.$produc -> serie.'</td>
    <td class="desc">'.$produc -> nombre_categorias.'</td>
    <td class="desc">'.$produc -> fecha_alta.'</td>
    <td class="desc">'.$produc -> username.'</td>
  </tr>';

}
$plantilla .= '</tbody>
</table>
    </main>
    <footer>
      <center>
      Sistema de administración de activos - SAT 
      </center>    
    </footer>
  </body>';

  return $plantilla;
    }