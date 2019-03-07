<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0" name="viewport">
	<?php echo $this->Html->charset(); ?>
        <title>
		<?php echo 'Booking System for tutoring';  ?> |
		<?php echo $this->fetch('title'); ?>
        </title>
	<?php
            echo $this->Html->meta('icon');

            echo $this->Html->css(array('style.default'));

            echo $this->fetch('meta');
            echo $this->fetch('css');		
	?>
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="signin">
        <!-- Preloader -->
        <section>

            <div class="signinpanel">
                <div class="logo">
                    <img class="logo_image" src="<?php echo $this->request->webroot . 'images/logo.png'; ?>" alt="">
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="signin-info">
                            <div class="logopanel">
                                <div class="logo">
                                    
                                </div>
                               <!--<h1>
                                         Admin   
                                </h1>-->
                            </div>
                            <div class="mb20"></div>
                        </div>
                    </div>
                <?php echo $this->fetch('content');?>
                    <div class="col-md-3">
                    </div>
                </div>
                <!-- row -->

            </div>
            <!-- signin -->

        </section>
<?php
echo $this->Html->script(array('jquery-3.3.1.min', 'bootstrap.min'));
echo $this->fetch('script');
?>
    </body>
</html>
