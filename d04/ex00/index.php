<?php
session_start();
if ($_GET['submit'] === 'OK')
{
    $_SESSION['login'] = $_GET['login'];
    $_SESSION['passwd'] = $_GET['passwd'];
}
?>

<html>
<body>
<style>
    html {
        font-size: 1rem;
        box-sizing: border-box;
    }
    body {
        margin: 0;
        font-family: Helvetica, sans-serif;
        background-color: #002F2F;
    }
    .container {
        padding-top: 35vh;
        display: block;
        width: 25vh;
        margin-left: auto;
        margin-right: auto;
    }
    input {
        font-family: Helvetica, sans-serif;
        color: #002F2F;
        border: none;
        width: 100%;
        max-width: 100%;
        height: 4vh;
        padding-left: 1.5vh;
        margin-bottom: 0.5vh;
        font-size: 1vh;
        box-sizing: border-box;
    }
    input::-webkit-input-placeholder {
        color: #002F2F;
    }
    button {
        font-family: Helvetica, sans-serif;
        border: none;
        color: #002F2F;
        background-color: #EFECCA;
        width: 100%;
        height: 4vh;
        font-size: 1vh;
        cursor: pointer;
    }
    button:hover {
        background-color: #A7A37E;
    }
</style>
<div class="container">
    <form method="GET" name="index.php">
        <input type="text" name="login" value="<?php echo $_SESSION['login']?>" placeholder="login">
        <input type="text" name="passwd" value="<?php echo $_SESSION['passwd']?>" placeholder="password">
        <button name="submit" value="OK">Submit</button>
    </form>
</div>
</body>
</html>