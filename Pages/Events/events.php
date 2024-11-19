<!-- <-- <body>
  <div id="header-container"></div>
  <div class="page-title-container">
    <h1>
      <center>Events</center>
    </h1>
  </div>
  <div id="calendar"></div>
  <script src="https://cdn.jsdelivr.net/npm/@fullcalendar/core/main.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@fullcalendar/interaction/main.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid/main.min.js"></script>
  <div id="calendar"></div>
</body> -->
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <title>Gator Weightlifting</title>
  <link rel="stylesheet" href="../Events/events.css" />
  <link rel="stylesheet" href="../../Components/Overall/overall.css" />
  <link rel="stylesheet" href="../Header/header.css" />
  <link rel="stylesheet" href="../Footer/footer.css" />

  <title>Fullcalendar</title>
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
    <h1>
      <center>Events</center>
    </h1>
  </div>
  <div class="container">
    <div id="calendar"></div>
  </div>
  <br>
</body>

</html>
<script src="../Events/calendar.js" defer></script>
<div id="myModal" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Create Event</h4>
      </div>
      <div class="modal-body">
        <input type="text" class="form-control">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div id="footer-container"></div>
<script src="../Header/header.js" defer></script>
<script src="../Footer/footer.js" defer></script>


</html>