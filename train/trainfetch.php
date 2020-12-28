
<?php
//fetch.php
$connect = mysqli_connect("127.0.0.1", "shas3", "shas3@123", "mydb");
$columns = array('userid', 'sourceaddr', 'destinationaddr', 'amount');

$query = "SELECT * FROM user_reservation ";

if (isset($_POST["search"]["value"])) {
    $query .= '
 WHERE userid LIKE "%' . $_POST["search"]["value"] . '%" 
 OR ticketid LIKE "%' . $_POST["search"]["value"] . '%" 
 ';
}

if (isset($_POST["order"])) {
    $query .= 'ORDER BY ' . $columns[$_POST['order']['0']['column']] . ' ' . $_POST['order']['0']['dir'] . ' 
 ';
} else {
    $query .= 'ORDER BY userid DESC ';
}

$query1 = '';

if ($_POST["length"] != -1) {
    $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$number_filter_row = mysqli_num_rows(mysqli_query($connect, $query));

$result = mysqli_query($connect, $query . $query1);

$data = array();

while ($row = mysqli_fetch_array($result)) {
    $sub_array = array();
    $sub_array[] = '<div contenteditable class="update" data-id="' . $row["userid"] . '" data-column="fname">' . $row["userid"] . '</div>';
    $sub_array[] = '<div contenteditable class="update" data-id="' . $row["userid"] . '" data-column="lname">' . $row["sourceaddr"] . '</div>';
    $sub_array[] = '<div contenteditable class="update" data-id="' . $row["userid"] . '" data-column="gender">' . $row["destinationaddr"] . '</div>';
    $sub_array[] = '<div contenteditable class="update" data-id="' . $row["userid"] . '" data-column="email">' . $row["amount"] . '</div>';
    $sub_array[] = '<button type="button" name="delete" class="btn btn-danger btn-xs delete" id="' . $row["userid"] . '">Delete</button>';
    $data[] = $sub_array;
}

function get_all_data($connect)
{
    $query = "SELECT * FROM user_reservation";
    $result = mysqli_query($connect, $query);
    return mysqli_num_rows($result);
}

$output = array(
    "draw"    => intval($_POST["draw"]),
    "recordsTotal"  =>  get_all_data($connect),
    "recordsFiltered" => $number_filter_row,
    "data"    => $data
);

echo json_encode($output);

?>