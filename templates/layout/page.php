<?php $this->renderPartial('parts/page-header.php'); ?>    
    <?php $this->renderPartial('parts/content-header.php'); ?>
    <?php
        echo $content;
    ?>
    <?php $this->renderPartial('parts/content-footer.php'); ?>
<?php $this->renderPartial('parts/page-footer.php'); ?>