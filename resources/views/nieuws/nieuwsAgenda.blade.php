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

    var events = @json($events); // Haal nieuws items van de controller

    var fullCalendarEvents = events.map(function(event) {
      return {
        title: event.title,
        date: event.datum,
        id: event.id
      };
    });

    var calendar = new FullCalendar.Calendar(calendarEl, {
      initialView: 'dayGridMonth',
      events: fullCalendarEvents,
      eventClick: function(info) {
        // Functie voor het klikken op nieuws items
        var clickedEventId = info.event.id; // Haal het id op van het nieuws item

        // Use AJAX to fetch details of the clicked event
        // Gebruik AJAX om details op te halen van het geklikte nieuws item
        $.ajax({
          url: "/nieuws/" + clickedEventId,
          method: "GET",
          success: function(response) {
            if (response.success) {
              // Laat details zien van het geklikte nieuws item
              console.log("Nieuws item:", response.data);
              var beschrijving = response.data.beschrijving;
              var postcode = response.data.postcode;

              // Laat nieuws zien in een alert 
              alert("Beschrijving: " + beschrijving + "\nPostcode: " + postcode);
            } else {
              console.error(response.message);
            }
          },
          error: function(jqXHR, textStatus, errorThrown) {
            // AJAX error bericht
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