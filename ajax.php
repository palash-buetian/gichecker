<?php

// Include config file
require_once "config.php";

if (isset($_POST['dag']))
{
    $dag = (int)$_POST['dag'];

    if ($_POST['mouza'] != 0)
    {
        $mouza = $_POST['mouza'];

        $query = "SELECT * FROM dag WHERE (sa_dag LIKE '{$dag}%' OR bs_dag LIKE '{$dag}%') ORDER BY sa_dag, bs_dag DESC LIMIT 20";
    }
    else
    {
        $query = "SELECT * FROM dag WHERE sa_dag LIKE '{$dag}%' OR bs_dag LIKE '{$dag}%' ORDER BY sa_dag, bs_dag DESC LIMIT 20";
    }
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0)
    {
        echo '<ul class="list-group">';

        $i = 0;
        while ($info = mysqli_fetch_array($result))
        {

            $mouja_query = "SELECT * FROM `mouja` WHERE id ={$info['mouja_id']}";

            $mouja_result = mysqli_query($conn, $mouja_query);
            $mouja_info = mysqli_fetch_array($mouja_result);

            //var_dump($mouja_info);

            $interest_query = "SELECT * FROM `interest` WHERE interest_id ={$info['interest_id']}";

            $interest_result = mysqli_query($conn, $interest_query);
            $interest_info = mysqli_fetch_array($interest_result);




            $exact = false;
            if (($dag == $info['sa_dag']) or ($dag == $info['bs_dag']))
            {
                $exact = true;
            }
            if ($info['bs_dag'] == NULL)
            {
                $dag_out = ' এসএ <span>' . $info['sa_dag'] . '</span>';
            }
            else
            {
                $dag_out = 'বিএস  <span>' . $info['bs_dag'] . '</span>';
            }
            $str = $mouja_info['name'] . ' মৌজার ' . $dag_out . ' দাগে ' . $interest_info['interest_name'];
            echo '<li class="';
            if ($exact)
            {
                echo 'exact ';
            }
            echo 'list-group-item list-group-item-danger">' . $str . "</li>";
        }
        echo '</ul>';
    }
    else
    {
        echo '
        <div class="empty list-group-item list-group-item-action list-group-item-success"> 
        <i class="pull-right icon-chevron-right"></i>
        এই দাগে কোন সরকারি স্বার্থ খুঁজে পাওয়া যায় নাই।
        </div>';
    }

}
?>
