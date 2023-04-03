<?php
include "koneksi.php";
$followings = mysqli_query($koneksi, "SELECT*FROM users");
$followers = mysqli_query($koneksi, "SELECT*FROM users");
$users = mysqli_query($koneksi, "SELECT followers.id_user_following, followers.id_user_followed, users.name FROM followers JOIN users WHERE id_user_following = users.id ");
$users_followed = mysqli_query($koneksi, "SELECT followers.id_user_following, followers.id_user_followed, users.name FROM followers JOIN users WHERE id_user_followed = users.id ");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body{
            padding: 2%
        }
        #table{
            margin-top : 5%;
            width: max-content;
            border : 1px solid black;
        }
    
    table{
            display: inline;
        }
    </style>
    <title>User Many to Many Relationship</title>
</head>
<body>
    <form action="tambah.php" method="post">
        <label for="following">Following</label>
        <select name="id_user_following" id="following">
        <option>Following</option>
        <?php while($following = mysqli_fetch_assoc($followings)): ?>
            <option value="<?php echo $following['id']; ?>"><?php echo $following['name']; ?></option>
        <?php endwhile; ?>
        </select>
        <button type="submit" name="following">submit</button>
    </form>
    <form action="tambah.php" method="post">      
        <br>
        <br>
        <label for="followed">Followed</label>
        <select name="id_user_followed" id="followed">
        <option>Followed</option>
        <?php while($followed = mysqli_fetch_assoc($followers)): ?>
            <option value="<?php echo $followed['id']; ?>"><?php echo $followed['name']; ?></option>
        <?php endwhile; ?>
        </select>
        <button type="submit" name="followed">submit</button>
    </form>

    <section id="table" >
        <table  cellpadding="10px" cellspacing="0">
            <thead>
                <td>Following</td>
            </thead>
            <?php while($user = mysqli_fetch_assoc($users)): ?>
            <tr>
                <td><?php echo $user['name'] ?></td>
            </tr>
            <?php endwhile; ?>

        </table>
        
        <table  cellpadding="10px" cellspacing="0">
            <thead>
                <td>Followed</td>
            </thead>
            <?php while($user = mysqli_fetch_assoc($users_followed)): ?>
            <tr>
                <td><?php echo $user['name'] ?></td>
            </tr>
            <?php endwhile; ?>

        </table>
    </section>

</body>
</html>