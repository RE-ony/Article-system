<?php

$aid=$_POST["aid"];

$link=mysqli_connect("localhost","root","123456","article");
mysqli_set_charset($link,"utf8");
$result=mysqli_query($link,"select * from articles where article_id='$aid'");
$count=mysqli_num_rows($result);
if($count>0)
{
    while($row = mysqli_fetch_assoc($result))
    {
        echo''.$row["article_title"].'_'.$row["article_content"].'_'.$row["author"].'';

    }
}


mysqli_close($link);
?>