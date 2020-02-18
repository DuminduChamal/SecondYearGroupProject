<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <style>
        table, th, td {
          border: 1px solid black;
          border-collapse: collapse;
        }
        th {
        text-align: center;
        }
    </style>
  </head>
  <body>
    <h2>Tutorland User Count Report</h2>
    <hr/>
    <br/>
    <table class="table table-bordered" style="width:100%">
        <tr>
            <th>
                User Type
            </th>
            <th>
                Count
            </th>
        </tr>
      <tr>
        <td>
          Students
        </td>
        <td style="text-align: right">
          {{$studentCount}}
        </td>
      </tr>
      <tr>
        <td>
          Approved Tutors
        </td>
        <td style="text-align: right">
          {{$approveTutorCount}}
        </td>
      </tr>
      <tr>
        <td>
          Requested Tutors
        </td>
        <td style="text-align: right">
          {{$unapproveTutorCount}}
        </td>
      </tr>
    </table>
  </body>
</html>