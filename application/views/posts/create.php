<h2><?php echo $title ?></h2>

<?php if(validation_errors()) : ?>
<div class="alert alert-danger" role="alert">
	<?php echo validation_errors(); ?>
</div>
<?php endif; ?>

<!-- untuk mengupoad file harus form-open-multipart -->
<?php echo form_open_multipart('posts/create'); ?>
  <div class="form-group">
    <label>Title</label>
    <input type="text" class="form-control"  placeholder="Add title.." name="title">
  </div>
  <div class="form-group">
    <label>Body</label>
    <textarea class="form-control" name="body" rows="3" placeholder="Add body.." id="editor"></textarea>
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
  <!-- Upload Image -->
  <div class="form-group">
        <label for="">Upload image</label>
        <input type="file" name="userfile" size="20">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>