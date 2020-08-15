<?php require APP_ROOT.'/views/inc/header.php';?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h3>Add Post</h3>
                    <form action="<?php echo URL_ROOT;?>/posts/add" method="POST">
                        <div class="form-group">
                            <label for="title">Title <span>*</span></label>
                            <input type="text" class="form-control <?php echo (!empty($data['title_err'])) ? 'is-invalid' : ''; ?>" name="title" id="title_err" placeholder="Post title" value="<?php echo $data['title']; ?>">
                            <div class="invalid-feedback"><?php echo $data['title_err']; ?></div>
                        </div>
                        <div class="form-group">
                            <label for="body">Description <span>*</span></label>
                            <textarea class="form-control <?php echo (!empty($data['body_err'])) ? 'is-invalid' : ''; ?>" name="body" id="body" placeholder="Post body"><?php echo $data['body']; ?></textarea>
                            <div class="invalid-feedback"><?php echo $data['body_err']; ?></div>
                        </div>
                        <input type="submit" value="Add Post" class="btn btn-success">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require APP_ROOT.'/views/inc/footer.php';?>