<?php
session_start();

include '../phps/connection.php';

    $query = "SELECT * FROM `product`";
    $result = mysqli_query($conn, $query);
    $number_of_result = mysqli_num_rows($result);

     $query1 = "SELECT * FROM users";
    $result1 = mysqli_query($conn, $query1);
    
if($_SESSION["user"] == "admin"){
include 'admin_navbar.php';
  

if ($count = mysqli_num_rows($result1) > 0) {
echo "
<div class='table-responsive-lg'>
<table class='table table-striped ' id='myTable'  style='
width: 95%;
margin: auto;
'>
<thead>
  <tr>
    <th scope='col'>Sno</th>
    <th scope='col'>Expoter Id</th>
    <th scope='col'>Name</th>
    <th scope='col'>Phone NO </th>
    <th scope='col'>Addres</th>
    <th scope='col'>Email</th>
    <th scope='col'>Status</th>
    </tr>
    </thead>
    <tbody>
    <tr>";
    // <th scope='col'>Action </th>
  $sno=1;
  while($r = mysqli_fetch_assoc($result1)){
    echo "
    <th scope='row'>".$sno."</th>
    <td>".$r['sno']."</td>
    <td>".$r['name']."</td> 
    <td>".$r['mobile']."</td>
    <td>".$r['address']."</td>
    <td>".$r['email']."</td>
    <td> 
    <button type='submit' name='expoters'  class='btn btn-warning'>
       <a href='expotersdata.php' class='text-decoration-none text-light' > View More </a>
       </button>
    </td>
    <td>
    </td>
    </tr>";
    // <form action='./addproduct.php' method='get' >
    //     <input type=hidden value=".$r['sno']."> 
    //     <button type='submit' name='expoters'  class='btn btn-warning'>
    //         <a href='expotersdata.php' class='text-decoration-none text-light' > View More </a>
    //     </button>
    // </from>
    $sno=$sno+1;
  }
  
  }

}
if(!isset($_SESSION["user"])){
  echo "You are not Logged In";
  header('location:db.php');
}


mysqli_close($conn);
?>
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">

</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous" ></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js' integrity='sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN' crossorigin='anonymous'></script>

    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" ></script>
    <script >
        $(document).ready(function () {
            $('#myTable').DataTable({
        //         columns:[
        // { 'Product ID': true }, //col 1
        // { 'Name': true }, //col 2
        // { 'Quantity': true }, //col 5
        // { 'Price': true },//col 5
        // { 'Image': true }, //col 5
        // { 'Description': true } //col 5
        // ]
     
    });
            });
            
        </script>
</body>
</html>
