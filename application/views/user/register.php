<div class="container">
    <div class="row">
        <div class="col-md-6 login-form-1" style="margin-left:28%">
            <?php echo validation_errors(); ?>

            <?php //echo form_open('form'); form_open_multipart($base_url."/create");  ?>
            <form action="<?php echo $base_url; ?>/create" method="post">
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>"
                    value="<?php echo $this->security->get_csrf_hash();?>">
                <h2>Sign Up</h2>
                <p>Please fill in this form to create an account!</p>

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

                <hr>
                <div class="form-group">
                    <input type="text" class="form-control" name="fullname" placeholder="Full Name" required="required">
                    <?php echo form_error('fullname'); ?>
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" name="email" placeholder="Email" required="required">
                    <?php echo form_error('email'); ?>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="mobile" placeholder="Mobile" required="required">
                    <?php echo form_error('mobile'); ?>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="Password"
                        required="required">
                    <?php echo form_error('password'); ?>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="passconf" placeholder="Confirm Password"
                        required="required">
                    <?php echo form_error('passconf'); ?>
                </div>
                <div class="form-group">
                    <label class="form-check-label"><input type="checkbox" required="required"> I accept the <a
                            href="#">Terms
                            of Use</a> &amp; <a href="#">Privacy Policy</a></label>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg">Sign Up</button>
                </div>
            </form>
            <div class="hint-text">Already have an account? <a href="#">Login here</a></div>
        </div>