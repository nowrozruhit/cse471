 <?php
  session_start();

  if(!isset($_SESSION['username']) || $_SESSION['role']!="doctor"){
    header("location:../index.php");
  }



 $connect = mysqli_connect("localhost", "root", "", "cse471");  
 $query ="SELECT * FROM patients ORDER BY ID DESC";  
 $result = mysqli_query($connect, $query);  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Webslesson Tutorial | Datatables Jquery Plugin with Php MySql and Bootstrap</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
           <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
           <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
           
      </head>  
      <body>
        <nav class="navbar navbar-default navbar-inverse">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">Home</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="edit.php">Edit<span class="sr-only">(current)</span></a></li>
      </ul>
       <ul class="nav navbar-right">
        <li>
          <a style="background-color:transparent !important;" href="../logout.php"><button type="button" class="btn btn-primary" aria-haspopup="false" aria-expanded="true">Log Out</button></a>
        </li>
        
       </ul>
    </div><!-- /.navbar-collapse -->
    
  </div><!-- /.container-fluid -->
</nav>

           <br /><br />  
           <div class="container">  
                <h3 align="center">Patient Table</h3>  
                <br />  
                <div class="table-responsive">  
                     <table id="employee_data" class="table table-striped table-bordered">  
                          <thead>  
                               <tr>  
                                    <td>Name</td>  
                                    <td>Age</td>  
                                    <td>Blood Pressure</td>  
                                    <td>Weight</td>  
                                    <td>Daignosis</td> 
                                    <td>History</td>  
                                    <td>Prescription</td>   
                               </tr>  
                          </thead>  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo '  
                               <tr>  
                                    <td>'.$row["name"].'</td>  
                                    <td>'.$row["age"].'</td>  
                                    <td>'.$row["bp"].'</td>  
                                    <td>'.$row["weight"].'</td>  
                                    <td>'.$row["diagnosis"].'</td>
                                    <td>'.$row["history"].'</td> 
                                    <td>'.$row["prescription"].'</td>   
                               </tr>  
                               ';  
                          }  
                          ?>  
                     </table>  
                </div>  
           </div>  
      </body>  
 </html>  
 <script>  
 $(document).ready(function(){  
      $('#employee_data').DataTable({
        fixedHeader: {
            headerOffset: 100
        }
      });  
 });  
 </script>
