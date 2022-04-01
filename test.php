<link rel="stylesheet" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<table id="new" class="text-center">
<thead>
    <th>ID</th>
    <th>Name</th>
    <th>Email</th>
</thead>
<tbody>
    <tr>

    </tr>
</tbody>
</table>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function() {
        $('#new').dataTable({
            "processing": true,
            "ajax": "fetch_data.php",
            "columns": [
                {data: 'id'},
                {data: 'name'},
                {data: 'email'}
            ]
        });
    });
</script>