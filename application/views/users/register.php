
<?php if(validation_errors()) : ?>
    <div class="alert alert-danger" role="alert">
        <?php echo validation_errors(); ?>
    </div>
<?php endif; ?>

    <?php echo form_open('users/register'); ?>  
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <h1 class="text-center"><?= $title; ?></h1>
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" class="form-control" name="name" placeholder="name" autocomplete="off">
                </div>

                <div class="form-group">
                    <label for="">Zipcode</label>
                    <input type="text" class="form-control" name="zipcode" placeholder="zipcode" autocomplete="off">
                </div>

                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" class="form-control" name="email" placeholder="email" autocomplete="off">
                </div>

                <div class="form-group">
                    <label for="">Username</label>
                    <input type="text" class="form-control" name="username" placeholder="username" autocomplete="off">
                </div>

                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="password" autocomplete="off">
                </div>

                <div class="form-group">
                    <label for="">Confirm Password</label>
                    <input type="password" class="form-control" name="password2" placeholder="confirm password" autocomplete="off">
                </div>
                <button type="submit" class="btn btn-primary btn-block">Register</button>
            </div>
        </div>
    <?php echo form_close(); ?>