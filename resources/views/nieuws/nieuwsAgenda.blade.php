<x-app-layout>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css">
  <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<x-slot name="header" class="bg-transparent">
  <h2 class="font-semibold bg-transparent text-center text-4xl text-white leading-tight">
      {{ __('Agenda') }}
  </h2>
</x-slot>

<div id="popup" class="hidden fixed inset-0 z-50 overflow-auto bg-black bg-opacity-50 flex justify-center items-center">
  <div class="bg-white rounded-lg p-8 max-w-md">
    <h2 class="text-2xl font-semibold mb-4" id="popupTitle"></h2>
    <p class="text-lg mb-4" id="popupDescription"></p>
    <p class="text-lg" id="popupPostcode"></p>
    <button id="closePopup" class="mt-6 px-4 py-2 bg-blue-500 text-white rounded-md">Sluit</button>
  </div>
</div>

<div class="py-6 w-full flex flex-col justify-center items-center pt-6 pt-0 bg-transparent">
  <div class="w-full max-w-2xl mx-auto px-3">
    <div class="bg-transparent overflow-hidden">
      <div class="bg-white rounded-3xl p-6 " id='calendar'>
      </div>
    </div>
  </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var popup = document.getElementById('popup');
    var popupTitle = document.getElementById('popupTitle');
    var popupDescription = document.getElementById('popupDescription');
    var popupPostcode = document.getElementById('popupPostcode');
    var closePopup = document.getElementById('closePopup');

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
      var clickedEventId = info.event.id;
      $.ajax({
        url: "/nieuws/" + clickedEventId,
        method: "GET",
        success: function(response) {
          if (response.success) {
            popupTitle.textContent = response.data.title;
            popupDescription.textContent = response.data.beschrijving;
            popupPostcode.textContent = "Postcode: " + response.data.postcode;
            popup.classList.remove('hidden');
          } else {
            console.error(response.message);
          }
        },
        error: function(jqXHR, textStatus, errorThrown) {
          console.error("Error fetching news item:", textStatus, errorThrown);
        }
      });
    },
    locale: 'nl',
    buttonText: { // Customize button text
      today: 'Vandaag'
    }
  });

    calendar.render();

    // Close popup when close button is clicked
    closePopup.addEventListener('click', function() {
      popup.classList.add('hidden');
    });
  });
</script>
</x-app-layout>