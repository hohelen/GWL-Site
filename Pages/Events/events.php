<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <title>Gator Weightlifting</title>
  <link rel="stylesheet" href="../E-board/eboard.css">
  <link rel="stylesheet" href="../../Components/Overall/overall.css">
  <link rel="stylesheet" href="../Header/header.css">
  <link rel="stylesheet" href="../Footer/footer.css">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
  <div id="header-container"></div>
  <div class="page-title-container">
    <h1>Events</h1>
  </div>
  <div class="container">
    <div id="calendar"></div>
    <br>
  </div>
  <!-- Create Event Modal -->
  <div id="createEventModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Create Event</h4>
        </div>
        <div class="modal-body">
          <!-- Event Form -->
          <form id="eventForm" method="post" action="your_php_script.php">
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
              <label for="description">Event Description</label>
              <textarea name="description" id="description" class="form-control" rows="4" required></textarea>
            </div>
            <button type="submit" class="btn btn-success">Save Event</button>
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
  <script src="../Events/calendar.js" defer></script>
</body>

</html>