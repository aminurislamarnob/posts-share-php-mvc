<?php require APP_ROOT.'/views/inc/header.php';?>
<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <h4>Post Detail</h4>
        </div>
        <div class="col-lg-12 mt-4">
            <div class="card mb-3">
                <div class="card-body">
                    <h4><?php echo $data['post']->title; ?></h4>
                    <div class="bg-light p-2 mb-2">
                        <small>Written by <?php echo $data['author']->name; ?> on <?php echo $data['post']->created_at; ?></small>
                    </div>
                    <p class="card-text"><?php echo $data['post']->body; ?></p>
                </div>
            </div>
        </div>
    </div>
    <?php if($data['author']->id == $_SESSION['user_id']) : ?>
    <div class="row">
        <div class="col-md-6">
            <a href="<?php echo URL_ROOT; ?>/posts/edit/<?php echo $data['post']->id; ?>" class="btn btn-primary btn-sm">Edit</a>
        </div>
        <div class="col-md-6 text-right">
            <form action="<?php echo URL_ROOT; ?>/posts/delete/<?php echo $data['post']->id; ?>" method="post">
                <input type="submit" value="Delete" class="btn btn-danger btn-sm">
            </form>
        </div>
    </div>
    <?php endif; ?>
</div>
<?php require APP_ROOT.'/views/inc/footer.php';?>