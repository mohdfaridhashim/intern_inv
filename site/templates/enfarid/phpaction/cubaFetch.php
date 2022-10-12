<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HTML and PHP code</title>
</head>
<body>
    <h1>Display user list using HTML and PHP</h1>
    
    <table border="1px" style="width:600px; line-height:40px;">
        <thead>
            <tr>
                <th> ID </th>
                <th> Name </th>
                <th> Quantity </th>
            </tr>
        </thead>
        <tbody id="tableBody">
            
        </tbody>
    </table>
</body>
</html>

<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

<script>
$( document ).ready(function() {
    $.ajax({
        url: 'fetchInventory.php',
        mothod: 'post',
        dataType: 'json',
        success:function(data){
            let string = '';
            $.each(data, function(key, value){
                string += `<tr>
                <td>${value['inv_id']}</td>
                <td>${value['inv_name']}</td>
                <td>${value['inv_qty']}</td>
                </tr>`;
            });
            $('#tableBody').append(string);
        },
        error:{

        }
    });
});
</script>