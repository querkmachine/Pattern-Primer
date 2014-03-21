<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width">
<title>Pattern Primer</title>
<link rel="stylesheet" href="global.css">
<style>
.pattern {
    margin-bottom: 2%;
    border: 1px solid #dedede;
    clear: both;
    overflow: hidden;
}
.pattern .display {
    padding: 2%;
}
.pattern .source {
    padding: 0.5em 1em;
    background: #dedede;
}
.pattern .source textarea {
    margin-top: 0.5em;
    width: 100%;
    resize: vertical;
}
</style>
</head>
<body>

<?php
$files = array();
$handle=opendir('patterns');
while (false !== ($file = readdir($handle))):
    if(stristr($file,'.html')):
        $files[] = $file;
    endif;
endwhile;
sort($files);
foreach ($files as $file):
    echo '<div class="pattern">';
    echo '<details class="source">';
    echo '<summary>'.$file.'</summary>';
    echo '<textarea rows="6" cols="30">';
    echo htmlspecialchars(file_get_contents('patterns/'.$file));
    echo '</textarea>';
    echo '</details>';
    echo '<div class="display">';
    include('patterns/'.$file);
    echo '</div>';
    echo '</div>';
endforeach;
?>

</body>
</html>
