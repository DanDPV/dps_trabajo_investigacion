<?php
class conexion
{
  function conectar(){
    return mysqli_connect('localhost','root','','fleamarket_db');
  }

  function desconectar($conexion){
    mysqli_close($conexion);
  }

  function login($login, $password){
    $conn = $this->conectar();
    $query = $conn -> query ("select id, userType from cliente where username='".$login."' and Password='".$password."'");
    $i=0;
    $id=0;
    while($valores=mysqli_fetch_array($query)){
        $i++;
        $id=$valores['userType'];
    }
    $this->desconectar($conn);
    if($i>0)
      return $id;
    else
      return 0;
  }

  function registrar($name, $lastname, $email, $username, $password, $telefono, $direccion, $dui, $img, $usertype='cliente'){
    $conn = $this->conectar();

    try {
      $conn -> query("insert into cliente (`Nombres`, `Apellidos`, `Email`, `username`, `Password`, `Telefono`, `Direccion`, `DUI`, `avatar`, `userType`) values  ('".$name."','".$lastname."','".$email."','".$username."', '".$password."', '".$telefono."', '".$direccion."', '".$dui."', '".$img."', '".$usertype."')");
    } catch (Exception $e) {
      echo "<script language='javascript'>console.log($e)</script>";
    }


    $this->desconectar($conn);
  }

  function getVentas(){
    $conn = $this->conectar();

    $query=$conn->query("select pr.img, pr.Nombre, t.talla, dc.cantidad, c.Monto, c.Fecha, concat(cl.Nombres,' ',cl.Apellidos) 'Cliente', concat(se.Nombres,' ',se.Apellidos) 'Seller' from compra_fin cf inner join compra c on c.id=cf.idCompra inner join detalle_compra dc on dc.id=cf.idDetalle inner join cliente cl on cl.id=c.idCliente inner join productotalla pt on pt.id=dc.idProd inner join rieles pr on pr.id=pt.idProd inner join tallas t on t.id=pt.idTalla inner join cliente se on se.id=pr.idSeller");

    $rows=array();

    while($r=mysqli_fetch_array($query)){
      $json=array(
        'img'=>$r['img'],
        'nombre'=>$r['Nombre'],
        'cantidad'=>$r['cantidad'],
        'monto'=>$r['Monto'],
        'fecha'=>$r['Fecha'],
        'vendedor'=>$r['Seller'],
        'comprador'=>$r['Cliente'],
        'talla'=>$r['talla']
      );

      $rows[]=$json;
    }
    $this->desconectar($conn);
    return $rows;
  }

  function getVentasSeller($id){
    $conn = $this->conectar();

    $query=$conn->query("select pr.img, pr.Nombre, t.talla, dc.cantidad, c.Monto, c.Fecha, concat(cl.Nombres,' ',cl.Apellidos) 'Cliente', concat(se.Nombres,' ',se.Apellidos) 'Seller' from compra_fin cf inner join compra c on c.id=cf.idCompra inner join detalle_compra dc on dc.id=cf.idDetalle inner join cliente cl on cl.id=c.idCliente inner join productotalla pt on pt.id=dc.idProd inner join rieles pr on pr.id=pt.idProd inner join tallas t on t.id=pt.idTalla inner join cliente se on se.id=pr.idSeller where se.username='$id'");

    $rows=array();

    while($r=mysqli_fetch_array($query)){
      $json=array(
        'img'=>$r['img'],
        'nombre'=>$r['Nombre'],
        'cantidad'=>$r['cantidad'],
        'monto'=>$r['Monto'],
        'fecha'=>$r['Fecha'],
        'vendedor'=>$r['Seller'],
        'comprador'=>$r['Cliente'],
        'talla'=>$r['talla']
      );

      $rows[]=$json;
    }
    $this->desconectar($conn);
    return $rows;
  }

