
<html lang="<?php echo e(app()->getLocale()); ?>">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title><?php echo e(config('app.name', 'Gabsi Jatim')); ?></title>

        <!-- Fonts -->
        <link href="<?php echo e(asset('css/raleway.css')); ?>" rel="stylesheet" type="text/css">

        <!-- Bootstrap -->
        <link href="<?php echo e(asset('css/bootstrap.min.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('css/font-awesome.min.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('css/animate.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('css/prettyPhoto.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('css/style.css')); ?>" rel="stylesheet" />

    </head>
    <body>
      <header>
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
          <div class="navigation">
            <div class="container">
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse.collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                <div class="navbar-brand">
                  <a href="<?php echo e(url('/')); ?>"><h1><span>CV. Karya Anugerah Ekspedisi</span></h1></a>
                </div>
              </div>

              <div class="navbar-collapse collapse">
                <div class="menu">
                  <ul class="nav nav-tabs" role="tablist">
                     
                    
                    <?php if(Route::has('login')): ?>
                        <?php if(Auth::check()): ?>
                            <li class="nav-item">
                                <a class="nav-link js-scroll-trigger" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Log out | <?php echo e(Auth::user()->username); ?></a>
                                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                    <?php echo e(csrf_field()); ?>

                                </form>
                            </li>
                        <?php else: ?>
                        <li role="presentation"><a href="<?php echo e(url('login')); ?>">Login</a></li>
                        <?php endif; ?>
                    <?php endif; ?>

                  </ul>
                </div>
              </div>
            </div>
          </div>
        </nav>
      </header>

    <section id="aye">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panele panel-default">
                        <div class="panel-heading"><h2>LOGIN</h2></div>

                        <div class="panel-body">
                            <form class="form-horizontal" method="POST" action="<?php echo e(route('login')); ?>">
                                <?php echo e(csrf_field()); ?>


                                <div class="form-group<?php echo e($errors->has('username') ? ' has-error' : ''); ?>">
                                    <label for="username" class="col-md-4 control-label">Username </label>

                                    <div class="col-md-6">
                                        <input id="username" type="username" class="form-control" name="username" value="<?php echo e(old('username')); ?>" required autofocus>

                                        <?php if($errors->has('username')): ?>
                                            <span class="help-block">
                                                <strong><?php echo e($errors->first('username')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                                    <label for="password" class="col-md-4 control-label">Password</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control" name="password" required>

                                        <?php if($errors->has('password')): ?>
                                            <span class="help-block">
                                                <strong><?php echo e($errors->first('password')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <!-- <div class="col-md-6 col-md-offset-4"> -->
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>> Ingat Saya
                                            </label>
                                        </div>
                                    <!-- </div> -->
                                </div>

                                <div class="form-group">
                                    <div class="col-md-4 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">
                                            Login
                                        </button>
                                    </div>
                                </div>
                                <!-- <div class="form-group">
                                    <div class="col-md-4 col-md-offset-4">
                                        <a class="btn btn-link" href="<?php echo e(route('register')); ?>">
                                            Belum punya akun?
                                        </a>
                                    </div>
                                </div> -->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

      <footer>
        <div class="footer">
          <div class="container">
            <div class="social-icon">
              
            </div>

            <div class="col-md-4 col-md-offset-4">
              <div class="copyright">
                &copy; CV. Karya Anugerah Eskpedisi. All Rights Reserved.
                <div class="credits">
                  <!--
                    All the links in the footer should remain intact.
                    You can delete the links only if you purchased the pro version.
                    Licensing information: https://bootstrapmade.com/license/
                    Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Company
                  -->
                  <!-- <a href="https://bootstrapmade.com/bootstrap-business-templates/">Bootstrap Business Templates</a> by <a href="https://bootstrapmade.com/">BootstrapMade</a> -->
               <!--  </div>
              </div> -->
            </div>
          </div>

          <div class="pull-right">
            <a href="#home" class="scrollup"><i class="fa fa-angle-up fa-3x"></i></a>
          </div>
        </div>
      </footer>

    <!-- jQuery Bootstrap -->
    <script src="<?php echo e(asset('js/jquery.js')); ?>"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/jquery.prettyPhoto.js')); ?>"></script>
    <script src="<?php echo e(asset('js/jquery.isotope.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/wow.min.js')); ?>"></script>
<!--     <script src="<?php echo e(asset('js/functions.js')); ?>"></script>
 -->
    </body>
</html>
