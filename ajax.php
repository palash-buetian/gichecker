<?php

// Include config file
require_once "config.php";

if (isset($_POST['dag']))
{
    $dag = $_POST['dag'];

    if ($_POST['mouza'] != 0)
    {
        $mouza_id = $_POST['mouza'];

        $query = "SELECT * FROM dag WHERE (sa_dag LIKE '{$dag}%' OR bs_dag LIKE '{$dag}%') AND `mouja_id`='$mouza_id' ORDER BY CASE WHEN (sa_dag='{$dag}' OR bs_dag='{$dag}') THEN 1 WHEN (sa_dag LIKE '{$dag}%' OR bs_dag LIKE '{$dag}%') THEN 2 ELSE 3 END LIMIT 20";
    }
    else
    {
        $query = "SELECT * FROM dag WHERE (sa_dag LIKE '{$dag}%' OR bs_dag LIKE '{$dag}%')  ORDER BY CASE WHEN (sa_dag='{$dag}' OR bs_dag='{$dag}') THEN 1 WHEN (sa_dag LIKE '{$dag}%' OR bs_dag LIKE '{$dag}%') THEN 2 ELSE 3 END LIMIT 20";
    }

  //print_r($query);

    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) && mysqli_num_rows($result) > 0)
    {
        echo '<ul class="list-group" style=" max-height: 40vh !important;">';

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


            $exact = '';

            if (($dag == $info['sa_dag']) or ($dag == $info['bs_dag']))
            {
                $exact = 'exact';
            }

            $info['sa_dag'] = en2bn($info['sa_dag']);
            $info['bs_dag'] = en2bn($info['bs_dag']);


             if ($info['bs_dag'] == '0' || $info['bs_dag'] == NULL)
            {


                $dag_out = ' এসএ ' . $info['sa_dag'] ;
            }
            
            
            if($info['sa_dag']=='0'){
                $dag_out = ' বিএস ' . $info['bs_dag'];
            }
            
            
            if ($info['sa_dag'] != '0' && $info['bs_dag'] != '0')
            {
                $dag_out = ' এসএ ' . $info['sa_dag'].' দাগে';

				if ($info['sa_class'] != '0')
				{
					$dag_out .= ' ('.$info['sa_class'].' শ্রেণি)';
				}
				
				$dag_out .= ' এবং বিএস ' . $info['bs_dag'] ;
				
				if ($info['bs_class'] != '0')
				{
					$dag_out .= ' ('.$info['bs_class'].' শ্রেণি)';
				}				
            }


            $str = $mouja_info['name'] . ' মৌজার ' . $dag_out . ' দাগে ' . $interest_info['interest_name'];

            $is_comment = 'collapsible ';
            if ($info['comments'] == '0' || $info['comments'] == NULL)
            {
                $is_comment = '';
            }

            echo '<li class="'.$is_comment. $exact. ' list-group-item list-group-item-danger">' . $str;
           if ($is_comment){
               echo '<div class="contents"> <p>⮞ '.$info['comments'].'</p></div>';
           }
            echo "</li>";
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

function en2bn($input){
    $bn_digits=array('০','১','২','৩','৪','৫','৬','৭','৮','৯');
    $output = str_replace(range(0, 9),$bn_digits, $input);
    return $output;
}
?>