  function newRiel($data){

    $conn = $this->conectar();
    try{
      $cadena="insert into rieles (`Nombre`, `idMarca`, `idSeller`, `Precio`, `img`, `Descripcion`, `Materiales`) values ('".$data['nombre']."',".$data["marca"].",".$data['seller'].",".$data['precio'].",'".$data['img']."','".$data['desc']."', '".$data['mat']."')";
      $conn->query($cadena);
      $query=$conn->query("select id from rieles where nombre='".$data['nombre']."' and idSeller='".$data['seller']."' order by id DESC limit 1");
      $aux=mysqli_fetch_array($query);
      foreach ($data['tallas'] as $key) {
         $cadena="insert into productotalla (`idProd`, `idTalla`, `disponibilidad`) values (".$aux['id'].", ".$key['tID'].", ".$key['tVal'].")";
         $conn->query($cadena);
      }

      $this->desconectar($conn);
      return true;
    }catch(Exception $e){
      $this->desconectar($conn);
      return false;
    }
  }

  function updateRiel($nombre, $marca, $precio, $talla, $img, $descripcion, $materiales, $disponibilidad,$id,$idRiel, $cat, $idPT){
    $conn = $this->conectar();
    try{
      $cadena="update rieles set Nombre='$nombre', idMarca=$marca, Precio=$precio, img='$img', Descripcion='$descripcion', Materiales='$materiales' where id=$id";
      $conn->query($cadena);
      $cadena="update productotalla set disponibilidad=$disponibilidad where id=$idPT";
      $conn->query($cadena);
      $this->desconectar($conn);
      return true;
    }catch(Exception $e){
      $this->desconectar($conn);
      return false;
    }
  }

  function shoes(){
    $conn = $this->conectar();
    $query = $conn -> query ('select id, img, Nombre, precio from rieles' );
    while($valores=mysqli_fetch_array($query)){
      $cantidad=$this->valCant($valores['id']);
      $agotado='';
      if($cantidad==0)
        $agotado="<h5 class='agotado'>Agotado</h5>";
      else if($cantidad==1)
        $agotado="<h5 class='disponible'>Tenemos: ".$cantidad." disponible</h5>";
      else
        $agotado="<h5 class='disponible'>Tenemos: ".$cantidad." disponibles</h5>";
      echo "
        <div class='card'>
          <img src='".$valores['img']."'>
          <h4>".$valores['Nombre']."</h4>
          <h5>$".$valores['precio']."</h5>
          $agotado
          <form action='info.php' method='post'>
            <input type='hidden' value='".$valores['id']."' name='ID' id='iden'>
            <input type='hidden' value='".$valores['Nombre']."' name='riel'>
            <input name='super' type='submit' class='button' value='Ver mas'></input>
          </form>
        </div>
      ";
    }
  }

  function getRiel(){
    $conn = $this->conectar();
    $query = $conn -> query ("select r.id 'id', pt.id 'idTalla', r.img 'img', r.Nombre, m.Nombre 'marca', concat(s.Nombres,' ',s.Apellidos) 'seller', r.Precio, c.nombre 'categoria', t.talla, pt.disponibilidad from productotalla pt inner join rieles r on r.id=pt.idProd inner join tallas t on t.id=pt.idTalla inner join categorias c on c.id=t.idCategoria inner join marcas m on m.id = r.idMarca inner join cliente s on s.id=r.idSeller");
    $rows=array();
    while($r=mysqli_fetch_array($query)){
      $json=array(
        'id'=>$r['id'],
        'idTalla'=>$r['idTalla'],
        'Nombre'=>$r['Nombre'],
        'marca'=>$r['marca'],
        'Seller'=>$r['seller'],
        'Precio'=>$r['Precio'],
        'Talla'=>$r['talla'],
        'img'=>$r['img'],
        'cat'=>$r['categoria'],
        'disponibilidad'=>$r['disponibilidad']
      );

      $rows[]=$json;
    }
    $this->desconectar($conn);
    return $rows;
  }

