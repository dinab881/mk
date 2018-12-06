<h2>Signup</h2>
<div class="row">
    <div class="col-md-6">
        <form method="post" action="/user/signup">
            <div class="form-group">
                <label for="login">Login</label>
                <input type="text" name="login"
                       value="<?= isset($_SESSION['form_data']['login']) ? h($_SESSION['form_data']['login']) : '' ?>"
                       class="form-control" id="login" placeholder="Login">
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password"
                       class="form-control" id="password" placeholder="Password">
            </div>

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name"
                       value="<?= isset($_SESSION['form_data']['name']) ? h($_SESSION['form_data']['name']) : '' ?>"
                       class="form-control" id="login" placeholder="Name">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" name="email"
                       value="<?= isset($_SESSION['form_data']['email']) ? h($_SESSION['form_data']['email']) : '' ?>"
                       class="form-control" id="email" placeholder="Email">
            </div>
            <button type="submit" class="btn btn-default">Signup</button>
        </form>
        <?php if (isset($_SESSION['form_data'])) unset($_SESSION['form_data']) ?>
    </div>
</div>