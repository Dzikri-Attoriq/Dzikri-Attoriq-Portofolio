
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Responsive Admin Dashboard Template">
        <meta name="keywords" content="admin,dashboard">
        <meta name="author" content="stacks">
        <!-- The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        
        <!-- Title -->
        <title>SINFOJA - <?php echo e($title ?? "Login"); ?></title>

        <!-- Styles -->
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,900&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
        <link href="/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="/assets/plugins/font-awesome/css/all.min.css" rel="stylesheet">

      
        <!-- Theme Styles -->
        <link href="/assets/css/connect.min.css" rel="stylesheet">
        <link href="/assets/css/dark_theme.css" rel="stylesheet">
        <link href="/assets/css/custom.css" rel="stylesheet">

        <link rel="stylesheet" href="/assets/sweetalert2/sweetalert2.min.css">
        <link rel="stylesheet" href="/assets/sweetalert2/animate.min.css">

        <style>
            .swal2-popup {
                font-size: 1rem !important;
            }
        </style>

    </head>
    <body class="auth-page sign-in">
        
        <div class="connect-container align-content-stretch d-flex flex-wrap">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="auth-form">
                            <div class="row">
                                <div class="col">
                                    <div class="logo-box"><a href="/login" class="logo-text">SINFOJA</a></div>
                                    <form action="/login" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <div class="form-group">
                                            <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Enter email">
                                            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <small class="text-danger pl-3"><?php echo e($message); ?></small>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                                            <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <small class="text-danger pl-3"><?php echo e($message); ?></small>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-block btn-submit">Sign In</button>
                                        <div class="auth-options">
                                            
                                            
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 d-none d-lg-block d-xl-block">
                        <div class="auth-image"></div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Javascripts -->
        <script src="/assets/plugins/jquery/jquery-3.4.1.min.js"></script>
        <script src="/assets/plugins/bootstrap/popper.min.js"></script>
        <script src="/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="/assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <script src="/assets/js/connect.min.js"></script>
        <script src="/assets/sweetalert2/sweetalert2.min.js"></script>

        <?php if(session()->has('gagalLogin')): ?>
            <script>
                let message = '<?php echo e(session('gagalLogin')); ?>';
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal!',
                    text: message,
                })
            </script>
        <?php endif; ?>
        <?php if(session()->has('success')): ?>
            <script>
                let message = '<?php echo e(session('success')); ?>';
                Swal.fire({
                    icon: 'success',
                    title: 'Succes!',
                    text: message,
                })
            </script>
        <?php endif; ?>
    </body>
</html><?php /**PATH D:\xampp2\htdocs\App-pohon-DLH\resources\views/login.blade.php ENDPATH**/ ?>