  function getRielSeller($username){
    $conn = $this->conectar();
    $query = $conn -> query ("select r.id 'id', pt.id 'idTalla', r.img 'img', r.Nombre, m.Nombre 'marca', concat(s.Nombres,' ',s.Apellidos) 'seller', r.Precio, c.nombre 'categoria', t.talla, pt.disponibilidad from productotalla pt inner join rieles r on r.id=pt.idProd inner join tallas t on t.id=pt.idTalla inner join categorias c on c.id=t.idCategoria inner join marcas m on m.id = r.idMarca inner join cliente s on s.id=r.idSeller where s.username='$username'");
    $rows=array();
    while($r=mysqli_fetch_array($query)){
      $json=array(
        'id'=>$r['id'],
        'idTalla'=>$r['idTalla'],
        'Nombre'=>$r['Nombre'],
        'marca'=>$r['marca'],
        'Seller'=>$r['seller'],
        'Precio'=>$r['Precio'],
        'Talla'=>$r['talla'],
        'img'=>$r['img'],
        'cat'=>$r['categoria'],
        'disponibilidad'=>$r['disponibilidad']
      );
      $rows[]=$json;
    }
    $this->desconectar($conn);
    return $rows;
  }

  function getRielLike($riel){
    $conn = $this->conectar();
    $query = $conn -> query ("select r.id as 'id', t.id as 'idTalla', r.Nombre, m.Nombre as 'marca', concat(s.Nombres,' ',s.Apellidos) as 'Seller', r.Precio as 'Precio', t.Talla as 'Talla', r.img as 'img', t.disponibilidad as 'disponibilidad' from tallas t inner join rieles r on r.id=t.idRiel inner join cliente s on s.id=r.idSeller inner join marcas m on m.id=r.idMarca where r.Nombre like '%".$riel."%'");
    $rows=array();
    while($r=mysqli_fetch_array($query)){
      $json=array(
        'id'=>$r['id'],
        'idTalla'=>$r['idTalla'],
        'Nombre'=>$r['Nombre'],
        'marca'=>$r['marca'],
        'Seller'=>$r['seller'],
        'Precio'=>$r['Precio'],
        'Talla'=>$r['talla'],
        'img'=>$r['img'],
        'cat'=>$r['categoria'],
        'disponibilidad'=>$r['disponibilidad']
      );

      $rows[]=$json;
    }
    $this->desconectar($conn);
    return $rows;
  }

  function getRielLikeSeller($riel,$seller){
    $conn = $this->conectar();
    $query = $conn -> query ("select r.id 'id', pt.id 'idTalla', r.img 'img', r.Nombre, m.Nombre 'marca', concat(s.Nombres,' ',s.Apellidos) 'seller', r.Precio, c.nombre 'categoria', t.talla, pt.disponibilidad from productotalla pt inner join rieles r on r.id=pt.idProd inner join tallas t on t.id=pt.idTalla inner join categorias c on c.id=t.idCategoria inner join marcas m on m.id = r.idMarca inner join cliente s on s.id=r.idSeller where s.username='$seller' and r.Nombre like '%".$riel."%'");
    $rows=array();
    while($r=mysqli_fetch_array($query)){
      $json=array(
        'id'=>$r['id'],
        'idTalla'=>$r['idTalla'],
        'Nombre'=>$r['Nombre'],
        'marca'=>$r['marca'],
        'Seller'=>$r['seller'],
        'Precio'=>$r['Precio'],
        'Talla'=>$r['talla'],
        'img'=>$r['img'],
        'cat'=>$r['categoria'],
        'disponibilidad'=>$r['disponibilidad']
      );

      $rows[]=$json;
    }
    $this->desconectar($conn);
    return $rows;
  }

