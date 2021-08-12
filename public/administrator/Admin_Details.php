
 <?php
  require_once "../guest/connection.php";


if (isset($_POST['custId'])) {
    $id = $_POST['custId'];

    $sql = "select * from Account where No=".$id;
    $result = mysqli_query($con, $sql);

    $response = "<div class='table table-responsive '>
               <table  class = 'table table-bordered '>";
    while ($row = mysqli_fetch_array($result)) {
        $no = $row['No'];
        $username = $row['Username'];
        $fullname = $row['FullName'];
        $role = $row['Role'];
        $createdby = $row['Createdby'];
        $response .= "<tr>";
        $response .= "<td>No: </td><td>".$no."</td>";
        $response .= "</tr>";

        $response .= "<tr>";
        $response .= "<td>Username : </td><td>".$username."</td>";
        $response .= "</tr>";

        $response .= "<tr>";
        $response .= "<td>FullName : </td><td>".$fullname."</td>";
        $response .= "</tr>";

        $response .= "<tr>";
        $response .= "<td>Role: </td><td>".$role."</td>";
        $response .= "</tr>";

        $response .= "<tr>";
        $response .= "<td>CreatedBy: </td><td>".$createdby."</td>";
        $response .= "</tr>";
    }
    $response .= "</table>";

    echo $response;
    exit;
}
