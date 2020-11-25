<?php
    include("core/config.php");
    $app = new AppModel();
    $actionReturn = $app->init();
    
    include("view/template/template.php");