  function shoesSearch($rielname){
    $conn = $this->conectar();
    if($rielname=='---')
      $query=$conn->query('select id, img, Nombre, precio from rieles');
    else
      $query = $conn -> query ('select r.id, img, r.Nombre, precio from rieles r inner join marcas m on m.id=r.idMarca where r.Nombre like \'%'.$rielname.'%\' or m.nombre like \'%'.$rielname.'%\' order by Nombre ASC');
    $this->desconectar($conn);
    return $query;
  }

  function buscarRiel($nombre){
    $conn = $this->conectar();
    $query = $conn -> query ("select r.id as 'id', t.id as 'idTalla', r.Nombre, r.idMarca, r.idSeller, r.Precio, r.img, r.Descripcion, r.Materiales, t.idCategoria 'categoria', t.talla, pt.disponibilidad from productotalla pt inner join rieles r on r.id=pt.idProd inner join tallas t on t.id=pt.idTalla inner join categorias c on c.id=t.idCategoria where pt.id=$nombre");

    $valores=mysqli_fetch_array($query);
    $this->desconectar($conn);
    return $valores;
  }

  function buscarRielN($nombre){
    $conn = $this->conectar();
    $query = $conn -> query ("select r.id as 'id', t.id as 'idTalla', r.Nombre, r.idMarca, r.idSeller, r.Precio, r.img, r.Descripcion, r.Materiales, t.idCategoria 'categoria', t.talla, pt.disponibilidad from productotalla pt inner join rieles r on r.id=pt.idProd inner join tallas t on t.id=pt.idTalla inner join categorias c on c.id=t.idCategoria where r.Nombre='$nombre'");

    $valores=mysqli_fetch_array($query);
    $this->desconectar($conn);
    return $valores;
  }

  function buscarRielIDD($id){
    $conn = $this->conectar();
    $query = $conn -> query ("select id, Nombre, Precio, img, Descripcion, Materiales from rieles where id='$id'");

    $valores=mysqli_fetch_array($query);
    $this->desconectar($conn);
    return $valores;
  }

  function buscarRielID($id){
    $conn = $this->conectar();
    $query = $conn -> query ("select r.id as 'id', t.id as 'idTalla', r.Nombre, r.idMarca, r.idSeller, r.Precio, r.img, r.Descripcion, r.Materiales, t.talla, t.disponibilidad from tallas t inner join rieles r on r.id=t.idRiel where t.id='$id'");

    $valores=mysqli_fetch_array($query);
    $this->desconectar($conn);
    return $valores;
  }

  function buscarRielbyTalla($nombre, $talla){
    $conn = $this->conectar();
    $query = $conn -> query ("select r.id as 'riel', r.Nombre, t.Talla, c.nombre 'categoria', r.img, r.precio from productotalla pt inner join Rieles r on r.id = pt.idProd inner join tallas t on t.id=pt.idTalla inner join categorias c on c.id=t.idCategoria where pt.idProd='$nombre' and t.talla='$talla'");

    $rows=array();
    while($r=mysqli_fetch_array($query)){
      $json=array(
        'id' => utf8_encode($r['riel']),
        'Nombre' => utf8_encode($r['Nombre']),
        'Talla' => utf8_encode($r['Talla']),
        'Categoria'=> utf8_encode($r['categoria']),
        'img' => utf8_encode($r['img']),
        'Precio' => utf8_encode($r['precio'])
      );
      $rows[]=$json;
    }

    $this->desconectar($conn);
    return $rows;

    /*$valores=mysqli_fetch_array($query);
    return $valores;*/
  }

  function getTallas($nombre){
    $conn = $this->conectar();
    $query = $conn -> query ("select t.talla from productotalla pt inner join tallas t on t.id=pt.idTalla where pt.idProd=$nombre and pt.disponibilidad>=1");

    while($valores=mysqli_fetch_array($query)){
      echo "<option value='".$valores['talla']."'>".$valores['talla']."</option>";
    }
    $this->desconectar($conn);
  }

