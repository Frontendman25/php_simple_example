<?php
$apps = file('apps.txt');

echo '<table>';

foreach($apps as $line){
    
    $arr = explode('-|-', $line);
    
    echo "<tr>";
    
    foreach($arr as $one){
        echo "<td>$one</td>";
    }
    
    echo "</tr>";
}

echo '</table>';
?>
<style>
    table, td{
        border: 1px solid;
        border-collapse: collapse;
        padding: 6px;
    }
    tr:nth-child(even){
        background-color: #ccc;
    }
</style>
