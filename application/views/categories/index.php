<h2><?= $title; ?></h2>
<ul class="list-group">
    <?php foreach ($categories as $category) : ?>
        <li class="list-group-item"><a href="<?= site_url('/categories/posts/'.$category['id']); ?>"><?php echo $category['name']; ?></a>
        <?php if($this->session->userdata('user_id') == $category['user_id']) :?>
            <form action="categories/delete/<?php echo $category['id'] ?>" method="post" style="display:inline">
                <input type="submit" class="btn btn-success" value="delete">
            </form>     
        <?php endif; ?>
        </li>
    <?php endforeach; ?>
        
</ul>