$(document).ready(function() {
  var userId = $_SESSION['user_id']; // Get the user ID from the session

  $('#calendar').fullCalendar({
    selectable: true,
    selectHelper: true,
    select: function(start, end) {
      $('#myModal').modal('toggle');
      $('#eventForm input[name=start_date]').val(moment(start).format('YYYY-MM-DD'));
      $('#eventForm input[name=end_date]').val(moment(end).format('YYYY-MM-DD'));
    },
    events: function(start, end, timezone, callback) {
      $.ajax({
        url: 'get_events.php',
        method: 'POST',
        data: {
          user_id: userId,
          start: start.format('YYYY-MM-DD'),
          end: end.format('YYYY-MM-DD')
        },
        success: function(response) {
          var events = response;
          for (var i = 0; i < events.length; i++) {
            events[i].start = moment(events[i].start, 'YYYY-MM-DD HH:mm:ss');
            events[i].end = moment(events[i].end, 'YYYY-MM-DD HH:mm:ss');
          }
          callback(events);
        },
        error: function(xhr, status, error) {
          console.error('An error occurred:', error);
        }
      });
    },
    header: {
      left: 'month, agendaWeek, agendaDay, list',
      center: 'title',
      right: 'prev, today, next'
    },
    buttonText: {
      today: 'Today',
      month: 'Month',
      week: 'Week',
      day: 'Day',
      list: 'List'
    }
  });

  // Prevent form submission default action and close modal
  $('#eventForm').on('submit', function(event) {
    event.preventDefault();
    $.ajax({
      url: 'save_event.php',
      method: 'POST',
      data: $(this).serialize(),
      success: function(response) {
        // On success, close the modal, update the calendar
        $('#myModal').modal('toggle');
        $('#calendar').fullCalendar('refetchEvents');
      },
      error: function(xhr, status, error) {
        console.error('An error occurred:', error);
      }
    });
  });
});
