<?= view('themes/auth/head') ?>

<body>
  <div class="container space-container-forgot">
    <div class="row align-items-center">
      <div class="col-lg-6">
        <img src="<?= base_url('img/forgot_password.svg') ?>" alt="" class="bg-auth">
      </div>
      <div class="col-lg-6 col-md-12 col-sm-12">
        <div class="card-login">
          <h2 class="h3 text-center text-gray-900 font-weight-bold">Forgot Your Password?</h2>
          <p class="text-center small mt-3 mb-4"><?= lang('Auth.enterEmailForInstructions') ?></p>
          <form action="<?= route_to('forgot') ?>" method="post" class="user">
            <?= csrf_field() ?>
            <div class="form-group">
              <input type="email" class="form-control form-control-user <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.email') ?>" name="email">
            </div>
            <button type="submit" class="btn btn-login btn-user btn-block">
              <?= lang('Auth.sendInstructions') ?>
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