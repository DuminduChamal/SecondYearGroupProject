<!DOCTYPE html>
<html>
 <head>
  <title>Live search in laravel using AJAX</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <!-- Rating -->
  <style type="text/css">
    .rating input[type="radio"]:not(:nth-of-type(0)) {
        /* hide visually */    
        border: 0;
        clip: rect(0 0 0 0);
        height: 1px;
        margin: -1px;
        overflow: hidden;
        padding: 0;
        position: absolute;
        width: 1px;
        }
        .rating [type="radio"]:not(:nth-of-type(0)) + label {
            display: none;
        }
        
        label[for]:hover {
            cursor: pointer;
        }
        
        .rating .stars label:before {
            content: "★";
        }
        
        .stars label {
            color: lightgray;
            font-size: 40px;
        }
        
        .stars label:hover {
            text-shadow: 0 0 1px #000;
        }
        
        .rating [type="radio"]:nth-of-type(1):checked ~ .stars label:nth-of-type(-n+1),
        .rating [type="radio"]:nth-of-type(2):checked ~ .stars label:nth-of-type(-n+2),
        .rating [type="radio"]:nth-of-type(3):checked ~ .stars label:nth-of-type(-n+3),
        .rating [type="radio"]:nth-of-type(4):checked ~ .stars label:nth-of-type(-n+4),
        .rating [type="radio"]:nth-of-type(5):checked ~ .stars label:nth-of-type(-n+5) {
            color: orange;
        }
        
        .rating [type="radio"]:nth-of-type(1):focus ~ .stars label:nth-of-type(1),
        .rating [type="radio"]:nth-of-type(2):focus ~ .stars label:nth-of-type(2),
        .rating [type="radio"]:nth-of-type(3):focus ~ .stars label:nth-of-type(3),
        .rating [type="radio"]:nth-of-type(4):focus ~ .stars label:nth-of-type(4),
        .rating [type="radio"]:nth-of-type(5):focus ~ .stars label:nth-of-type(5) {
            color: darkorange;
        }
    </style>
 </head>
 <body>
  <br />
  <div class="container box">
   <h3 align="center">Tutor Search</h3><br />
   <div class="panel panel-default">
    <div class="panel-heading">Search Tutor</div>
    <div class="panel-body">
     <div class="form-group">
      <input type="text" name="search" id="search" class="form-control" placeholder="Search Tutor" />
     </div>
     <div class="table-responsive">
      <h3 align="center">Total Tutors Found : <span id="total_records"></span></h3>
      <table class="table table-striped table-bordered">
       <thead>
        <tr>
         <th>Tutor First Name</th>
         <th>Tutor Last Name</th>
         <th>NIC</th>
         <th>Subject</th>
         <th>Qualification</th>
         <th>Rate</th>
         <th>Rating</th>
         <th></th>
        </tr>
       </thead>
       <tbody>
       </tbody>
      </table>
     </div>
    </div>    
   </div>
  </div>
 </body>
</html>

<script>
$(document).ready(function(){

 fetch_customer_data();

 function fetch_customer_data(query = '')
 {
  $.ajax({
   url:"{{ route('live_search.action') }}",
   method:'GET',
   data:{query:query},
   dataType:'json',
   success:function(data)
   {
    $('tbody').html(data.table_data);
    $('#total_records').text(data.total_data);
   }
  })
 }

 $(document).on('keyup', '#search', function(){
  var query = $(this).val();
  fetch_customer_data(query);
 });
});
</script>