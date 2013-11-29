<?php
    $img = $_POST['img'];
    $img = str_replace('data:image/png;base64,', '', $img);
    $img = str_replace(' ', '+', $img);
    $data = base64_decode($img);
    $filename = uniqid();
    $file = __DIR__ . '/../uploads/' . $filename . '.png';
    $success = file_put_contents($file, $data);
    $callback = array('msg' => $success ? $filename.'.png' : 'Unable to save the file.');
    echo json_encode($callback);
?>
