<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./output.css">
    <title>Home</title>
</head>

<body>
    <div class="container pb-10">
        <h1 class="text-[3rem] font-bold">All Users</h1>
        <?php if (isset($_SESSION["error"])) { ?>
            <p class="bg-red-400 rounded-lg border-2 border-red-900 px-10 py-7 my-5"><?php echo $_SESSION["error"];
                unset($_SESSION["error"]); ?></p>
        <?php } ?>
        <?php if (isset($_SESSION["success"])) { ?>
            <p class="bg-green-400 rounded-lg border-2 border-green-900 px-10 py-7 my-5"><?php echo $_SESSION["success"];
                                                                                            unset($_SESSION["success"]); ?></p>
        <?php } ?>
        <div class=" flex justify-center flex-col gap-5">
            <?php for ($i = 0; $i < count($data); $i++) { ?>
                <div class=" bg-slate-400/60 px-10 py-7 border-slate-700 rounded-lg border-2 shadow-md rounded-tr-[100px]">
                    <p><span class="text-xl font-semibold">Name :</span> <?= $data[$i]->name ?></p>
                    <p><span class="text-xl font-semibold">Age :</span> <?= $data[$i]->age ?></p>
                    <div class="flex gap-5 mt-4">
                        <a href="showOne?id=<?= $data[$i]->_id->{'$oid'} ?>" class="button">Edit</a>
                        <form action="delete" method="POST">
                            <input type="hidden" name="id" value="<?= $data[$i]->_id->{'$oid'} ?>">
                            <button class="button">Delete</button>
                        </form>
                    </div>
                </div>
            <?php } ?>
        </div>
        <br>
        <br>
        <a href="/add-form" class="button primary block w-fit">Add a new user</a>
    </div>
</body>

</html>