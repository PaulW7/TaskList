<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="author" content="Paul Wills">
<link rel="stylesheet" type="text/css" href="_css/style.css">
<script type="text/javascript" src="_js/jquery-2.1.3.min.js"></script>
<script type="text/javascript" src="_js/page_script.js"></script>
<!--<script type="text/javascript" src="_js/page_script.js"></script>-->
<?php
    error_reporting(E_ALL);
    require('includes/configuration.php');
    require('includes/functions/functions.php');
    require_once('includes/database.php');     
      if(isset($_POST['newTaskTitle']))
      {
          $newTaskTitle =  ($_POST['newTaskTitle']);
            if (isset($_POST['newTaskDetailedText']))
            {
                $newTaskDetails = ($_POST['newTaskDetailedText']);
            }
            else
            {
                $newTaskDetails = "No details entered....";
            }
            $taskToInsert = [($_POST['newTaskTitle']),$newTaskDetails];
            insertTask($db_connection,$taskToInsert);
            header('Location: index.php');
      }
      else if(isset($_POST['markCompleteBTN']))
      {
          if(!empty($_POST['arrayTaskID']))
          {
            markTaskComplete($db_connection, $_POST['arrayTaskID']);
            header('Location: index.php'); 
          }
      }
      else if(isset($_POST['deleteBTN']))
      {
          if(!empty($_POST['arrayTaskID']))
          {
            deleteTasks($db_connection, $_POST['arrayTaskID']);
            header('Location: index.php'); 
          }
      }

   
    echo '<title>' . PAGE_TITLE . '</title>';
?>
</head>
   

<body>
<?php
    include('includes/header.php');  
?> 

<?php
    $table_top = '<div id="topSort"><a id="showInComplete"  href="javascript:void(0)" onClick="showInComplete()" ><img src="_images/red.png" alt="Completed" class="sort_image"></a>
            <a id="showComplete"  href="javascript:void(0)" onClick="showComplete()" ><img src="_images/green.png" alt="Completed" class="sort_image"></a>
            <a id="showAll"  href="javascript:void(0)" onClick="showAll()" ><img src="_images/both.png" alt="All Tasks" class="sort_image"></a></div>
    
    <Form method="post"><table id="table_main">
                    <tr>
                        <th>' . TABLE_HEAD_SHORT_DESC . '</th>
                        <th>' . TABLE_HEAD_LONG_DESC . '</th>
                        <th>' . TABLE_HEAD_COMPLETE_DESC . '</th>
                    </tr>';
                    
    $table_data =  getTasks($db_connection);

     $table_bottom = '</table>';
     
    /**** Build Table *****/
    echo $table_top . $table_data  . $table_bottom ; 
    
    /***Insert Buttons***/
    echo  '<div id="sortLinks"><button value="1" onclick= "return completeSelectedTasks()" id="markCompleteBTN" name="markCompleteBTN">' . BUTTON_MARK_COMPLETE . '</button>
            <button value="1" id="deleteBTN" name="deleteBTN" onclick= "return deleteSelectedTasks()">' . BUTTON_DELETE_TASK . '</button>
           </div></Form><br></br></br>
           <Form method="post" id="insertForm"><span id="task_title_title">'
                . FORM_TITLE_TEXT . 
                '</span></br><input type="text" name="newTaskTitle" size="60" maxlength="70" id="newTaskTitle" required><br><br><span id="task_details_title">' .
                        FORM_TASK_DETAILS_TEXT .
                        '</span></br><textarea form="insertForm" name="newTaskDetailedText" id="newTaskDetailedText"></textarea>
                        </br>
                            <button type="submit" value="insertTask" id="insertButton" name="">' . BUTTON_INSERT_TASK . '</button></br></form>';
?>
                         
</body>
<footer>
<?php
         include('includes/footer.php');
 ?>

</footer>
</html>
