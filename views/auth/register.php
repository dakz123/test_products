<?php require '../layout/head.php';
?>

<body>
    <?php require '../layout/nav.php';
    ?>
    <div class="container py-5">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-title">
                        <h2>Register</h2>
                    </div>
                    <div class="card-body">
                        <form action="../../controllers/AuthController.php?action=register" method="post"
                            class="form-action">
                            <div class="mb-1">
                                <label for="username">Username:</label>
                                <input type="text" id="username" name="username" class="form-control" required>
                            </div>
                            <div class="mb-1">
                                <label for="email">Email:</label>
                                <input type="email" id="email" name="email" class="form-control" required>
                            </div>
                            <div class="mb-1">
                                <label for="password">Password:</label>
                                <input type="password" id="password" name="password" class="form-control" required>
                            </div>


                            <input type="submit" value="Register">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>

</html>