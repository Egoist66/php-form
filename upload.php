
<?php


    echo "<pre>";
        print_r($_FILES['file'] ?? '');
    echo "</pre>";

    echo "<hr>";

?>




<form 
    method="post"  
    enctype="multipart/form-data"
    action=<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>
>



    <p><input type="file" name="file" id="file"></p>
    
    <div>
        <button type="submit">Загрузить файл</button>
    </div>


</form>