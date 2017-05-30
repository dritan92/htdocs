$(function(){
	$('#calendar').fullCalendar({
    theme: true,
    eventSources :[
    {
    	events :events,
    	color : '#f1c40f',
    	textColor :'#fff' ,
    }
    ]
});
} );