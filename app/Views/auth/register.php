<?= view('themes/auth/head') ?>

<body>
  <div class="container mt-5">
    <div class="row align-items-center">
      <div class="col-lg-5">
        <img src="<?= base_url('img/logo.png') ?>" alt="" class="bg-register">
      </div>
      <div class="col-lg-7 col-md-12 col-sm-12">
        <div class="card-register">
          <h2 class="h3 text-center text-gray-900 mb-4 font-weight-bold">Register a new membership!</h2>
          <?= view('Myth\Auth\Views\_message_block') ?>
          <form action="<?= route_to('register') ?>" method="post" class="user">
            <?= csrf_field() ?>
            <div class="row">
              <!-- First Name -->
              <div class="form-group col-lg-6 col-md-6 col-sm-6">
                <input type="text" class="form-control form-control-user <?php if (session('errors.firstname')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.firstname') ?>" name="firstname" value="<?= old('firstname') ?>">
              </div>
              <!-- Last Name -->
              <div class="form-group col-lg-6 col-md-6 col-sm-6">
                <input type="text" class="form-control form-control-user <?php if (session('errors.lastname')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.lastname') ?>" name="lastname" value="<?= old('lastname') ?>">
              </div>
            </div>
            <!-- Username -->
            <div class="form-group">
              <input type="text" class="form-control form-control-user <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.username') ?>" name="username" value="<?= old('username') ?>">
            </div>
            <!-- Email -->
            <div class="form-group">
              <input type="email" class="form-control form-control-user <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.email') ?>" name="email" value="<?= old('email') ?>">
            </div>
            <div class="row">
              <!-- Password -->
              <div class="form-group col-lg-6 col-md-6 col-sm-6">
                <input type="password" class="form-control form-control-user <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.password') ?>" name="password" autocomplete="off">
              </div>
              <!-- Password Confirmation -->
              <div class="form-group col-lg-6 col-md-6 col-sm-6">
                <input type="password" class="form-control form-control-user <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.repeatPassword') ?>" name="pass_confirm" autocomplete="off">
              </div>
            </div>
            <div class="form-group">
              <div class="custom-control custom-checkbox small">
                <!-- Agree -->
                <input type="checkbox" class="custom-control-input" id="agreeTerms" name="terms" value="agree">
                <label class="custom-control-label" for="agreeTerms">I agree to the <a href="#" class="link-primary font-weight-bold">terms</a></label>
              </div>
            </div>
            <button type="submit" class="btn btn-login btn-user btn-block mt-3">
              <?= lang('Auth.register') ?>
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