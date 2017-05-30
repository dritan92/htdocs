var levelArray=[];
var colorsArray = [];
colorsArray [0] = '#00ff68';
colorsArray [1] = '#6cff00';
colorsArray [2] = '#9bff00';
colorsArray [3] = '#b3ff00';
colorsArray [4] = '#caff00';
colorsArray [5] = '#edff00';
colorsArray [6] = '#ffe100';
colorsArray [7] = '#ffb200';
colorsArray [8] = '#ff9b00';
colorsArray [9] = '#ff6c00';
colorsArray [10] = '#ff2500';
colorsArray [11] = '#ff2500';
var compTaskArray = [];
var result3=[];


$(function(){
  var colorsArray = [];
  colorsArray [0] = '#00ff68';
colorsArray [1] = '#6cff00';
colorsArray [2] = '#9bff00';
colorsArray [3] = '#b3ff00';
colorsArray [4] = '#caff00';
colorsArray [5] = '#edff00';
colorsArray [6] = '#ffe100';
colorsArray [7] = '#ffb200';
colorsArray [8] = '#ff9b00';
colorsArray [9] = '#ff6c00';
colorsArray [10] = '#ff2500';
colorsArray [11] = '#ff2500';
  var globalTeam=0;
 $("#subteams").html("<select name='subteams'  multiple class='form-control'> </select> ");
 
} );
function assignLevel (val){
var lvl = levelArray[val];
$("#tLevel").val(lvl);
}
function fetchProjectTask(val)
{
  $("#projectTasks").html('');
  $.ajax({
        url: "../fetchSubTeams1.php",
        type: "post",
        data: "projectId="+val,
        success: function (response) {
          var result = JSON.parse(response);
            if(result.length >0){
            var htm="<select name='title'  class='form-control' onchange='assignLevel(this.value)'><option value=''>Select Task</option> ";
            for(var i=0;i<result.length;i++){
              levelArray[result[i].id] = result[i].level;
                htm +="<option value='"+result[i].id+"' >"+ result[i].name+ " </option>";
        }
        htm+="</select><span class='help-block'></span>";
      $("#projectTasks").html(htm);
      }else
      {
        $("#projectTasks").html("<select name='title'  class='form-control'>"); 
      }
      
        },
        
        error: function(jqXHR, textStatus, errorThrown) {
           console.log(textStatus, errorThrown);
        }


    });
}
function fetchSubTeams(val)
{
  $("#subteams").html('');
	$.ajax({
        url: "../fetchSubTeams1.php",
        type: "post",
        data: "values="+val,
        success: function (response) {
          var result = JSON.parse(response);
            if(result.length >0){
            var htm="<select name='subteams[]' multiple class='form-control'> ";
            for(var i=0;i<result.length;i++){
            		htm +="<option value='"+result[i].id+"' >"+ result[i].name+ " </option>";
  			}
        htm+="</select>";
      $("#subteams").html(htm);
      }else
      {
        $("#subteams").html("<select name='subteams' multiple class='form-control'>"); 
      }
			
        },
        
        error: function(jqXHR, textStatus, errorThrown) {
           console.log(textStatus, errorThrown);
        }


    });
}
function fetchSubTeamsAndUsers(val)
{
  var bestFit='';
  var taskLevel = 0; 
  var freeEmployees =[];
  var employeeId= [];
  globalTeam = val;
  if($("#tLevel").val() =="")
  {
    alert("Please select task first..");
  }
  else{
   taskLevel =  $("#tLevel").val(); 

  $("#subteams").html('');
  $.ajax({
        url: "../fetchSubTeams1.php",
        type: "post",
        data: "values="+val,
        success: function (response) {
          var result = JSON.parse(response);
            if(result.length >0){
            var htm="<select name='subteams' id='subteams' class='form-control' onchange=fetchUsers(this.value)> ";
            htm+="<option value=''>Select Sub-Team </option> ";
            for(var i=0;i<result.length;i++){
                htm +="<option value='"+result[i].id+"' >"+ result[i].name+ " </option>";
        }
         htm+="</select>";
      $("#subteams").html(htm);
      }
      else{
        var htm="<select name='subteams' multiple class='form-control'> ";
        htm+="</select>";
      $("#subteams").html(htm);
      }
     
        },
        
        error: function(jqXHR, textStatus, errorThrown) {
           console.log(textStatus, errorThrown);
        }


    });


   /*$.ajax({
        url: "../fetchSubTeams1.php",
        type: "post",
        data: "teamId="+val,
        success: function (response) {
          var result = result1= JSON.parse(response);
          //var result1 = 
            if(result.length >0){
              var html='<h4> Team Members</h4>';
              var html1='<h4> Team Members</h4>';
              html1 += "<table class='table  table-bordered table-responsive'>";
              html1 += "<thead><tr><td style='width:5%'>Select</td><td style='width:5%'>Name</td><td style='width:5%'>Level</td><td style='width:5%'>Max</td><td style='width:5%'>Assigned</td><td style='width:5%'>Av</td><td style='width:20%'>Due Date</td><td style='width:15%'>Completed Tasks</td></tr></thead>";
             var checkedvar='';
             var busyFlag =true;
             var checkedId= 0;
             var priorityFlag = false;
            for(var i=0;i<result.length;i++){
               if(!result[i].busy && busyFlag){checkedvar='checked ';busyFlag=false;}else if(result[i].busy){checkedvar='disabled';} else if(result[i].level < taskLevel){
                  checkedvar='disabled';
                }
                else{
                    checkedvar='';      
                }
                if(checkedvar !='disabled' && !result[i].busy){
                  freeEmployees[result[i].username] = result[i].comp; 
                  employeeId[result[i].username] = result[i].id;
                  
                }
                
                var ubusy='';
                var points="0";  
                var style="";

                if(result[i].busy){
                  ubusy='No';
                }else{ubusy='Yes';}
                if(result[i].points!=""){
                  points=result[i].points;
                }
                if(checkedvar === 'checked '){
                 
                  style = "style='background:red;'";
                  checkedId = result[i].id; 
                }
                else{
                  style = "style='background:red;'";
                }
                html1 += "<tr "+style+" id=d_"+result[i].id+"><td><input type='radio'  name='members' value='"+result[i].id+"' id='id_"+result[i].id+"' "+checkedvar+" onchange='changeVal(this.value)'></td>";
                html1 +="<td>"+ result[i].name+ "</td>";
                html1 +="<td>"+ result[i].level+ "</td>";
                html1 +="<td>"+ result[i].max_tasks+ "</td>";
                html1 +="<td>"+ points+ "</td>";
                html1 +="<td>"+ ubusy+ "</td>";
                html1 +="<td>"+ result[i].due + "</td>";
                html1 +="<td>"+ result[i].comp + "</td>";
                html1 +="</tr>";
                html +="<input type='radio'  name='members' value='"+result[i].id+"' id='id_"+result[i].id+"' "+checkedvar+" > &nbsp &nbsp"+ result[i].name+ "&nbsp&nbsp&nbsp"+ result[i].level+ " &nbsp&nbsp&nbsp"+ result[i].max_tasks+ " &nbsp&nbsp&nbsp"+result[i].busy+"<br>";     
        }
      
        var bestName = result[0].username ;
        var bestEmpoyee  = '';
        var bestId = 0;
        var best=0;
        var jId =-1;
        for(var i=0;i<result.length;i++){
          
          if((result[i].username in freeEmployees)){
            console.log("best : ",best, " 2nd : ",freeEmployees[result[i].username])
            if(parseInt(freeEmployees[result[i].username]) > best)
            {
              best = freeEmployees[result[i].username];
              bestId = result[i].id;
              priorityFlag = true;
            }
            else if(parseInt(freeEmployees[result[i].username]) == best){
              for(var j=0 ; j<result1.length ; j++){
                if(result1[j].id ==parseInt( employeeId[result[i].username] )   ){
                  jId = j;
                }

              }
              var EmpId = employeeId[result[i].username];
              console.log("EmpId : ",EmpId, "Array :",employeeId)
              if(result[i].due < result[jId].due  && result[jId].due != 'NA' && result[i].due !='NA'){
                bestId = result[i].id;
              }
              else if(result[i].due =='NA'){
               bestId = result[i].id; 
              }
              else if(result[jId].due == 'NA'){
               bestId = result[jId].id;  
              }
              else{
                //bestId = result[i].id; 
              }
            }

            
          }
          else{
            $("#d_"+result[i].id).addClass("redStyle");
          }
          
        }
        
      $("#radioGroup1").html(html1);
      $("#d_"+bestId).addClass("applyStyle");
      if(! priorityFlag){
        $("#d_"+checkedId).addClass("applyStyle");
      }
      $("#id_"+bestId).attr("checked", "checked");
      $("#bestVal").val(bestId);
      $("#bestVal2").val(bestId);
      }
      else{
       $("#radioGroup").html(''); 
       $("#radioGroup1").html(''); 
      }
      
        },
        
        error: function(jqXHR, textStatus, errorThrown) {
           console.log(textStatus, errorThrown);
        }


    });
*/
  }
}
function fetchUsers(teamVal){
  var bestFit='';
  var taskLevel = 0; 
  var freeEmployees =[];
  var employeeId= [];
  var gardientArray= [];

  var val1 = $("#team").val();
  console.log("val : ",val1, "globalTeam : ",globalTeam);
  if($("#tLevel").val() =="")
  {
    alert("Please select task first..");
  }
  else{
   taskLevel =  $("#tLevel").val();
  
  $.ajax({
        url: "../fetchSubTeams1.php",
        type: "post",
        data: "teamId="+globalTeam+"&subTeamId="+teamVal,
        success: function (response) {
          // console.log(response);
          var result = result1=  JSON.parse(response);
           result3 =result; 

            if(result.length >0){
              var html='<h4> Team Members</h4>';
              var html1='<h4> Team Members</h4>';
              html1 += "<table class='table  table-bordered table-responsive'>";
              html1 += "<thead><tr><td style='width:5%'>Select</td><td style='width:5%'>Name</td><td style='width:5%'>Level</td><td style='width:5%'>Max</td><td style='width:5%'>Assigned</td><td style='width:5%'>Av</td><td style='width:20%'>Due Date</td><td style='width:5%'>Tasks</td></tr></thead>";
             var checkedvar='';
             var busyFlag =true;
             var checkedId= 0;
             var priorityFlag = false;
            for(var i=0;i<result.length;i++){
               //$("#d_"+result[i].id).addClass("applyStyle");
              compTaskArray[i]=parseInt(result[i].comp);
               if(!result[i].busy && busyFlag){checkedvar='checked ';busyFlag=false;}else if(result[i].busy){checkedvar='disabled';} else if(result[i].level < taskLevel){
                  checkedvar='disabled';
                }
                else{
                    checkedvar='';      
                }
                if(checkedvar !='disabled' && !result[i].busy){
                  freeEmployees[result[i].username] = result[i].comp; 
                  employeeId[result[i].username] = result[i].id;
                  
                }
                
                var ubusy='';
                var points="0";  
                var style="";
                var maxTasks = result[0].comp;
                  var gardientDiff = maxTasks/11;
              console.log("gardientDiff",gardientDiff);
              var l=1;
              gardientArray [0] = parseInt(maxTasks);
              for(var k=10 ; k>=0 ; k--){
                //var gardientDiff = maxTasks/11;
                gardientArray [l] = Math.ceil(gardientDiff * k);
                l++;

              }
                var colorval = compTaskArray[i];
                console.log("colorval: ",i, colorval);
                console.log("gardientArray",gardientArray)
                var gard =gardientArray.indexOf(colorval, 0);
                console.log("gardientIndex  style class grad:...",gard,colorsArray)
                console.log("colorsArray[gard]",colorsArray[gard]);
                style = "style='background:"+colorsArray[gard]+"'";
                

                if(result[i].busy){
                  ubusy='No';
                }else{ubusy='Yes';}
                if(result[i].points!=""){
                  points=result[i].points;
                }
                if(checkedvar === 'checked '){
                 
                  //style = "style='background:red;'";
                  checkedId = result[i].id; 
                }
                else{
                 // style = "style='background:red;'";
                }
                html1 += "<tr "+style+" id=d_"+result[i].id+"><td><input type='radio'  name='members' value='"+result[i].id+"' id='id_"+result[i].id+"' "+checkedvar+" onchange='changeVal(this.value)'></td>";
                html1 +="<td>"+ result[i].name+ "</td>";
                html1 +="<td>"+ result[i].level+ "</td>";
                html1 +="<td>"+ result[i].max_tasks+ "</td>";
                html1 +="<td>"+ points+ "</td>";
                html1 +="<td>"+ ubusy+ "</td>";
                html1 +="<td>"+ result[i].due + "</td>";
                html1 +="<td>"+ result[i].comp + "</td>";
                html1 +="</tr>";
                html +="<input type='radio'  name='members' value='"+result[i].id+"' id='id_"+result[i].id+"' "+checkedvar+" > &nbsp &nbsp"+ result[i].name+ "&nbsp&nbsp&nbsp"+ result[i].level+ " &nbsp&nbsp&nbsp"+ result[i].max_tasks+ " &nbsp&nbsp&nbsp"+result[i].busy+"<br>";     
        }
      
        var bestName = result[0].username ;
        
        var bestEmpoyee  = '';
        var bestId = 0;
        var best=0;
        var jId =-1;
        for(var i=0;i<result.length;i++){
          $("#d_"+result[i].id).addClass("applyStyle");
          if((result[i].username in freeEmployees)){
            //console.log("best : ",best, " 2nd : ",freeEmployees[result[i].username])
            if(parseInt(freeEmployees[result[i].username]) > best)
            {
              best = freeEmployees[result[i].username];
              bestId = result[i].id;
              priorityFlag = true;
            }
            else if(parseInt(freeEmployees[result[i].username]) == best){
              for(var j=0 ; j<result1.length ; j++){
                if(result1[j].id ==parseInt( employeeId[result[i].username] )   ){
                  jId = j;
                }

              }
            /*  var gardientDiff = maxTasks/11;
              console.log("gardientDiff",gardientDiff);
              var l=1;
              gardientArray [0] = parseInt(maxTasks);
              for(var k=10 ; k>=0 ; k--){
                //var gardientDiff = maxTasks/11;
                gardientArray [l] = Math.ceil(gardientDiff * k);
                l++;

              }*/
              $("#d_"+result[i].id).css("background-color", "red");
              //console.log("result3",result3);
                
                /*for(var m=0 ; m<result3.length ; m++) {
                  var colorvalue = compTaskArray[m];
                  console.log("index : ", m , "value",compTaskArray[m]);
                  var gardientIndex =gardientArray.indexOf(colorvalue);
                  //$("#d_"+checkedId).addClass("applyStyle");
                  
                  console.log("id : ","#d_"+result3[m].id);
                  $("#d_"+result3[m].id).css("background-color", "red");
                 
                }*/
              var EmpId = employeeId[result[i].username];
              //console.log("EmpId : ",EmpId, "Array :",employeeId)
              if(result[i].due < result[jId].due){
                console.log("result[i].due is lessser", result[i].due);
              }
              else
              {
               console.log("result[jId].due is lessser",  result[jId].due); 
              }
              if(result[i].due < result[jId].due  && result[jId].due != 'NA' && result[i].due !='NA'){
                bestId = result[i].id;
              }
              else if(result[i].due =='NA'){
               bestId = result[i].id; 
              }
              else if(result[jId].due == 'NA'){
               bestId = result[jId].id;  
              }
              else{
                //bestId = result[i].id; 
              }
            }

            
          }
          else{
            //$("#d_"+result[i].id).addClass("redStyle");
          }
         
          
        }
      
      $("#radioGroup1").html(html1);
     // $("#d_"+bestId).addClass("applyStyle");
      if(! priorityFlag){
        //$("#d_"+checkedId).addClass("applyStyle");
      }
      $("#id_"+bestId).attr("checked", "checked");
      $("#bestVal").val(bestId);
      $("#bestVal2").val(bestId);
      }
      else{
       $("#radioGroup").html(''); 
       $("#radioGroup1").html(''); 
      }
      //for(var j=0 ; j<result1.length ; j++){
      
    },
        
    error: function(jqXHR, textStatus, errorThrown) {
       console.log(textStatus, errorThrown);
    }


    });
  
  }
  
  console.log("gardientArray :  ",gardientArray);
  console.log("brrr",gardientArray.indexOf(2,0));
  console.log("compTaskArray :  ",compTaskArray);
   

}
function submit_form(){
  console.log($("#bestVal").val(), $("#bestVal2").val());
  if($("#bestVal").val() != $("#bestVal2").val()){
    
   var confirmForm = confirm('You have assigned an employee who is not the best fit for this task, do you want to proceed?');
   if(confirmForm === true)
   {
    $("#add_task_form").submit();
   }
   else{
    console.log("you clicked false........");
   }
  }
  else
  {
    $("#add_task_form").submit();
  }
}
function changeVal(val){
  $("#bestVal2").val(val);
}