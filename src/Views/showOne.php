<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./output.css">
    <title>Show One</title>
</head>

<body>
    <div class="container">
        <h1 class="text-[3rem] font-bold">Edit user</h1>
        <form action="update" method="POST" class="flex flex-col">
            <input type="hidden" name="id" value="<?= $data->_id->{'$oid'} ?>">
            <label for="">Name</label>
            <input type="text" value="<?= $data->name ?>" name="name">
            <label for="">Age</label>
            <input type="text" value="<?= $data->age ?>" name="age">
            <button class="button mt-3">Update</button>
        </form>
    </div>
</body>

</html>