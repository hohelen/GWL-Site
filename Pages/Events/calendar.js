document.addEventListener("DOMContentLoaded", function () {
    var calendarEl = document.getElementById("calendar");
    var calendar = new FullCalendar.Calendar(calendarEl, {
      initialView: "dayGridMonth",
      headerToolbar: {
        center: 'addEventButton'
      },
      customButtons: {
        addEventButton: {
          text: 'Add Event...',
          click: function() {
            var title = prompt('Enter the event title');
            if (title) {
              var dateStr = prompt('Enter a date in YYYY-MM-DD format');
              if (dateStr) {
                var timeStr = prompt('Enter a time in HH:MM format (24-hour clock)');
                if (timeStr) {
                  var dateTimeStr = dateStr + 'T' + timeStr + ':00'; // combine date and time
                  var date = new Date(dateTimeStr); // will be in local time

                  if (!isNaN(date.valueOf())) { // valid?
                    calendar.addEvent({
                      title: title,
                      start: date,
                      allDay: false
                    });
                    alert('Great. The event has been added to the calendar.');
                  } else {
                    alert('Invalid date/time.');
                  }
                } else {
                  alert('Event time is required.');
                }
              } else {
                alert('Event date is required.');
              }
            } else {
              alert('Event title is required.');
            }
          }
        }
      }
    });
    calendar.render();
});