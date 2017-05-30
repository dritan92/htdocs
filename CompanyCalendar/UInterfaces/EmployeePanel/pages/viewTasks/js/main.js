$(function(){
	$('#calendar').fullCalendar({
    dayClick: function(date, jsEvent, view) {
        var clickDate = date.format();
        $('#start').val(clickDate);
        $('#dialog').dialog('open');
        
    },
    theme: true,
    eventSources :[
    {
    	events :events,
    	//color : '#0EB6A2',
    	textColor :'#fff' ,
    }
    
    ]
    /*events: [
    {
    	title: 'task1',
    	start: '2016-05-17'
    },
    {
    	title: 'event',
    	start:'2016-05-05',
    	end: '2016-05-08'
    },
    ],*/
 
});
	//$('#calendar').fullCalendar('next');
	$('#dialog').dialog({
		autoOpen: false,
		show: {
			effect: 'drop',
			duration: 500,
		},
		hide:{
			effect: 'clip',
			duration: 500,
		}
	});

	$('.datepicker').datepicker({dateFormat: "yy-mm-dd"});
} );