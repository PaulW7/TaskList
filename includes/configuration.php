<?php
  /*Database Connection Info*/
  /*Required To Complete These**********************************************************************************/
  define('HTTP_SERVER', '127.0.0.1');
  define('DB_TYPE', 'mysql');
  define('DB_CHARSET', 'utf8');
  define('DB_SERVER', 'localhost');
  define('DB_USERNAME', 'root');
  define('DB_PASSWORD', '');
  define('DB_DATABASE_NAME', 'taskdb');
  /****************************************************************************************************************/
  
  /*Database configuration names*/
  define('DB_TABLE_NAME', 'tasks');
  define('DB_SHORT_DESC', 'short_description');
  define('DB_LONG_DESC', 'long_description');
  define('DB_TASK_COMPLETED', 'completed');
  
   /*Page Items*/
  define('PAGE_TITLE', 'My Task List');
  define('BUTTON_DELETE_TASK', 'Delete Tasks');
  define('BUTTON_NEW_TASK', 'Insert New Task');
  define('BUTTON_MARK_COMPLETE','Complete Tasks');
  define('BUTTON_INSERT_TASK','Insert Task');
  define('TABLE_HEAD_SHORT_DESC', 'Title');
  define('TABLE_HEAD_LONG_DESC', 'Detailed Decription');
  define('TABLE_HEAD_COMPLETE_DESC', 'Status');
  define('FOOTER_TEXT', '<p>
<a href="http://jigsaw.w3.org/css-validator/check/referer">
    <img id="cssValidator" style="border:0;width:88px;height:31px"
        src="http://jigsaw.w3.org/css-validator/images/vcss-blue"
        alt="Valid CSS!" />
    </a>
</p>');
  define('FORM_TITLE_TEXT', 'Enter task title:');
  define('FORM_TASK_DETAILS_TEXT', 'Enter task details:');
?>
