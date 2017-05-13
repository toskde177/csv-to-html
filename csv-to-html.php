<?php
$file = fopen("something.csv","r");

$firstTimeHeader = true;
$firstTimeBody = true;

echo "<table>";
while(! feof($file))
{
    $data = fgetcsv($file);
    
    if($firstTimeHeader)
    {
        echo "<thead>";
    }
    else
    {
        if($firstTimeBody)
        {
            echo "</thead>";
            echo "<tbody>";
            $firstTimeBody = false;
        }
    }
    echo "<tr>";
    
    foreach ($data as $value)
    {
        if($firstTimeHeader)
        {
            echo "<th>" . $value . "</th>";
        }
        else
        {
            echo "<td>" . $value . "</td>";
        }
    }
    
    echo "</tr>";
    if($firstTimeHeader)
    {
        $firstTimeHeader = false;
    }
}
echo "</tbody>";
echo "</table>";

fclose($file);
?>
