<?php 
include 'functions.php';
$contactInfo = getContacts();

// echo '<pre>';
// print_r($contactInfo);
// echo '</pre>';

if(!empty($_GET['id'])) {
    $id = $_GET['id'];
    unset($contactInfo[$id]);

    putContacts($contactInfo);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Contact</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="contactAdd">
        <a href="add.php">Add Contact</a>
    </div>

    <div class="container">
        <?php if(empty($contactInfo)) { ?>

        <div class="noData">
            No contact found!
        </div>

        <?php } else { ?>

        <div class="contact_information">
            <table>
                <thead>
                    <tr>
                        <th>
                            SL
                        </th>
                        <th>
                            Name
                        </th>
                        <th>
                            Email
                        </th>
                        <th>
                            Contact
                        </th>
                        <th>
                            Action
                        </th>
                    </tr>
                </thead>

                <tbody>
                    <?php 
                        $sl = 1;
                        foreach($contactInfo as $index=>$contact) { ?>
                    <tr>
                        <td><?= $sl++ ?></td>
                        <td><?= $contact['name'] ?></td>
                        <td><?= $contact['email'] ?></td>
                        <td><?= $contact['contact'] ?></td>
                        <td>
                            <a href="edit.php?id=<?= $index ?>">Edit</a> |
                            <a href="index.php?id=<?= $index ?>" onclick="return confirm('Are you sure?')">Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

        <?php } ?>
        
    </div>

</body>

</html>