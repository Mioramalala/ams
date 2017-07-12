<?php
if(is_file('progress.txt')) {
    echo file_get_contents('progress.txt');
} else {
    echo '0';
}
?>