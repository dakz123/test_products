<?php require '../layout/head.php';
?>

<body>
    <?php require '../layout/nav.php';
    ?>
    <div class="container py-5 ">
        <div class="row">
            <div class="col-md-6">
                <div class="card align-self-center">
                    <div class="card-title">
                        <h2>Login</h2>
                    </div>
                    <div class="card-body">
                        <form action="../../controllers/AuthController.php?action=login" class="form-action"
                            method="post">
                            <div class="mb-1">
                                <label for="username">Username or Email:</label>
                                <input type="text" id="username" class="form-control" name="username" required>
                            </div>
                            <div class="mb-1">
                                <label for="password">Password:</label>
                                <input type="password" id="password" name="password" class="form-control" required>
                            </div>

                            <input type="submit" value="Login">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>

</html>