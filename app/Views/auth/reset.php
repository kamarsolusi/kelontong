<?= view('themes/auth/head') ?>

<body class="hold-transition login-page">
  <div class="container space-container-forgot">
    <div class="row align-items-center">
      <div class="col-lg-6">
        <img src="<?= base_url('img/reset_password.svg') ?>" alt="" class="bg-auth">
      </div>
      <div class="col-lg-6 col-md-12 col-sm-12">
        <div class="card-login">
          <h2 class="h3 text-center text-gray-900 font-weight-bold">Set a New Password!</h2>
          <p class="text-center small mt-3 mb-4"><?= lang('Auth.resetYourPassword') ?></p>
          <?= view('Myth\Auth\Views\_message_block') ?>
          <form action="<?= route_to('reset-password') ?>" method="post" class="user">
            <?= csrf_field() ?>
            <div class="form-group">
              <input type="text" class="form-control form-control-user <?php if (session('errors.token')) : ?>is-invalid<?php endif ?>" name="token" placeholder="<?= lang('Auth.token') ?>" value="<?= old('token', $token ?? '') ?>">
            </div>
            <div class="form-group">
              <input type="email" class="form-control form-control-user <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" name="email" aria-describedby="emailHelp" placeholder="<?= lang('Auth.email') ?>" value="<?= old('email') ?>">
            </div>
            <div class="form-group">
              <input type="password" class="form-control form-control-user <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" name="password" placeholder="<?= lang('Auth.newPassword') ?>">
            </div>
            <div class="form-group">
              <input type="password" class="form-control form-control-user <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" name="pass_confirm" placeholder="<?= lang('Auth.newPasswordRepeat') ?>">
            </div>
            <button type="submit" class="btn btn-login btn-user btn-block">
              <?= lang('Auth.resetPassword') ?>
            </button>
          </form>
          <div class="text-center mt-4">
            <span class="small">Already have a Kelontong account? </span>
            <label><a href="<?= route_to('login') ?>" class="link-primary font-weight-bold small"><?= lang('Auth.signIn') ?></a></label>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>