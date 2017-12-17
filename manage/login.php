<!DOCTYPE html>
<html>
  <?php require_once("header.php"); ?>
  <body class="auth-wrapper">
    <div class="all-wrapper menu-side with-pattern">
      <div class="auth-box-w">
        <div class="logo-w">
          <a href="index.php"><img alt="" src="img/logo-big.png"></a>
        </div>
        <h4 class="auth-header">
          Login Form
        </h4>
        <form action="users_handler.php" method="post">
		  <input type="hidden" name="reqfor" id="reqfor" value="author_login" />
          <div class="form-group">
            <label for="">Username</label>
			<input class="form-control" id="username" name="username" placeholder="Enter your username" type="text">
            <div class="pre-icon os-icon os-icon-user-male-circle"></div>
          </div>
          <div class="form-group">
            <label for="">Password</label>
			<input class="form-control" id="password" name="password" placeholder="Enter your password" type="password">
            <div class="pre-icon os-icon os-icon-fingerprint"></div>
          </div>
          <div class="buttons-w">
            <button type="submit" class="btn btn-primary">Log me in</button>
            <!-- <div class="form-check-inline">
              <label class="form-check-label"><input class="form-check-input" type="checkbox">Remember Me</label>
            </div>-->
          </div>
        </form>
      </div>
    </div>
  </body>
</html>