  function getTallasC(){
    $conn = $this->conectar();
    $query = $conn -> query ("select t.id, t.talla, c.nombre from tallas t inner join categorias c on c.id=t.idCategoria");

    $rows=array();
    while($r=mysqli_fetch_array($query)){
      $json=array(
        'id' => utf8_encode($r['id']),
        'talla' => utf8_encode($r['talla']),
        'nombre' => utf8_encode($r['nombre']),
      );
      $rows[]=$json;
    }
    $this->desconectar($conn);
    return $rows;
  }

  function getCategoria(){
    $conn = $this->conectar();
    $query = $conn -> query ("select * from categorias");
    $this->desconectar($conn);
    return $query;
  }

  function newCategoria($cat){
    try{
      $conn=$this->conectar();
      $conn->query("insert into categorias values (null, '$cat')");
      $this->desconectar($conn);
      return true;
    }catch(Exception $e){
      return false;
    }
  }

  function newTalla($talla,$cat){
    try{
      $conn=$this->conectar();
      $conn->query("insert into tallas values (null, '$talla', $cat)");
      $this->desconectar($conn);
      return true;
    }catch(Exception $e){
      return false;
    }

  }

  function getCantidad($nombre){
    echo "<h3>Disponibles: ".$this->valCant($nombre)."</h3>";
  }

  function getCantidadID($nombre,$talla){
    echo "<h3>Disponibles: ".$this->valCant($nombre,$talla)."</h3>";
  }

  function valCant($nombre,$talla='---'){
    $conn = $this->conectar();
    if($talla=='---'){
      $query = $conn -> query ("select pt.disponibilidad from productotalla pt inner join tallas t on t.id=pt.idTalla where idProd=$nombre");
    }else{
      $query = $conn -> query ("select pt.disponibilidad from productotalla pt inner join tallas t on t.id=pt.idTalla where idProd='$nombre' and t.talla='$talla'");
    }

    $dis=0;
    while($valores=mysqli_fetch_array($query)){
      $dis+=$valores['disponibilidad'];
    }
    $this->desconectar($conn);
    return $dis;
  }

  function buscarUsuario($username){
    $conn = $this->conectar();
    $query = $conn -> query ("select * from cliente where username='$username'");

    $valores=mysqli_fetch_array($query);
    $this->desconectar($conn);
    return $valores;
  }

  function updateUsuario($cadena){
    $conn = $this->conectar();
    try{
      $conn->query($cadena);
      $this->desconectar($conn);
      return true;
    }catch(Exception $e){
      $this->desconectar($conn);
      return false;
    }
  }

  function compraUsuario($username,$monto){
    $conn = $this->conectar();
    $va=$this->buscarUsuario($username);
    $fecha=date("Y-m-d");
    $query=$conn->query("select count(id) as 'c' from compra");
    $dat=mysqli_fetch_array($query);
    $val=$dat['c'];
    $val++;
    $id='';
    if(intval($val)<=9){
      $id='C000';
    }else if(intval($val)>=10 && intval($val)<100){
      $id='C00';
    }else if(intval($val)>=100 && intval($val)<1000){
      $id='C0';
    }else{
      $id='C';
    }
    $id.=$val;
    try{
      $conn->query("insert into compra values('$id', ".$va['id'].", '$fecha', $monto)");
      $this->desconectar($conn);
      return $id;
    }catch(Exception $e){
      $this->desconectar($conn);
      return false;
    }
  }

