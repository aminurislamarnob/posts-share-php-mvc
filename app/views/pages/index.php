<?php require APP_ROOT.'/views/inc/header.php';?>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="jumbotron">
                <h1 class="display-4"><?php echo $data['title']; ?></h1>
                <p><?php echo $data['description']; ?></p>
            </div>
        </div>
    </div>
</div>
<?php require APP_ROOT.'/views/inc/footer.php';?>