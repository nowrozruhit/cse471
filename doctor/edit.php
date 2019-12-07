<?php
  session_start();

  if(!isset($_SESSION['username']) || $_SESSION['role']!="doctor"){
    header("location:../index.php");
  }  
 ?> 

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Welcome Doctor</title>

    

    <!-- Bootstrap core CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    
  </head>
  <body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
  <a class="navbar-brand" href="index.php">Home</a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="edit.php">Edit<span class="sr-only">(current)</span></a>
      </li>
    </ul>
    <a href="../logout.php"><button type="button" class="btn btn-primary">Log Out</button></a>
  </div>
</nav>

<h3>Edit Patient Data</h3>
<br>

<main role="main" class="container">

  <div class="starter-template">
    <!-- Modal -->
    <!-- <div class="modal fade" id="studentaddmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">Add Student Data</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="insertcode.php" method="POST">
            <div class="modal-body">


              <div class="form-group">
                <label>First Name</label>
                <input type="text" name="fname" class="form-control" placeholder="Enter First Name">
              </div>

              <div class="form-group">
                <label>Last Name</label>
                <input type="text" name="lname" class="form-control" placeholder="Enter Last Name">
              </div>

              <div class="form-group">
                <label>Course</label>
                <input type="text" name="course" class="form-control" placeholder="Enter Course">
              </div>

              <div class="form-group">
                <label>Phone Number</label>
                <input type="number" name="contact" class="form-control" placeholder="Enter Phone Number">
              </div>



            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" name="insertdata">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div> -->

    <!----Edit popup--------------------------------------------------->

    <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">Edit Medical Data</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="updatecode.php" method="POST">
            <div class="modal-body">

              
              <input type="hidden" name="update_id" id="update_id">

              <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Enter First Name">
              </div>

              <div class="form-group">
                <label>Age</label>
                <input type="text" name="age" id="age" class="form-control" placeholder="Enter Age">
              </div>

              <div class="form-group">
                <label>Blood Pressure</label>
                <input type="text" name="bp" id="bp" class="form-control" placeholder="Enter Course">
              </div>

              <div class="form-group">
                <label>Weight</label>
                <input type="number" name="weight" id="weight" class="form-control" placeholder="Enter Phone Number">
              </div>

              <div class="form-group">
                <label>Diagnosis</label>
                <input type="text" name="diagnosis" id="diagnosis" class="form-control" placeholder="Possible Diagnosis">
              </div>

              <div class="form-group">
                <label>Medical History</label>
                <input type="text" name="history" id="history" class="form-control" placeholder="Enter Medical History">
              </div>

              <div class="form-group">
                <label>Prescription</label>
                <input type="text" name="prescription" id="prescription" class="form-control" placeholder="Enter Prescription">
              </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" name="updatedata">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>


    <!------------------------------------------------------->

    <!----DELETE popup--------------------------------------------------->
    <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">Remove Medical Data</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <form action="deletecode.php" method="POST">
            <div class="modal-body">

              
              <input type="hidden" name="delete_id" id="delete_id">

              <h5>Do you want to remove this entry?</h5>
            </div>
            <div class="modal-footer">
              <button type="submit" name="deletedata" class="btn btn-primary">Yes</button>
              <button type="button" class="btn btn-secondary" name="updatedata" data-dismiss="modal">No</button>
            </div>
          </form>
        </div>
      </div>
    </div>


    <!-- <?php echo '<img src="data:image;base64, '.base64_encode($data).'" alt="image" style="width: 480px; height:400px;">'?> -->

    <!-- <!-- Modal to show image-->
    <div class="modal fade" id="viewimage" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">Medical Image</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">

            <?php echo $row['id']?>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" name="updatedata">Submit</button>
          </div>
        </div>
      </div>
    </div> 


    <div class="container">
     
        
          <h2>Edit Patient Data</h2>
      
      
          
            <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#studentaddmodal">
              Add Data
            </button> -->
          
        </div>
        
      
            
            <?php 
            $connection = mysqli_connect("localhost", "root","");
            $db = mysqli_select_db($connection, 'cse471');

            $query = "SELECT * FROM patients";
            $query_run = mysqli_query($connection, $query);
            ?>

            <table id="datatableid" class="table table-striped table-dark">
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Name</th>
                  <th scope="col">Age</th>
                  <th scope="col">Blood <br> Pressure</th>
                  <th scope="col">Weight</th>
                  <th scope="col">Diagnosis</th>
                  <th scope="col">Image</th>
                  <th style="width: 16.66%" scope="col">History</th>
                  <th scope="col">Prescription</th>
                </tr>
              </thead>

              <?php
              if($query_run){
                foreach ($query_run as $row) {
                  ?>

                  <tbody>

                    <tr>
                      <td><?php echo $row['id']?></td>
                      <td><?php echo $row['name']?></td>
                      <td><?php echo $row['age']?></td>
                      <td><?php echo $row['bp']?></td>
                      <td><?php echo $row['weight']?></td>
                      <td><?php echo $row['diagnosis']?></td>
                      <?php $data = $row['image']?>

                      <!-- <td><?php echo '<img src="data:image;base64, '.base64_encode($row['image']).'" alt="image" style="width: 100px; height:100px;">'?></td> -->

                      <td>
                        <a target="_blank" href="testpage.php?myVar=<?php echo $row['id']?>">
                          <img src="data:image/jpeg;base64,<?php echo base64_encode($row['image']); ?>" width="50" height="50" id="medimg"/>
                        </a>  
                      </td>



                      <!------------------------------------------------------->

                      <td style=" max-width: 80px;
                        overflow: hidden;
                        text-overflow: ellipsis;
                        white-space: nowrap;   
                      padding:0px;">
                      <?php echo $row['history']?></td>
                      <td style=" max-width: 80px;
                        overflow: hidden;
                        text-overflow: ellipsis;
                        white-space: nowrap;   
                      padding:0px;"><?php echo $row['prescription']?></td>
                      
                      <td>
                        <button type="button" class="btn btn-success editbtn">EDIT</button>
                      </td>
                      <td>
                        <button type="button" class="btn btn-danger deletebtn">REMOVE</button>
                      </td>
                    </tr>

                  </tbody>

                  <?php

                }
              }else{
                echo "No Record Found";
              }

              ?>  
            </table>
          

      </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>


    <script>
      $(document).ready(function () {
        $('.deletebtn').on('click', function() {
          $('#deletemodal').modal('show');


          $tr = $(this).closest('tr');

          var data = $tr.children("td").map(function(){
            return $(this).text();
          }).get();

          console.log(data);

          $('#delete_id').val(data[0]);

        });
      });
    </script>

    <script>
      $(document).ready(function () {
        $('.editbtn').on('click', function() {
          $('#editmodal').modal('show');


          $tr = $(this).closest('tr');

          var data = $tr.children("td").map(function(){
            return $(this).text();
          }).get();

          console.log(data);

          $('#update_id').val(data[0]);
          $('#name').val(data[1]);
          $('#age').val(data[2]);
          $('#bp').val(data[3]);
          $('#weight').val(data[4]);
          $('#image').val(data[6]);
          $('#prescription').val(data[8]);
          $('#history').val(data[7]);
          $('#diagnosis').val(data[5]);


        });
      });
    </script>

    <!-- <script>
      $(document).ready(function () {
        $('#medimg').on('click', function() {


          $tr = $(this).closest('tr');

          var data = $tr.children("td").map(function(){
            return $(this).text();
          }).get();

          console.log(data);

          // $.ajax({
          //  url: "testpage.php",
          //  method: "get",
          //  data: { info: data[0] },
          //  success: function(res) {
          //    window.open("testpage.php","_blank");
          //  }
          // });

          function passVal(){
            var data = {
              str: data
            };

            $.post("testpage.php", data);
          }
          passVal();
          window.open("testpage.php","_blank");

        });
      });
    </script> -->

    <!-- <script>
      $(document).ready(function () {
        $('.viewimage').on('click', function() {
          $('#viewimage').modal('show');

          $tr = $(this).closest('tr');

          var data = $tr.children("td").map(function(){
            return $(this).text();
          }).get();

          //console.log(data);

          $('#update_id').val(data[0]);
          
          $.ajax({
            url: "testpage.php",
            method: "post",
            data: { info: data[0] },
            success: function(res) {
               window.location = 'testpage.php';
          }
        });

        });
      });
    </script> -->
    
