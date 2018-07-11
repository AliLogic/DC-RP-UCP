<?php

echo '<p>For a more detailed list, see: <a href="https://dc-rp.com/forum/viewtopic.php?f=2&p=675#p675">Staff Roster (forum link)</a>';

echo '<div class="panel panel-default" style="background-color : #E5E6EB; border: black 1px solid;">
    <div class="panel-body">
        <div class="col-md-12">
            <div class ="news" style="background-color : #E5E6EB;">
                <h1 class="color-black text-left"><i class="fa fa-fw fa-user"></i> Server Management</h1><ul>';

$query = "SELECT * FROM `players` WHERE AdminLevel = 5 ORDER BY `username` ASC";
$result = mysqli_query($connect, $query);

if(mysqli_num_rows($result) > 0)
{
    while($row = mysqli_fetch_assoc($result))
    {
        echo "<li>" .$row["username"]. "</li>";
    }
}

echo '</ul></div>
        </div>
    </div>
</div>';

echo '<div class="panel panel-default" style="background-color : #E5E6EB; border: black 1px solid;">
        <div class="panel-body">
            <div class="col-md-12">
                <div class ="news" style="background-color : #E5E6EB;">
                    <h1 class="color-black text-left"><i class="fa fa-fw fa-user"></i> Lead Administrators</h1><ul>';

$query = "SELECT * FROM `players` WHERE AdminLevel = 4 ORDER BY `username` ASC";
$result = mysqli_query($connect, $query);

if(mysqli_num_rows($result) > 0)
{
    while($row = mysqli_fetch_assoc($result))
    {
        echo "<li>" .$row["username"]. "</li>";
    }
}

echo '</ul></div>
        </div>
    </div>
</div>';

echo '<div class="panel panel-default" style="background-color : #E5E6EB; border: black 1px solid;">
        <div class="panel-body">
            <div class="col-md-12">
                <div class ="news" style="background-color : #E5E6EB;">
                    <h1 class="color-black text-left"><i class="fa fa-fw fa-user"></i> Senior Administrators</h1><ul>';

$query = "SELECT * FROM `players` WHERE AdminLevel = 3 ORDER BY `username` ASC";
$result = mysqli_query($connect, $query);

if(mysqli_num_rows($result) > 0)
{
    while($row = mysqli_fetch_assoc($result))
    {
        echo "<li>" .$row["username"]. "</li>";
    }
}

echo '</ul></div>
        </div>
    </div>
</div>';

echo '<div class="panel panel-default" style="background-color : #E5E6EB; border: black 1px solid;">
        <div class="panel-body">
            <div class="col-md-12">
                <div class ="news" style="background-color : #E5E6EB;">
                    <h1 class="color-black text-left"><i class="fa fa-fw fa-user"></i> General Administrators</h1><ul>';

$query = "SELECT * FROM `players` WHERE AdminLevel = 2 ORDER BY `username` ASC";
$result = mysqli_query($connect, $query);

if(mysqli_num_rows($result) > 0)
{
    while($row = mysqli_fetch_assoc($result))
    {
        echo "<li>" .$row["username"]. "</li>";
    }
}

echo '</ul></div>
        </div>
    </div>
</div>';

echo '<div class="panel panel-default" style="background-color : #E5E6EB; border: black 1px solid;">
        <div class="panel-body">
            <div class="col-md-12">
                <div class ="news" style="background-color : #E5E6EB;">
                    <h1 class="color-black text-left"><i class="fa fa-fw fa-user"></i> Trial Administrators</h1><ul>';

$query = "SELECT * FROM `players` WHERE AdminLevel = 1 ORDER BY `username` ASC";
$result = mysqli_query($connect, $query);

if(mysqli_num_rows($result) > 0)
{
    while($row = mysqli_fetch_assoc($result))
    {
        echo "<li>" .$row["username"]. "</li>";
    }
}

echo '</ul></div>
        </div>
    </div>
</div>';

echo '<div class="panel panel-default" style="background-color : #E5E6EB; border: black 1px solid;">
        <div class="panel-body">
            <div class="col-md-12">
                <div class ="news" style="background-color : #E5E6EB;">
                    <h1 class="color-black text-left"><i class="fa fa-fw fa-user"></i> Community Helpers</h1><ul>';

$query = "SELECT * FROM `players` WHERE HelperLevel > 0 ORDER BY `username` ASC";
$result = mysqli_query($connect, $query);

if(mysqli_num_rows($result) > 0)
{
    while($row = mysqli_fetch_assoc($result))
    {
        echo "<li>" .$row["username"]. "</li>";
        
    }
}

echo '</ul></div>
        </div>
    </div>
</div>';