  function compraRiel($rielname, $talla, $cantidad, $idCompra){
    //$riel=$this->getRielTop($rielname);
    $conn = $this->conectar();
    $query=$conn->query("select count(id) as 'c' from detalle_compra");
    $dat=mysqli_fetch_array($query);
    $val=$dat['c'];
    $id='';
    if($val<10){
      $id='S00';
    }else if($val>=10 && $val<100){
      $id='S0';
    }else if($val>=100 && $val<1000){
      $id='S';
    }
    $id.=$val+1;
    $u=date('U');
    echo $u;
    $f=str_split($u);

    $flag=count($f);
    $id.=$f[$flag-1];
    $query=$conn->query("select pt.id from productotalla pt inner join rieles r on r.id=pt.idProd inner join tallas t on t.id=pt.idTalla where pt.idProd=$rielname and t.talla='$talla'");
    $dat=mysqli_fetch_array($query);

    try{
      $conn->query("insert into detalle_compra values('$id', ".$dat['id'].", $cantidad)");
      mysqli_close($conn);
      $this->compraFin($idCompra, $id);
    }catch(Exception $e){
      mysqli_close($conn);
    }
  }

  function compraFin($idCompra, $idDetalle){
    try{
      $conn = $this->conectar();
      $conn->query("insert into compra_fin (`idCompra`, `idDetalle`) values ('$idCompra', '$idDetalle')");
    }catch(Exception $e){
      mysqli_close($conn);
    }
  }

  function getRielTop($rielname){
    $exe="select id from rieles where Nombre='$rielname' and disponibilidad>=1 limit 1";
    $conn = $this->conectar();
    $query = $conn -> query ($exe);
    $valores=mysqli_fetch_array($query);
    mysqli_close($conn);
    return $valores;
  }

  function reduce($id,$talla,$cantidad=1){
    $conn = $this->conectar();
    $query=$conn->query("select pt.disponibilidad, t.id from productotalla pt inner join tallas t on t.id=pt.idTalla where idProd=$id and t.talla='$talla'");
    $dis=mysqli_fetch_array($query);
    $conn->query("update productotalla set disponibilidad=".($dis['disponibilidad']-$cantidad)." where idProd=".$id." and idTalla=".$dis['id']);
    $this->desconectar($conn);
  }

  function addDis($id, $cantidad, $talla){
    $conn = $this->conectar();
    try{
      $query=$conn->query("select pt.disponibilidad, t.id from productotalla pt inner join tallas t on t.id=pt.idTalla where idProd=$id and t.talla='$talla'");
      $dis=mysqli_fetch_array($query);
      $conn->query("update productotalla set disponibilidad=".($dis['disponibilidad']+$cantidad)." where idProd=".$id." and idTalla=".$dis['id']);
      $this->desconectar($conn);
      return true;
    }catch(Exception $ex){
      $this->desconectar($conn);
      return false;
    }
  }

  function autComplete($cadena){
    $conn = $this->conectar();
    $query=$conn->query("select * from rieles where Nombre like '%$cadena%' ORDER BY Nombre ASC LIMIT 0, 7");
    $this->desconectar($conn);
    return $query;
  }

  function autCompleteSeller($cadena){
    $conn = $this->conectar();
    $query=$conn->query("select * from rieles r inner join cliente c on c.id=r.idSeller where Nombre like '%$cadena%' and c.username='nbukele' ORDER BY Nombre ASC LIMIT 0, 7");
    $this->desconectar($conn);
    return $query;
  }

  function userByType($usertype){
    $conn = $this->conectar();

    $query=$conn->query('select * from cliente where userType=\''.$usertype.'\'');

    $rows=array();
    while($r=mysqli_fetch_array($query)){
      $json=array(
        'id' => utf8_encode($r['id']),
        'Nombres' => utf8_encode($r['Nombres']),
        'Apellidos' => utf8_encode($r['Apellidos']),
        'Email' => utf8_encode($r['Email']),
        'username' => utf8_encode($r['username']),
        'Telefono' => utf8_encode($r['Telefono']),
        'Direccion' => utf8_encode($r['Direccion']),
        'avatar' => utf8_encode($r['avatar'])
      );

      $rows[]=$json;
    }

    header("Content-type:application/json");
    $this->desconectar($conn);
    return $rows;
  }

