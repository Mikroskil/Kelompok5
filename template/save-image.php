<?php
    $img = $_POST['img'];
    $img = str_replace('data:image/png;base64,', '', $img);
    $img = str_replace(' ', '+', $img);
    $data = base64_decode($img);
    $filename = uniqid();
    $pathToDirectory = __DIR__ . '/../uploads';
    $file = $pathToDirectory . '/' . $filename . '.png';
    if (!file_exists($pathToDirectory)) {
        mkdir($pathToDirectory, 0777);
    }
    $success = file_put_contents($file, $data);
    $callback = array('msg' => $success ? $filename.'.png' : 'Unable to save the file.');
    echo json_encode($callback);
?>
