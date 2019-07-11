
<h2><?php echo $post['title'] ?></h2>
<small class="post-date">Posted on : <?php echo $post['created_at']; ?></small><br><br>
    <img class="post-thumb thumbnail" src="<?= site_url(); ?>assets/images/posts/<?= $post['post_image']; ?>" width="220">
<div class="post-body">
	<?php echo $post['body']; ?>
</div>

<!-- // untuk menampilkan menu pada edit/comment  -->
<?php if($this->session->userdata('user_id') == $post['user_id']) :?>
    <hr>
    <a href="<?php echo base_url(); ?>posts/edit/<?php echo $post['slug']; ?>" class="btn btn-success pull-left">Edit</a>
    <?php echo form_open('/posts/delete/'. $post['id']); ?>
        <input type="submit" name="" value="Delete" class="btn btn-danger">
    </form>
<?php endif; ?>

<!-- // Untuk comment -->
<hr>
    <h3>Comments</h3>
    <!-- Jika commenctnya ada -->
    <?php if($comments) : ?>
        
        <?php foreach($comments as $comment) : ?>
            <div class="well">
                <h5><?php echo $comment['body']; ?> [by <strong><?php echo $comment['name']; ?></strong>]</h5>
            </div>
        <?php endforeach; ?>
       
            
        <?php else : ?>
            <p>No comments displayed</p>
    <?php endif; ?>

<hr>
<h3>Add comment</h3>
    <?php if(validation_errors()) : ?>
        <div class="alert alert-danger" role="alert">
            <?php echo validation_errors(); ?>
        </div>
    <?php endif; ?>
<?php echo form_open('comments/create/'.$post['id']); ?>

    <div class="form-group">
        <label for="">Name</label>
        <input type="text" name="name" class="form-control">
    </div>
    <div class="form-group">
        <label for="">Email</label>
        <input type="text" name="email" class="form-control">
    </div>
    <div class="form-group">
        <label for="">Body</label>
        <textarea type="text" name="body" class="form-control"></textarea>
    </div>
    <input type="hidden" name="slug" value="<?php echo $post['slug']; ?>">
    <button type="submit" class="btn btn-primary">Submit</button>

</form>
	