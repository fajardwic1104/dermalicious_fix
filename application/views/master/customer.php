<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table id="customer">
        <tr>
            <th>nama</th>
            <th>email</th>
            <th>telepon</th>
        </tr>
        
        <?php
            foreach ($data_cust as $key) {
        ?>
        <tr>
            <td><?=$key->CUSTOMER_ID?></td>
        </tr>
        <?php }?>
    </table>


    <script>
        // var tableBody = $('#customer');

        // $.ajax
    </script>
</body>
</html>