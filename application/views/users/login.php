<?php echo form_open('users/login'); ?>

    <!-- Login FORM -->
    

     <div class="row">
    
        <div class="col-md-4 col-md-offset-4">

            <div class="card">
                <div class="card-header">
                    <h1 class="text-center"><?php echo $title; ?></h1>
                </div>

                <div class="form-group">
                    <input type="text" name="username" class="form-control" placeholder="Enter Username.." required autofocus autocomplete="off">
                </div>

                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Enter Password.." required autofocus autocomplete="off">
                </div>
                
                <button type="submit" class="btn btn-primary btn-block">Login</button>
            </div>

        </div>

    </div>
    <!-- End of Div row -->
<?php echo form_close(); ?>



    