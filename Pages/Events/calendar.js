$(document).ready(function () {
  $('#calendar').fullCalendar({
    selectable: true,
    selectHelper: true,
    select: function(start, end) {
      $('#createEventModal').modal('toggle');
      $('#eventForm input[name=start_date]').val(moment(start).format('YYYY-MM-DD'));
      $('#eventForm input[name=end_date]').val(moment(end).format('YYYY-MM-DD'));
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
        $('#createEventModal').modal('toggle');
        $('#calendar').fullCalendar('refetchEvents');
      },
      error: function(xhr, status, error) {
        console.error('An error occurred:', error);
      }
    });
  });
});