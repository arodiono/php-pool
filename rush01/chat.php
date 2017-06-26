<script type="text/javascript">setTimeout("window.location.reload()",3000);</script>
<head>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/chat.css">
</head>
<table class="table-striped full">
<?php
    session_start();
    include_once 'config.php';
    $sql = new mysqli(SQL_HOST, SQL_USER, SQL_PASS, SQL_DB);
    $sql->set_charset('utf8');
    if ($sql->connect_error)
        die("Connection failed: " . $sql->connect_error);

    $login = $_SESSION['loggued_on_user'];
    if ( isset($_POST['message'])) {
        $sql->query("INSERT INTO `messages` (`login`, `message`) VALUES ('$login', '".$_POST['message']."')");
        unset($_POST);
    }
    $result = $sql->query("SELECT * FROM `messages` WHERE 1 ORDER BY id");
    $data = $result->fetch_all(MYSQLI_ASSOC);
    for ( $i = 0; $i < count($data); $i++ ) {
        echo "<tr><th class=\"login\">" . $data[$i]['login'] . "</th><th class=\"message\">" . $data[$i]['message'] . "</th></tr>";
    }
?>
</table>
<script type="text/javascript">window.scrollTo(0,document.body.scrollHeight);</script>



