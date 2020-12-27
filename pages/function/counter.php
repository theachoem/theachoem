<?php include('function.php') ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visitor</title>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
</head>

<style>
body {
    background: #005481;
    line-height: 23px;
    font-size: 16px;
    font-family: "Quicksand", sans-serif !important;
    font-display: swap !important;
}

.table-container {
    height: 100%;
    border-radius: 10px;
}

.data {
    width: 100%;
    border-collapse: collapse;
    background: white;
    border-radius: 10px;
    overflow: hidden;
}

th,
td {
    text-align: left;
    padding: 3px 5px 3px 10px;
    font-size: 13px;
}

tr:nth-child(even) {
    background-color: #f2f2f2;
}

th {
    background-color: #005481;
    color: white;
}
</style>

<body>
    <div class="table-container">
        <table class="data">
            <tr>
                <th>id</th>
                <th>user_agent</th>
                <th>ip_address</th>
                <th>visit_date</th>
            </tr>
            <?php
                for($i=0; $i < count($id) ; $i ++){               
                    echo '<tr><td>'.$id[$i].'</td>';
                    echo '<td>'.$user_agent[$i].'</td>';
                    echo '<td>'.$ip_address[$i].'</td>';
                    echo '<td>'.$visit_date[$i].'.</td></tr>';
                }
            ?>
        </table>
    </div>
    <div class="table-container">
        <table class="data">
            <tr>
                <th>unique_ip_address</th>
            </tr>
            <?php
                for($i=0; $i < count($uniqueIP) ; $i ++){               
                    echo '<tr><td>'.$uniqueIP[$i].'</td></tr>';
                    if($i == count($uniqueIP) - 1) echo '<tr><td>'.$i.'</td></tr>';
                }
            ?>
        </table>
    </div>
    

</body>

</html>