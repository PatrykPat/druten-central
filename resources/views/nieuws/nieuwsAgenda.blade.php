<x-app-layout>
<head>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css">
  <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<html>
<div id='calendar'></div>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var events = @json($events); // Get events from controller

    var fullCalendarEvents = events.map(function(event) {
      return {
        title: event.title,
        date: event.datum, // Assuming 'datum' field stores date in YYYY-MM-DD format
        id: event.id // Using 'id' field for unique identifier (optional)
      };
    });

    var calendar = new FullCalendar.Calendar(calendarEl, {
      initialView: 'dayGridMonth',
      events: fullCalendarEvents,
      // ... other options
      eventClick: function(info) {
        // Handle click on an event
        var clickedEventId = info.event.id; // Get the ID of the clicked event

        // Use AJAX to fetch details of the clicked event
        $.ajax({
          url: "/nieuws/" + clickedEventId, // Replace with your route for retrieving news item by ID
          method: "GET",
          success: function(response) {
            if (response.success) {
              // Display details of the clicked news item (e.g., in a modal)
              console.log("Clicked news item:", response.data);
              var beschrijving = response.data.beschrijving;
              var postcode = response.data.postcode;
              // You can use these variables to display details in a modal or popup

              // Example using a basic alert (replace with your preferred method)
              alert("Beschrijving: " + beschrijving + "\nPostcode: " + postcode);
            } else {
              // Handle errors fetching news item details (optional)
              console.error(response.message);
            }
          },
          error: function(jqXHR, textStatus, errorThrown) {
            // Handle AJAX errors (optional)
            console.error("Error fetching news item:", textStatus, errorThrown);
          }
        });
      }
    });

    calendar.render();
  });
</script>
</html>
</x-app-layout>