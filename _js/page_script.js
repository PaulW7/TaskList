
var tasksSelected = 0;
$(document).ready(function(){
	
	var titleBox = $('#newTaskTitle');
	titleBox.css("background","yellow").focus();
	 $('#newTaskTitle').on('input',function(e){
		titleBox.css("background","white");
		});
    });

function deleteSelectedTasks()
{
	if(boxesChecked())
	{
		confirm("Are you sure you want to delete the selected tasks?");
	}
	else
	{
		alert("You must select a task to delete and try again!");
		return false;
	}
}

function showComplete()
{
	$('.incompleteTasks').css("display","none");
	$('.completedTasks').css("display","");
	$('#showAll').css("visibility","visible").css("opacity",".5");
	$('#showComplete').css("opacity","1");
	$('#showInComplete').css("opacity",".5");
}

function showInComplete()
{
	$('.completedTasks').css("display","none");
	$('.incompleteTasks').css("display","");
	$('#showAll').css("visibility","visible").css("opacity",".5");
	$('#showComplete').css("opacity",".5");
	$('#showInComplete').css("opacity","1");
}

function showAll()
{
	$('.completedTasks').css("display","");
	$('.incompleteTasks').css("display","");
	$('#showComplete').css("visibility","");
	$('#showInComplete').css("opacity","1");
	$('#showAll').css("opacity","1");
}

function completeSelectedTasks()
{
	if(!boxesChecked())
	{
		alert("You must select a task to mark complete and try again!");
		return false;
	}
}

function boxesChecked()
{
	var taskIDs = [];
	$("input[name='arrayTaskID[]']:checked").each(function(){taskIDs.push($(this).val());});
	if(taskIDs.length > 0)
	{
		return true;
	}
	else
	{
		return false;
	}
}