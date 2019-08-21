<?
include_once 'base.php';
switch ($_GET['do']) {
    case 'addmas':
        ins('mu',['txt' => $_POST['txt'] ]);
        to('admin.php?do=mu');
        break;
    case 'addchi':
        ins('mu',['txt' => $_POST['txt'] , 'mas' => $_POST['mas'] ]);
        to('admin.php?do=mu');
        break;
    case 'getchi':
        foreach (all('mu',['sh' => 1 , 'mas' => $_POST['mas'] ]) as $value) {
            ?>
            <option value="<?=$value['id']?>"><?=$value['txt']?></option>
            <?
        }
        break;
    case 'chkuser':
        if ($_POST['txt'] == 'admin' || rc('user',[ 'txt' => $_POST['txt'] ] ) > 0 ) {
            echo "帳號已存在";
        }
        else{
            echo "帳號可使用";
        }
        break;
    case 'chklogin':
        if ($_POST['ans']!=$_GET['ans']) {
            echo '<script>alert("對不起，您輸入的驗證碼有誤請您重新輸入");location.href="index.php?do=buy";</script>';
        }
        else if (rc('user',[ 'txt' => $_POST['txt'] , 'pw' => $_POST['pw'] ] ) > 0 ) {
            $_SESSION['user'] = $_POST['txt'];
            to('index.php');
        }
        else{
            echo '<script>alert("帳號或密碼錯誤");location.href="index.php?do=buy";</script>';
        }
        break;
    case 'chkadlogin':
        if ($_POST['ans']!=$_GET['ans']) {
            echo '<script>alert("對不起，您輸入的驗證碼有誤請您重新輸入");location.href="index.php?do=adlogin";</script>';
        }
        else if (rc('leader',[ 'txt' => $_POST['txt'] , 'pw' => $_POST['pw'] ] ) > 0 ) {
            $_SESSION['aduser'] = $_POST['txt'];
            to('admin.php');
        }
        else{
            echo '<script>alert("帳號或密碼錯誤");location.href="index.php?do=adlogin";</script>';
        }
        break;

    case 'logoutad':
        unset($_SESSION['aduser']);
        to('index.php');
        break;

    case 'logoutus':
        unset($_SESSION['user']);
        to('index.php');
        break;
// ===================================
    case 'sub':
        switch ($_POST['table']) {
            case 'mu':
                subD($_POST['table']);
                to('admin.php?do=mu');
                break;
            case 'item':
                subD($_POST['table']);
                to('admin.php?do=mu');
                break;
            case 'leader':
                subD($_POST['table']);
                to('admin.php?do=aduser');
                break;
            case 'user':
                subD($_POST['table']);
                to('admin.php?do=user');
                break;
            case 'od':
                subD($_POST['table']);
                to('admin.php?do=od');
                break;
        }
        break;
    case 'ed':
        switch ($_POST['table']) {
            case 'item':
                saveD($_POST['table']);
                to('admin.php?do=mu');
                break;
            case 'user':
                saveD($_POST['table']);
                to('admin.php?do=user');
                break;
            case 'foot':
                saveD($_POST['table']);
                to('admin.php?do=edfoot');
                break;
        }
        break;
    case 'add':
        switch ($_POST['table']) {
            case 'item':
                saveD($_POST['table']);
                to('admin.php?do=mu');
                break;
            case 'user':
                if ($_POST['txt'] == 'admin' || rc($_POST['table'],[ 'txt' => $_POST['txt'] ] ) > 0 ) {
                    echo '<script>alert("帳號已存在");location.href="index.php?do=adduser";</script>';
                }
                else{
                    saveD($_POST['table']);
                    echo '<script>alert("註冊成功");location.href="index.php?do=adduser";</script>';
                }
                break;
            case 'leader':
                if (rc($_POST['table'],[ 'txt' => $_POST['txt'] ] ) > 0 ) {
                    echo '<script>alert("帳號已存在");location.href="admin.php?do=addleader";</script>';
                }
                else{
                    saveD($_POST['table']);
                    echo '<script>alert("註冊成功");location.href="admin.php?do=addleader";</script>';
                }
                break;
            case 'od':
                $_POST['carid'] = serialize($_SESSION['carid']);
                saveD($_POST['table']);
                unset($_SESSION['carid']);
                unset($_POST['carid']);
                echo '<script>alert("訂購成功\n感謝您的選購");location.href="index.php?do=main&masid=1";</script>';
                
                break;
        }
        break;
    
}

?>