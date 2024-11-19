<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <title>Gator Weightlifting</title>
  <link rel="stylesheet" href="../Events/events.css" />
  <link rel="stylesheet" href="../../Components/Overall/overall.css" />
  <link rel="stylesheet" href="../Header/header.css" />
  <link rel="stylesheet" href="../Footer/footer.css" />
  <!-- FullCalendar Stylesheets -->
  <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
  <script src="calendar.js"></script>
</head>

<body>
  <div id="header-container"></div>
  <div class="page-title-container">
    <h1>
      <center>Events</center>
    </h1>
  </div>
  <!-- Calendar Container -->
  <div id="calendar"></div>
  <!-- FullCalendar Script -->
  <script src="https://cdn.jsdelivr.net/npm/@fullcalendar/core/main.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@fullcalendar/interaction/main.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid/main.min.js"></script>
  <!-- Include separate JS file -->
  <div id="calendar"></div>
  <script src="../Events/calendar.js" defer></script>
  <div id="footer-container"></div>
  <script src="../Header/header.js" defer></script>
  <script src="../Footer/footer.js" defer></script>
</body>
<script>
  $(document).ready(function () {
    $('#calendar').fullCalendar();
  });
</script>

</html>