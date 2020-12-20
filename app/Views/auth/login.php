<?= view('themes/auth/head') ?>

<body>
  <div class="container space-container-login">
    <div class="row align-items-center">
      <div class="col-lg-6">
        <a href="<?= base_url() ?>">
          <img src="<?= base_url('img/logo.png') ?>" alt="" class="bg-login">
        </a>
      </div>
      <div class="col-lg-6 col-md-12 col-sm-12">
        <div class="card-login">
          <h2 class="h2 text-center text-gray-900 mb-5 font-weight-bold">Welcome Back!</h2>
          <?= view('Myth\Auth\Views\_message_block') ?>
          <form action="<?= route_to('login') ?>" method="post" class="user">
            <?= csrf_field() ?>
            <?php if ($config->validFields === ['email']) : ?>
              <!-- Email -->
              <div class="form-group">
                <input type="email" class="form-control form-control-user <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="<?= lang('Auth.email') ?>">
              </div>
            <?php else : ?>
              <!-- Email or Username -->
              <div class="form-group">
                <input type="text" class="form-control form-control-user <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="<?= lang('Auth.emailOrUsername') ?>">
              </div>
            <?php endif; ?>
            <!-- Password -->
            <div class="form-group">
              <input type="password" name="password" class="form-control form-control-user <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.password') ?>">
            </div>
            <div class="form-group">
              <div class="custom-control custom-checkbox small">
                <!-- Remember Me -->
                <?php if ($config->allowRemembering) : ?>
                  <input type="checkbox" class="custom-control-input" id="remember" name="remember" <?php if (old('remember')) : ?> checked <?php endif ?>>
                  <label class="custom-control-label" for="remember"><?= lang('Auth.rememberMe') ?></label>
                <?php endif; ?>
                <!-- Forgot Password -->
                <?php if ($config->activeResetter) : ?>
                  <label style="float:right;"><a href="<?= route_to('forgot') ?>" class="link-primary"><?= lang('Auth.forgotYourPassword') ?></a></label>
                <?php endif; ?>
              </div>
            </div>
            <button class="btn btn-login btn-user btn-block" type="submit">
              <?= lang('Auth.loginAction') ?>
            </button>
          </form>
          <div class="text-center mt-4">
            <!-- Register -->
            <?php if ($config->allowRegistration) : ?>
              <span class="small">Don't have an account? </span>
              <label><a href="<?= route_to('register') ?>" class="link-primary font-weight-bold small"><?= lang('Auth.needAnAccount') ?></a></label>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>