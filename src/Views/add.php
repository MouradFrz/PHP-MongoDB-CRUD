<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./output.css">
    <title>Add</title>
</head>

<body>
    <div class="container">
        <h1 class="text-[3rem] font-bold">Create a new user</h1>
        <form action="add" method="POST" class="flex flex-col">
            <label for="">Name</label>
            <input type="text" name="name">
            <br>
            <label for="">Age</label>
            <input type="text" name="age">
            <br>
            <button class="button">Add</button>
        </form>
    </div>


</body>

</html>