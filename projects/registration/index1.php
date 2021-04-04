<?php include('server.php');

    if (empty($_SESSION['username'])) {
        header('location: login.php');
    }


?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<style type="text/css">
	.header {
    width: 30%;
    margin: 30px auto 0px;
    text-align: center;
    color: white;
    background: #a81164;
    border: 1px solid #a81164;
    border-bottom: none;
    border-radius: 10px 10px 0px 0px;
    padding: 20px;

}
form , .content {
	width: 30%;
    margin: 0px auto;
    padding: 20px;
    border: 1px solid #B0C4DE;
    background: white;
    border-radius: 0px 0px 10px 10px;
}
.input-group {
	margin: 10px 0px 10px 0px;
}
label {
	display: block;
	text-align: left;
	margin: 3px;
}
input {
	height: 30px;
	width: 93%;
	padding: 5px 10px;
	font-size: 16px;
	border-radius: 5px;
	border: 1px solid gray;
}
.btn {
    padding: 10px;
    color: white;
    background: #a81164;
    border: none;
    font-size: 15px;
    border-radius: 5px;
}

</style>
<body>
	<div class="header" >
		<h2>Home Page</h2>
	</div>
	<div class="content">
        <?php if (isset($_SESSION['success'])) : ?>
            <div class="error success">
                <h3>
                    <?php 
                    echo $_SESSION['success'];
                    unset($_SESSION['success']);
                    ?>
                </h3>
            </div>
            <?php endif ?>
            <?php if (isset($_SESSION['username'])) : ?> 
                <p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
                <p> <a href="login.php" style="color: red;" name="logout">Logout</a></p>
                <?php endif ?>
    </div>
    
</body>
</html> 