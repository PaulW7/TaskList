<?php
  
  function getTasks($db_connection)
  {
       $tasksQ = 'SELECT id, ' .  DB_SHORT_DESC . ', ' . DB_LONG_DESC . ', ' . DB_TASK_COMPLETED . ' FROM ' . DB_TABLE_NAME;
      /* $tasksQ = 'SELECT * FROM ' . DB_TABLE_NAME; */
       $result = mysqli_query($db_connection,$tasksQ);
        if($result)
        {   $tableTasks = null;
            while($task_row = mysqli_fetch_assoc($result))
            {                                    
                 if($task_row[DB_TASK_COMPLETED])
                 {
                     $taskClass = "completedTasks";
                     $completeTD = '<td class="Completed"><input type="checkbox" name="arrayTaskID[]" value="' . $task_row["id"] . '" id="' . $task_row["id"] .'"><img src="_images/green.png" alt="Completed" class="status_image"></td>';
                 }
                 else
                 {
                     $taskClass = "incompleteTasks";
                     $completeTD = '<td class="Completed"><input type="checkbox" name="arrayTaskID[]" value="' . $task_row["id"] . '" id="' . $task_row["id"] .'"><img src="_images/red.png" alt="Completed" class="status_image"></td>';
                 }
                 $tableTasks = $tableTasks . '<tr class="' . $taskClass . '"><td class="short_description">' . $task_row[DB_SHORT_DESC] . '</td>
                 <td class="long_description">' . $task_row[DB_LONG_DESC] . '</td>' . $completeTD . '</tr>';               
            }  
        return $tableTasks;
        }
  }
  
  function deleteTasks($db_connection, $array_tasks_id)
  {
      foreach($array_tasks_id as $taskID)
      {
          $taskToDelete = 'DELETE FROM ' . DB_TABLE_NAME . ' WHERE ID = ' . $taskID;
          mysqli_query($db_connection, $taskToDelete);
      }
  }
  
  function insertTask($db_connection,$array_TaskToAdd)
  {   
      $taskToAdd = "INSERT INTO " .  DB_TABLE_NAME . " (" . DB_SHORT_DESC . "," . DB_LONG_DESC ."," . DB_TASK_COMPLETED . ") VALUES ('" . $array_TaskToAdd[0] . "','" . $array_TaskToAdd[1] . "','0')";
      mysqli_query($db_connection, $taskToAdd);
  }
               
    function markTaskComplete($db_connection,$array_TaskToComplete)
  {   
        foreach($array_TaskToComplete as $taskID)
            {
                $taskToComplete = "UPDATE " .  DB_TABLE_NAME . " SET " . DB_TASK_COMPLETED . "= 1 WHERE id = ".  $taskID;
                mysqli_query($db_connection, $taskToComplete);
            } 
  }
?>
