<?php
include 'configDB.php';
/* Database connection start */
echo "test";
if (isset($_POST['action']) && !empty($_POST['action'])) {
    $action = $_POST['action'];
    switch ($action) {
        case 'getSTD':
            getSTD($DBconnect);
            break;
            // ...etc...
    }
}
//getEMP();

function getSTD($DBconnect)
{

// storing  request (ie, get/post) global array to a variable
    $requestData = $_REQUEST;
    $columns = array(
// datatable column index  => database column name
        0 => 'fname',
        1 => 'mname',
        2 => 'lname',
        3 => 'email',
        4 => 'gender',
        5 => 'dob',
        6 => 'address'
    );
// getting total number records without any search
    $sql = "SELECT *";
    $sql .= " FROM form";
    $query = mysqli_query($DBconnect, $sql) or die("Mysql Mysql Error in getting : get student details");
    $totalData = mysqli_num_rows($query);
    $totalFiltered = $totalData; // when there is no search parameter then total number rows = total number filtered rows.
    $sql = "SELECT * ";
    $sql .= " FROM form WHERE 1=1";
    if (!empty($requestData['search']['value'])) { // if there is a search parameter, $requestData['search']['value'] contains search parameter
        $sql .= " AND ( fname LIKE '" . $requestData['search']['value'] . "%' ";
        $sql .= " OR ( mname LIKE '" . $requestData['search']['value'] . "%' ";
        $sql .= " OR ( lname LIKE '" . $requestData['search']['value'] . "%' ";
        $sql .= " OR email LIKE '" . $requestData['search']['value'] . "%' ";
        $sql .= " OR gender LIKE '" . $requestData['search']['value'] . "%' )";
        $sql .= " OR ( dob LIKE '" . $requestData['search']['value'] . "%' ";
        $sql .= " OR ( address LIKE '" . $requestData['search']['value'] . "%' ";
    }
    $query = mysqli_query($DBconnect, $sql) or die("Mysql Mysql Error in getting : get products");
    $totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result.
    $sql .= " ORDER BY " . $columns[$requestData['order'][0]['column']] . "   " . $requestData['order'][0]['dir'] . "   LIMIT " . $requestData['start'] . " ," . $requestData['length'] . "   ";
    /* $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc , $requestData['start'] contains start row number ,$requestData['length'] contains limit length. */
    $query = mysqli_query($DBconnect, $sql) or die("Mysql Mysql Error in getting : get products");

    $data = array();
    while ($row = mysqli_fetch_array($query)) { // preparing an array
        $nestedData = array();
        $nestedData[] = $row["fname"];
        $nestedData[] = $row["mname"];
        $nestedData[] = $row["lname"];
        $nestedData[] = $row["email"];
        $nestedData[] = $row["gender"];
        $nestedData[] = $row["dob"];
        $nestedData[] = $row["address"];

        $data[] = $nestedData;
    }
    $json_data = array(
        "draw" => intval($requestData['draw']), // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw.
        "recordsTotal" => intval($totalData), // total number of records
        "recordsFiltered" => intval($totalFiltered), // total number of records after searching, if there is no searching then totalFiltered = totalData
        "data" => $data, // total data array
    );
    echo json_encode($json_data); // send data as json format

}