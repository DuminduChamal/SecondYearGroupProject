<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Tutor;
use App\User;

class LiveSearch extends Controller
{
    function index()
    {
     return view('student.livesearch');
    }

    function action(Request $request)
    {
     if($request->ajax())
     {
      $output = '';
      $query = $request->get('query');
      if($query != '')
      {
       $data = DB::table('users')->where('is_tutor',1)
         ->Where('FName', 'like', '%'.$query.'%')
         ->orWhere('LName', 'like', '%'.$query.'%')
         ->where('is_tutor',1)
         ->orWhere('NIC', 'like', '%'.$query.'%')
         ->where('is_tutor',1)
         ->orWhere('rating', 'like', '%'.$query.'%')
        //  ->orWhere('Country', 'like', '%'.$query.'%')
         ->where('is_tutor',1)
         ->orderBy('rating', 'desc')
         ->get();
         
      }
      else
      {
       $data = DB::table('users')->where('is_tutor',1)
         ->orderBy('rating', 'desc')
         ->get();
      }
      $total_row = $data->count();
      if($total_row > 0)
      {
       foreach($data as $row)
       {
        $rowid=$row->id;
        $tutor=Tutor::where('user_id',$rowid)->get()->first();
        $tutorid=$tutor->id;
        $level=$row->rating;
        $output .= '
        <tr>
         <td>'.$row->FName.'</td>
         <td>'.$row->LName.'</td>
         <td>'.$row->NIC.'</td>
         <td>'.$tutor->subject->subject.'</td>
         <td>'.$tutor->Qualification.'</td>
         <td>'.$tutor->rate.'</td>
         <td>';

         if($level=='1'){
         $output .='<fieldset class="rating">
           <div class="stars">
               <label for="demo-1" aria-label="1 star" title="1 star"></label>
           </div>
         </fieldset>';
        }
        if($level=='2'){
            $output .='<fieldset class="rating">
           <div class="stars">
               <label for="demo-1" aria-label="1 star" title="2 star"></label>
               <label for="demo-2" aria-label="2 stars" title="2 stars"></label>
           </div>
         </fieldset>';
        }
        if($level=='3'){
            $output .='<fieldset class="rating">
           <div class="stars">
               <label for="demo-1" aria-label="1 star" title="3 star"></label>
               <label for="demo-2" aria-label="2 stars" title="3 stars"></label>
               <label for="demo-3" aria-label="3 stars" title="3 stars"></label>
           </div>
         </fieldset>';
        }
        if($level=='4'){
            $output .='<fieldset class="rating">
           <div class="stars">
               <label for="demo-1" aria-label="1 star" title="4 star"></label>
               <label for="demo-2" aria-label="2 stars" title="4 stars"></label>
               <label for="demo-3" aria-label="3 stars" title="4 stars"></label>
               <label for="demo-4" aria-label="4 stars" title="4 stars"></label>   
           </div>
         </fieldset>';
        }
        if($level=='5'){
            $output .='<fieldset class="rating">
            <div class="stars">
               <label for="demo-1" aria-label="1 star" title="5 star"></label>
               <label for="demo-2" aria-label="2 stars" title="5 stars"></label>
               <label for="demo-3" aria-label="3 stars" title="5 stars"></label>
               <label for="demo-4" aria-label="4 stars" title="5 stars"></label>
               <label for="demo-5" aria-label="5 stars" title="5 stars"></label>   
           </div>
         </fieldset>';
        }
       
       $output .= '</td>
        <td> <a type="button" href="student/viewtutors/'.$tutorid.'" class="btn btn-primary">view tutor</a> </td>
       </tr>';
       }
      }
      else
      {
       $output = '
       <tr>
        <td align="center" colspan="5">No Data Found</td>
       </tr>
       ';
      }
      $data = array(
       'table_data'  => $output,
       'total_data'  => $total_row
      );

      echo json_encode($data);
     }
    }
}

?>
