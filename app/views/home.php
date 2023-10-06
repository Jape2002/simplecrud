<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="/<?= isset(($edit['id']))?"submitedit/" . $edit['id'] : "submit" ?>" method="post">
        <label for="firsname">Enter First Name : </label>
        <input type="text" name="firstname" required value= "<?= (isset($edit['id']))? $edit['first_name'] : "" ?>">
        <label for="lastname">Enter Last Name : </label>
        <input type="text" name="lastname" required value= "<?= (isset($edit['id']))? $edit['last_name'] : "" ?>">
        <label for="age">Enter Age : </label>
        <input type="number" name="age" required value= "<?= (isset($edit['id']))? $edit['age'] : "" ?>">
        <input type="submit" value="<?= isset(($edit['id']))?"Update" : "Submit" ?>">
    </form>

    <thead>
        <table>
        <th>first name</th>
        <th>Last name</th>
        <th>age</th>
        <th>Action</th>
    </thead>
    <tbody>
        <?php foreach($users as $u): ?>
            <tr>
                <td><?= $u['first_name']; ?></td>
                <td><?= $u['last_name']; ?></td>
                <td><?= $u['age']; ?></td>
                <td><a href="/delete-user/<?= $u['id']; ?>">DELETE USER</a>||<a href="/edit-user/<?= $u['id']; ?>">EDIT USER</td>
            </tr>
            <?php endforeach; ?>
    </tbody>
    </table>
</body>
</html>