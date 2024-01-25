
<?php


echo "<pre>";


function uploadFile()
{

    if ($_FILES) {

        $outDirs = $tempNames = $filePaths = $fileNames = [];

        foreach ($_FILES as $file) {
            foreach ($file as $key => $value) {
                for ($i = 0; $i < count($value); $i++) {

                    if ($key === "name") {

                        $outDir = __DIR__ . "/files/$value[$i]";
                        $filePaths[] = "/files/$value[$i]";
                        $fileNames[] = $value[$i];

                        $outDirs[] = $outDir; // Сохранение выходной директории в массив

                    }

                    if ($key === 'tmp_name') {
                        if (filesize($value[$i]) > 2097152) {
                            echo ('Превышен размер файла');
                            return;
                        }

                        $tempName = $value[$i];
                        $tempNames[] = $tempName; // Сохранение временного имени файла в массив

                    }
                }
            }
        }

        // Перебор массивов с выходными директориями и временными именами файлов
        for ($i = 0; $i < count($outDirs); $i++) {
            if (move_uploaded_file($tempNames[$i], $outDirs[$i])) {
                echo 'Файл успешно загружен: ' . "<a target='_blank' href='$filePaths[$i]'>$fileNames[$i]</a><br>";

                if (str_ends_with($fileNames[$i], ".png") || str_ends_with($fileNames[$i], ".jpg")) {
                    echo "<a href='$filePaths[$i]'><img src='/files/$fileNames[$i]'/></a>";
                }
            } else {
                echo 'Ошибка загрузки файла: ' . $filePaths[$i] . "<br>";
            }
        }

    }
}

function eraseDir(string $path){
    if($_POST){
        $action = $_POST['action'];

        if($action === 'remove'){
            $files = glob($path . '/*');

            foreach ($files as $file) {
                if (is_file($file)) {
                    unlink($file);
                }
            }

            echo 'Все файлы удалены.';
        }
    }
}

uploadFile();
eraseDir(__DIR__ .'/files');

echo "</pre>";
echo "<hr>";

// Logic


// if ($_FILES) {
//     $outDir = __DIR__ . "/files/{$_FILES['file']['name']}";

//     $file = $_FILES["file"] ?? '';

//     if (move_uploaded_file($_FILES['file']['tmp_name'], $outDir)) {
//         $uploaded = "/files/{$_FILES['file']['name']}";
//         echo 'Файл успешно загружен';

//     } else {
//         echo 'Файл не загружен';
//     }



// }







?>




<form 
    method="post"  
    enctype="multipart/form-data"
    action=<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>
>

    <p><input  type="file" multiple name="file[]" id="file"></p>
    
    <div>
        <button type="submit">Загрузить файл</button>
    </div>
    
  

   
</form>

<form method="post"  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">

    <div>
        <button type="submit">Удалить файлы</button>
        <input value="remove" name='action' type="hidden">
    </div>
</form>


