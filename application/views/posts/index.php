<h2><?= $title; ?></h2>

    <?php echo $this->pagination->create_links(); ?>
    
    <?php foreach ($posts as $post) : ?>
    <h3><?= $post['title'];?></h3>
        <div class="row">
            <div class="col-md-3">
                <img class="post-thumb thumbnail" src="<?= site_url(); ?>assets/images/posts/<?= $post['post_image']; ?>" width="220">
            </div>
            <div class="col-md-9">
                <small class="post-date">Posted on: <?php echo $post['created_at']; ?> In <strong><?php echo $post['name']; ?></strong></small><br><br>
                <?= word_limiter($post['body'], 60);?>
                <br><br>
                <p><a class="btn btn-success" href="<?= site_url('/posts/'. $post['slug']);  ?>">Read More</a></p>                
            </div>
        </div>
        
        
	<?php endforeach; ?>
    

    
    