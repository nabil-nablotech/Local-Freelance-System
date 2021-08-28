
 <?php
  require_once "../guest/connection.php";


if (isset($_POST['editId'])) {
    $id = $_POST['editId'];

    $sql = "SELECT `permission` FROM `account` WHERE No=".$id;
    $result = mysqli_query($con, $sql);

    $response = "<div class='table table-responsive '>
               <table  class = 'table table-bordered '>";
    while ($row = mysqli_fetch_array($result)) {
        $per = $row['permission'];
        $response.="<tr>";

        $response .= "<td>";
        $response .= "<input type='checkbox' checked > 
        ".$per."";
        $response.="</tr>";
        
        $response.="<tr>";

        $response .= "<td>";
        $response .= "<input type='checkbox' checked > 
        ".$per."";
        $response.="</tr>";


        $response.="<tr>";

        $response .= "<td>";
        $response .= "<input type='checkbox' checked > 
        ".$per."";
        $response.="</td>";

        $response.="<tr>";

        $response .= "<td>";
        $response .= "<input type='checkbox' checked > 
        ".$per."";
        $response.="</td>";

        $response.="<tr>";

        $response .= "<td>";
        $response .= "<input type='checkbox' checked > 
        ".$per."";
        $response.="</tr>";
        $response.="<tr>";

        $response .= "<td>";
        $response .= "<input type='checkbox' checked > 
        ".$per."";
        $response.="</tr>";
    }
    $response .= "</table>";
    $response.="<div class='form-group mt-3 text-center'>
          <button type='button' class='btn btn-primary'>update permission</button>
          </div>";
    echo $response;
    exit;
}
