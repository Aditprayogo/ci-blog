<h2><?php echo $title ?></h2>

<?php if(validation_errors()) : ?>
<div class="alert alert-danger" role="alert">
	<?php echo validation_errors(); ?>
</div>
<?php endif; ?>

<?php echo form_open('posts/update'); ?>
  <input type="hidden" name="id" value="<?= $post['id']; ?>">

  <div class="form-group">
    <label>Title</label>
    <input type="text" class="form-control"  placeholder="Add title.." name="title" value="<?php echo $post['title']; ?>">
  </div>

  <div class="form-group">
    <label>Body</label>
    <textarea class="form-control" name="body" rows="3" placeholder="Add body.." id="editor"><?php echo $post['body'];?></textarea>
  </div>

<!-- Label untuk categories -->
   <div class="form-group">
     <label for="">Categories</label>
     <select name="category_id" id="" class="form-control">
        <?php foreach( $categories as $category ) : ?>
            <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
        <?php endforeach; ?>
     </select>
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>