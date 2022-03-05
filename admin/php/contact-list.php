<?php

include 'connection.php';

if ($_SERVER['SERVER_NAME'] == constant("SERVER_NAME")) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
$query = "select * from informations";
$query_execute = mysqli_query($conn, $query);

if (mysqli_num_rows($query_execute) > 0) {
    while ($result = mysqli_fetch_array($query_execute)) {
        ?>
        <tr class="text-center text-dark">
            <td> <?php echo $result['S no'] ?> </td>
            <td><a class = "view" href="./contact-view.php"><?php echo $result['name'] ?></a></td>
            <td> <?php echo $result['email'] ?> </td>
            <td> <?php echo $result['subject'] ?> </td>

            <td><button class="btn btn-outline-success mt-2 mx-2" style=" color: #000;" data-bs-toggle="modal" data-bs-target="#MessageModal"><i class="fa-solid fa-envelope"></i></button><button class="btn mt-3 mx-2 mb-2 btn-outline-success" style="color: #000;"data-bs-toggle="modal" data-bs-target="#ReplyModal" data-bs-whatever="@getbootstrap"><i class="fa-solid fa-reply"></i></button><button class="btn btn-outline-danger mt-2 mx-2" style=" color: #000;" data-bs-toggle="modal" data-bs-target="#exampleModal">
            <lord-icon
             src="https://cdn.lordicon.com/qsloqzpf.json"
             motion-type =hover-empty
             trigger="hover"
             style="width:20px;height:20px">
             </lord-icon></button></td>
        </tr>
        <?php
}
}
} else {
    echo json_encode(array("success" => false, "message" => "Method not found"));
}
}

?>