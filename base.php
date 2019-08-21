<?
$dsn = "mysql:
        host=localhost;
        charset=utf8;
        dbname=db04;";
$pdo = new pdo($dsn,'root','');
session_start();
if (!isset($_SESSION['total'])) {
    $_SESSION['total'] = one('total')[1] + 1;
    upd('total' , ['txt' => $_SESSION['total']]);
}

function q($sql){
    return $GLOBALS['pdo']->query($sql)->fetchAll();
}

function one($table,$where=1){
    $cmd=1;
    if(is_array($where)){
        $cmd = '';
        foreach ($where as $key => $value) {
            $cmd .= "$key = '$value' && ";
        }
    }
    $sql = "SELECT * FROM $table WHERE ".rtrim($cmd , ' && ');
    return $GLOBALS['pdo']->query($sql)->fetch();
}

function all($table,$where=1){
    $cmd=1;
    if(is_array($where)){
        $cmd = '';
        foreach ($where as $key => $value) {
            $cmd .= "$key = '$value' && ";
        }
    }
    $sql = "SELECT * FROM $table WHERE ".rtrim($cmd , ' && ');
    return $GLOBALS['pdo']->query($sql)->fetchAll();
}

function del($table,$where=1){
    $cmd=1;
    if(is_array($where)){
        $cmd = '';
        foreach ($where as $key => $value) {
            $cmd .= "$key = '$value' && ";
        }
    }
    $sql = "DELETE FROM $table WHERE ".rtrim($cmd , ' && ');
    return $GLOBALS['pdo']->exec($sql);
}

function upd($table,$data,$id=1){

        $cmd = '';
        foreach ($data as $key => $value) {
            $cmd .= "$key = '$value' , ";
        }
    
    $sql = "UPDATE $table SET ".rtrim($cmd , ' , ')." WHERE id = '$id'";
    return $GLOBALS['pdo']->exec($sql);
}

function ins($table,$data){

    $n = '';
    $v = '';
    foreach ($data as $key => $value) {
        $n .= "$key , ";
        $v .= "'$value' , ";
    }

$sql = "INSERT INTO $table(".rtrim($n , ' , ').") VALUES(".rtrim($v , ' , ').")";
return $GLOBALS['pdo']->exec($sql);
}

function rc($table,$where=1){
    $cmd=1;
    if(is_array($where)){
        $cmd = '';
        foreach ($where as $key => $value) {
            $cmd .= "$key = '$value' && ";
        }
    }
    $sql = "SELECT * FROM $table WHERE ".rtrim($cmd , ' && ');
    return $GLOBALS['pdo']->query($sql)->rowCount();
}

function to($url){
    header("location:$url");
}

function subD($table){
    if (!empty($_POST['del'])) {
        foreach ($_POST['del'] as $id) {
            del($table,[ 'id' => $id ]);
        }
    }
    if (!empty($_POST['sh'])) {
        foreach ($_POST['id'] as $id) {
            (in_array($id , $_POST['sh']))?upd($table,[ 'sh' => 1 ],$id):upd($table,[ 'sh' => 0 ],$id);
        }
    }
    foreach ($_POST as $name => $value) {
        if ($name!='id' && $name!='table' && $name!='del' && $name!='sh') {
            foreach ($_POST['id'] as $key => $id) {
                upd($table,[$name => $value[$key] ],$id);
            }
        }
    }
}

function saveD($table){
    if (!isset($_POST['id'])) {
        ins($table ,[]);
        $_POST['id'] = q("SELECT LAST_INSERT_ID()")[0][0]; 
    }
    if (!empty($_FILES)) {
        foreach ($_FILES as $key => $value) {
            if (!empty($value['tmp_name'])) {
                move_uploaded_file($value['tmp_name'],"./img/".$value['name']);
                upd($table,[$key => $value['name'] ],$_POST['id']);
            }
        }
    }

    foreach ($_POST as $key => $value) {
        if ($key!='id' && $key!='table') {
            upd($table, [ $key => $value ] ,$_POST['id'] );
        }
    }
}

function XXXXX(){
    $maxD = '';
    
    (!isset($_GET['p']))?$_GET['p']=1:'';
    $skip = ($_GET['p']-1)*$maxD;
    $start = $skip + 1;
    foreach (q("SELECT * FROM $table LIMIT $skip , $maxD") as $key => $value) {
        # code...
    }
}

?>



