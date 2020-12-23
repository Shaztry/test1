<?php
//fetch.php
$connect = mysqli_connect("127.0.0.1", "shas3", "shas3@123", "mydb");
$columns = array('fname', 'mname', 'lname', 'gender', 'email', 'dob', 'address');

$query = "SELECT * FROM form ";

if (isset($_POST["search"]["value"])) {
    $query .= '
 WHERE fname LIKE "%' . $_POST["search"]["value"] . '%" 
 OR lname LIKE "%' . $_POST["search"]["value"] . '%" 
 ';
}

if (isset($_POST["order"])) {
    $query .= 'ORDER BY ' . $columns[$_POST['order']['0']['column']] . ' ' . $_POST['order']['0']['dir'] . ' 
 ';
} else {
    $query .= 'ORDER BY fname DESC ';
}

$query1 = '';

//if ($_POST["length"] != -1) {
//    $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
//}

$number_filter_row = mysqli_num_rows(mysqli_query($connect, $query));

$result = mysqli_query($connect, $query . $query1);

$data = array();

while ($row = mysqli_fetch_array($result)) {
    $sub_array = array();
    $sub_array[] = '<div contenteditable class="update" data-id="' . $row["fname"] . '" data-column="fname">' . $row["fname"] . '</div>';
    $sub_array[] = '<div contenteditable class="update" data-id="' . $row["fname"] . '" data-column="mname">' . $row["mname"] . '</div>';
    $sub_array[] = '<div contenteditable class="update" data-id="' . $row["fname"] . '" data-column="mname">' . $row["mname"] . '</div>';
    $sub_array[] = '<div contenteditable class="update" data-id="' . $row["fname"] . '" data-column="gender">' . $row["gender"] . '</div>';
    $sub_array[] = '<div contenteditable class="update" data-id="' . $row["fname"] . '" data-column="email">' . $row["email"] . '</div>';
    $sub_array[] = '<div contenteditable class="update" data-id="' . $row["fname"] . '" data-column="dob">' . $row["dob"] . '</div>';
    $sub_array[] = '<div contenteditable class="update" data-id="' . $row["fname"] . '" data-column="address">' . $row["address"] . '</div>';
    $sub_array[] = '<button type="button" name="delete" class="btn btn-danger btn-xs delete" id="' . $row["fname"] . '">Delete</button>';
    $data[] = $sub_array;
}

function get_all_data($connect)
{
    $query = "SELECT * FROM form";
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