  function userByTypeByName($username, $usertype){
    $conn = $this->conectar();

    $query=$conn->query('select * from cliente where username like \'%'.$username.'%\' or Nombres like \'%'.$username.'%\' or Apellidos like \'%'.$username.'%\' or concat(Nombres, \' \', Apellidos) like \'%'.$username.'%\' and usertype=\''.$usertype.'\'');

    $rows=array();
    while($r=mysqli_fetch_array($query)){
      $json=array(
        'id' => utf8_encode($r['id']),
        'Nombres' => utf8_encode($r['Nombres']),
        'Apellidos' => utf8_encode($r['Apellidos']),
        'Email' => utf8_encode($r['Email']),
        'username' => utf8_encode($r['username']),
        'Telefono' => utf8_encode($r['Telefono']),
        'Direccion' => utf8_encode($r['Direccion']),
        'avatar' => utf8_encode($r['avatar'])
      );

      $rows[]=$json;
    }

    header("Content-type:application/json");
    $this->desconectar($conn);
    return $rows;
  }

  function deleteUser($id){
    $conn = $this->conectar();
    try{
      $conn->query('delete from cliente where username=\''.$id.'\'');
      $this->desconectar($conn);
      return true;
    }catch(Exception $e){
      $this->desconectar($conn);
      return false;
    }
  }

  function deleteRiel($id){
    $conn = $this->conectar();
    try{
      $conn->query('delete from riel where id='.$id);
      $this->desconectar($conn);
      return true;
    }catch(Exception $e){
      $this->desconectar($conn);
      return false;
    }
  }

  function getMarca(){
    $conn = $this->conectar();
    $query=$conn->query('select * from marcas');
    $this->desconectar($conn);
    return $query;
  }

  function newMarca($marca){
    try{
      $conn=$this->conectar();
      $conn->query("insert into marcas values (null, '$marca')");
      $this->desconectar($conn);
      return true;
    }catch(Exception $e){
      return false;
    }
  }

  function getCat(){
    $conn = $this->conectar();
    $query=$conn->query('select * from categorias');
    $this->desconectar($conn);
    return $query;
  }

  function getTC($c){
    $conn = $this->conectar();
    $query=$conn->query('select t.* from tallas t inner join categorias c on c.id=t.idCategoria where t.idCategoria='.$c);
    $rows=array();
    while($r=mysqli_fetch_array($query)){
      $json=array(
        'id' => utf8_encode($r['id']),
        'talla' => utf8_encode($r['talla']),
        'idC' => utf8_encode($r['idCategoria'])
      );

      $rows[]=$json;
    }

    header("Content-type:application/json");
    $this->desconectar($conn);
    return $rows;
    return $query;
  }

  function getSeller(){
    $conn = $this->conectar();
    $query=$conn->query('select id, concat(Nombres, \' \', Apellidos)  as \'Nombre\', username from cliente where userType=\'seller\'');
    $this->desconectar($conn);
    return $query;
  }

  function getLastCompra($id) {
    $conn = $this->conectar();
    $query = $conn->query('select * from compra where idCliente = '.$id.' order by id desc limit 1');
    $this->desconectar($conn);
    return mysqli_fetch_array($query);
  }

  function getSODetails($soId) {
    $conn = $this->conectar();
    $query = $conn->query("select r.nombre, r.Precio, dc.cantidad, r.precio*dc.cantidad as 'subtotal' from compra_fin cf inner join compra c on c.id = cf.idCompra inner join detalle_compra dc on dc.id = cf.idDetalle inner join productotalla pt on pt.id = dc.idProd inner join rieles r on r.id = pt.idProd where c.id = '".$soId."'");
    $this->desconectar($conn);
    $rows = array();

    while($r=mysqli_fetch_array($query)) {
      $sub = array(
        'nombre'=>$r['nombre'],
        'precio'=>$r['Precio'],
        'cantidad'=>$r['cantidad'],
        'subtotal'=>$r['subtotal']
      );

      $rows[]=$sub;
    }
    return $rows;
  }
}
 ?>
