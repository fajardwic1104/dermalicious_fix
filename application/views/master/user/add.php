<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="<?=site_url('master/user/insertuser')?>" method="post">
        <label for="">Nama User</label>
        <input type="text" name="nama_user" id=""><br>
        <label for="">Email User</label>
        <input type="email" name="email_user" id=""><br>
        <label for="">Role</label>
        <select name="role_user">
            <?php foreach ($role as $key) {?>
                <option value="<?=$key->id_role?>"><?=$key->nama_role?></option>
            <?php } ?>
        </select>
        <!-- <input type="text" name="role_user" id=""><br> -->
        <button type="submit">Save</button>
    </form>
</body>
</html>