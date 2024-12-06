<?php
session_start();
$username = isset($_SESSION['username']) ? $_SESSION['username'] : 'guest';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <title>Gator Weightlifting</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <!-- <link rel="stylesheet" href="./events.css"> -->
  <link rel="stylesheet" href="../../Components/Overall/overall.css">
  <link rel="stylesheet" href="../Header/header.css">
  <link rel="stylesheet" href="../Footer/footer.css">
  <link rel="stylesheet" href="../E-board/events.css">
</head>

<body>
  <div id="header-container"></div>
  <div class="page-title-container">
    <h1>Calendar</h1>
  </div>
  <div class="container">
    <div id="calendar"></div>

<!-- JavaScript -->
<script>
  $(document).ready(function() {
    var username = "<?php echo isset($_SESSION['username']) ? $_SESSION['username'] : 'guest'; ?>"; // Default to 'tmei' if not set
    console.log("Username:", username);
    if (username === '') {
          console.error("User ID is not set in PHP session");
          return; // Do not proceed if userId is not set
        }
        $('#calendar').fullCalendar({
          selectable: true,
          selectHelper: true,
          select: function(start, end) {
            $('#myModal').modal('toggle');
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
      },
      events: {
            url: 'get_events.php',
            error: function() {
                alert('There was an error while fetching events.');
            }
        },
        eventClick: function(event) {
            if (event.details) {
              alert("Event Details: " + event.details);
            }
        }
    });
  });
</script>
    <br>
  </div>
  <!-- Create Event Modal -->
  <div id="myModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content"> 
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Create Event</h4>
        </div>
        <div class="modal-body">
          <!-- Event Form -->
          <form id="eventForm" method="post" action="save_event.php">
            <div class="form-group">
              <label for="title">Event Title</label>
              <input type="text" name="title" id="title" class="form-control" required />
            </div>
            <div class="form-group">
              <label for="start_date">Start Date</label>
              <input type="date" name="start_date" id="start_date" class="form-control" required />
            </div>
            <div class="form-group">
              <label for="end_date">End Date</label>
              <input type="date" name="end_date" id="end_date" class="form-control" required />
            </div>
            <div class="form-group">
              <label for="start_time">Start Time</label>
              <input type="time" name="start_time" id="start_time" class="form-control" required />
            </div>
            <div class="form-group">
              <label for="end_time">End Time</label>
              <input type="time" name="end_time" id="end_time" class="form-control" required />
            </div>
            <div class="form-group">
              <label for="details">Event Description</label>
              <textarea name="details" id="details" class="form-control" rows="4" required></textarea>
            </div>
            <div class="form-group">
       <input type="submit" id="save-event" name="save-event" value="Save Event" class="btn btn-success" />
       </div>
       <p class="error"><?php if(!empty($msg)){ echo $msg; } ?></p>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Other HTML elements -->
  <div id="footer-container"></div>
  <script src="../Header/header.js" defer></script>
  <script src="../Footer/footer.js" defer></script>
  <!-- <script src="./calendar.js" defer></script> -->

</html>
