<?php

    if(isset($_GET['c'])){
    
        $array = array();
        foreach (new DirectoryIterator('views/components/pages/back/settings/') as $fileInfo) {
            if(!$fileInfo->isDot() AND !$fileInfo->isDir()){
                array_push($array, $fileInfo->getFilename());
            }
        }

    }


?>





<section class="main_wrapper">
<?php
    if(isset($_GET['c'])){
        if (in_array($_GET['c'].".php",$array)){
            require ('views/components/pages/back/settings/'.$_GET['c'].'.php');
        }else{
            require ('views/components/pages/root/errors/404.php');
        }
    }
?>
</section>



<script>
$( "[data-type='updt_checkbox']" ).click(function() {
    var name = this.dataset.name;
    var type = 'boolean';

    $.ajax({
        url: 'controller/ajax/updateSettings.php',
        type: 'POST',
        data: {type: type ,name: name},
        success: function(data){
            $('#wrapper_content').load('index.php #ct"'+ name)
        }
    })
});

$( "[data-type='updt_number']" ).change(function() {
    var name = this.dataset.name;
    var val = $( this ).val();
    var type = 'number';

    $.ajax({
        url: 'controller/ajax/updateSettings.php',
        type: 'POST',
        data: {type: type, name: name, val: val},
        success: function(data){
            $('#wrapper_content').load('index.php #ct"'+ name)
        }
    })
});

$( "[data-type='updt_text']" ).change(function() {
    var name = this.dataset.name;
    var val = $( this ).val();
    var type = 'text';

    $.ajax({
        url: 'controller/ajax/updateSettings.php',
        type: 'POST',
        data: {type: type, name: name, val: val},
        success: function(data){
            $('#wrapper_content').load('index.php #ct"'+ name)
        }
    })
});

</script>