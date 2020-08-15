<?php require APP_ROOT.'/views/inc/header.php';?>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <?php echo flash('login_success'); ?>
            <?php echo flash('post_success'); ?>
        </div>
        <div class="col-lg-6">
            <h4>All Posts</h4>
        </div>
        <div class="col-lg-6 text-right">
            <a href="<?php echo URL_ROOT; ?>/posts/add" class="btn btn-primary"><i class="far fa-edit"></i>Add Post</a>
        </div>
        <div class="col-lg-12 mt-4">
            <?php foreach($data['posts'] as $post) : ?>
            <div class="card mb-3">
                <div class="card-body">
                    <h4><a href="<?php echo URL_ROOT; ?>/posts/show/<?php echo $post->postId; ?>"><?php echo $post->title; ?></a></h4>
                    <small>Written by <?php echo $post->name; ?> on <?php echo $post->postCreatedAt; ?></small>
                    <p class="card-text"><?php echo textExcerpt($post->body, 200); ?></p>
                    <div class="pt-2">
                        <a href="<?php echo URL_ROOT; ?>/posts/show/<?php echo $post->postId; ?>" class="btn btn-primary btn-sm">View Details</a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<?php require APP_ROOT.'/views/inc/footer.php';?>