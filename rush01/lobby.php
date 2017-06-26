<?php
session_start();
if (empty($_SESSION['loggued_on_user']) || $_SESSION['loggued_on_user'] == "")
    header('Location: login.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Lobby</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
    <div class="container">

        <div class="lobby">
            <div class="row buttons-panel">
                <div class="col-xs-6 buttons-panel-left">
                    <form action="create_room.php" method="POST">
                        <button type="submit" class="btn btn-primary" name="submit" value="ok">Create room</button>
                    </form>
                </div>
                <div class="col-xs-6 buttons-panel-right">
                    <a type="button" class="btn btn-warning pull-right" href="logout.php">Logout</a>
                </div>
            </div>
            <div class="col-xs-6">
        <div class="panel panel-default rooms-panel">
            <div class="panel-heading">
                <h3 class="panel-title">Select your rooms</h3>
            </div>
            <div class="panel-body">
                <table class="table table-hover">
                    <tbody>
                    <tr>
                        <th>#</th>
                        <th>Player</th>
                        <th></th>
                    </tr>
                    </tbody>

                    <?php
                    include_once 'config.php';
                    $sql = new mysqli(SQL_HOST, SQL_USER, SQL_PASS, SQL_DB);
                    $sql->set_charset('utf8');
                    if ($sql->connect_error)
                        die("Connection failed: " . $sql->connect_error);
                    $result = $sql->query("SELECT * FROM `rooms`");
                    $data = $result->fetch_all(MYSQLI_ASSOC);
                    for ($i = 0; $i < count($data); $i++)
                    {
                        echo "
                <tr>
                    <th>" . $data[$i]['id'] . "</th>
                    <th>" . $data[$i]['firstplayer'] . "</th>
                    <th><form method=\"POST\" action=\"connect_to_room.php\">
                    <button type=\"submit\" name=\"submit\" value=" . $data[$i]['id'] . " class=\"btn btn-success\">Connect</button></form></th>
                </tr>";
                    }
                    ?>
                </table>
            </div>
        </div>
        </div>



        <div class="col-xs-6">
        <div class="panel panel-default chat-panel">
            <div class="panel-heading">
                <h3 class="panel-title">Chat</h3>
            </div>
            <div class="panel-body">
                <iframe class="chat" name='chatWindow' id='chatWindow' src='chat.php'></iframe>
                <form class="form-inline chat-form" action='chat.php' method='POST' target='chatWindow'>
                    <textarea class="form-control message" name='message'></textarea>
                    <button class="btn btn-primary" type='submit' onClick="window.location.reload()">Send</button>
                </form>
            </div>
        </div>
        </div>
        </div>
    </div>
</body>
</html>
