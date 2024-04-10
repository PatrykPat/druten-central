<x-app-layout>
<html>
	<head>
		<title>How to Create Event Calendar in Laravel 10 - Techsolutionstuff.com</title>
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
		<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
	</head>
	<body>
		<div class="container">
			<h1>Laravel 10 Create Eevent in Full calendar using AJAX - Techsolutionstuff</h1>
			<div id='calendar'></div>
		</div>
		<script>
            console.log('Before JS');
			$(document).ready(function () {
			   
			var SITEURL = "{{ url('/') }}";
			  
			$.ajaxSetup({
			    headers: {
			    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			    }
			});

			var calendar = $('#calendar').fullCalendar({
			    editable: true,
			    events: SITEURL + "/nieuws/agenda",
			    displayEventTime: false,
			    editable: true,
			    eventRender: function (event, element, view) {
                    if (event.allDay === true) {
                        event.allDay = true;
                    } else {
                        event.allDay = false;
                    }
                },
			    selectable: true,
			    selectHelper: true,

			    select: function (start, end, allDay) {	
                    console.log('after select function');                   
                    var title = prompt('Event Title:');
                    if (title) {
                    var start = $.fullCalendar.formatDate(start, "Y-MM-DD");
                    var end = $.fullCalendar.formatDate(end, "Y-MM-DD");

                    console.log('Before AJAX request');

                    $.ajax({
                        url: SITEURL + "/nieuws/agenda-AJAX",
                        data: {
                            title: title,
                            start: start,
                            type: 'add'
                        },
                        type: "POST",
                        success: function (data) {
                            displayMessage("Event Created Successfully");

                            calendar.fullCalendar('renderEvent', {
                                id: data.id,
                                title: title,
                                start: start,
                                end: start, // Use the same start date for end date
                                allDay: allDay
                            }, true);

                            calendar.fullCalendar('unselect');
                        }
                    });
                    
                    }
			    },
			 
			});			 
			});
			 
			function displayMessage(message) {
			    toastr.success(message, 'Event');
			} 
			  
		</script>
	</body>
</html>
</x-app-layout>