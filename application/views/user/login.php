<div class="container login-container">
    <div class="row">
        <div class="col-md-6 login-form-1" style="margin-left:28%">
            <h3>Login</h3>
            <?php   
                    $success = $this->session->tempdata('success');
                    if($success != ""){
                ?>
            <div class="alert alert-success"> <?php echo $success; ?> </div>
            <?php
                    }
                    ?>
            <?php
                        $failure = $this->session->tempdata('failure');
                        if($failure != "") {
                    ?>
            <div class="alert alert-danger"> <?php echo $failure ; ?> </div>
            <?php 

                }
                ?>

            <?php echo validation_errors(); ?>
            <form action="<?php base_url(); ?>/user/doLogin" method="post">
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>"
                    value="<?php echo $this->security->get_csrf_hash();?>">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Your Email *" value="" name="email" />
                    <?php  echo form_error('email') ?>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Your Password *" value=""
                        name="password" />
                    <?php  echo form_error('password') ?>
                </div>
                <div class="form-group">
                    <input type="submit" class="btnSubmit" value="Login" />
                </div>
                <div class="form-group">
                    <a href="#" class="ForgetPwd">Forget Password?</a>
                </div>
            </form>
        </div>
    </div>