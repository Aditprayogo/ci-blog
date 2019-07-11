<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title; ?></title>
	<link rel="stylesheet" href="https://bootswatch.com/3/journal/bootstrap.min.css">
	<link rel="stylesheet" href="<?= base_url(); ?>/assets/css/style.css">
</head>
<body>
   
	<nav class="navbar navbar-inverse">
      <div class="container">
	        <div class="navbar-header">
	          <a class="navbar-brand" href="<?= base_url(); ?>">ci-Blog</a>
	      	</div>
	      <div id="navbar">
	          <ul class="nav navbar-nav">
	            <li><a href="<?= base_url(); ?>">Home</a></li>
	            <li><a href="<?= base_url(); ?>about">About</a></li> 
	            <li><a href="<?= base_url(); ?>posts">Blog</a></li>
	            <li><a href="<?= base_url(); ?>categories">Categories</a></li>
	          </ul>
	          <ul class="nav navbar-nav navbar-right">
                <!-- User tidak login -->
                <?php if(!$this->session->userdata('logged_in')) : ?>
                    <li><a href="<?= base_url(); ?>users/login">Login</a></li>
                    <li><a href="<?= base_url(); ?>users/register">Register</a></li>
                <?php endif; ?>
                <!-- User -->
                <?php if($this->session->userdata('logged_in')) : ?>
                    <li><a href="<?= base_url(); ?>posts/create">Create post</a></li>
                    <li><a href="<?= base_url(); ?>categories/create">Create categoriy</a></li>
                    <li><a href="<?= base_url(); ?>users/logout">Logout</a></li>
                <?php endif; ?>
	          </ul>
	       </div>
         </div>
         </div>
         </div>
  	  </nav>

  	  <div class="container">

        <!-- Flash massanges -->
        <?php if($this->session->flashdata('user_registered')) : ?>
            <?php echo '<p class="alert alert-warning">'.$this->session->flashdata('user_registered').'</p>'?>
        <?php endif; ?>

        <!-- Flash massanges -->
        <?php if($this->session->flashdata('post_created')) : ?>
            <?php echo '<p class="alert alert-warning">'.$this->session->flashdata('post_created').'</p>'?>
        <?php endif; ?>

        <!-- Flash massanges -->
        <?php if($this->session->flashdata('post_updated')) : ?>
            <?php echo '<p class="alert alert-warning">'.$this->session->flashdata('post_updated').'</p>'?>
        <?php endif; ?>

        <!-- Flash massanges -->
        <?php if($this->session->flashdata('category_created')) : ?>
            <?php echo '<p class="alert alert-success">'.$this->session->flashdata('category_created').'</p>'?>
        <?php endif; ?>

        <!-- Flash massanges -->
        <?php if($this->session->flashdata('post_deleted')) : ?>
            <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('post_deleted').'</p>'?>
        <?php endif; ?>
        
        <!-- Flash massanges -->
        <?php if($this->session->flashdata('login_success')) : ?>
            <?php echo '<p class="alert alert-warning">'.$this->session->flashdata('login_success').'</p>'?>
        <?php endif; ?>
        
        <!-- Flash massanges -->
        <?php if($this->session->flashdata('login_failed')) : ?>
            <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('login_failed').'</p>'?>
        <?php endif; ?>

        <!-- Flash massanges -->
        <?php if($this->session->flashdata('logout_success')) : ?>
            <?php echo '<p class="alert alert-success">'.$this->session->flashdata('logout_success').'</p>'?>
        <?php endif; ?>
        
        <!-- Flash massanges -->
        <?php if($this->session->flashdata('Category_deleted')) : ?>
            <?php echo '<p class="alert alert-success">'.$this->session->flashdata('Category_deleted').'</p>'?>
        <?php endif; ?>
        

