<?php
$page_title = '會員更新';
$page_name = 'member';
$page_name1 = 'member_user_edit';
require __DIR__ . '/connect_database.php';
require __DIR__ . '../../parts/__html_head.php';

$id = isset($_GET['id']) ? $_GET['id'] : 0;
if (empty($id)) {
    header('Location : member_user_list.php');
    exit;
}
$sql_str = "SELECT * FROM members WHERE id=$id ";
$sql = $pdo->query($sql_str);
$row = $sql->fetch();
if (empty($row)) {
    header('Location : member_user_list.php ');
    exit;
}

?>
<style>
    span.red-stars {
        color: red;
    }

    small.error_msg {
        color: #CCCCCC;
    }

    .btn {
        background-color: #86A697;
        color: #fffffb;
    }

    .btn:hover {
        background-color: #26453D;
        color: #ffffff;
    }
</style>
<link rel="stylesheet" href="style_right.css">
<?php require __DIR__ . '../../parts/__navbar.php'; ?>




<div class="concon">
    <div class="nvb-flex conconcon col-6">
        <a class="astyle" href="member_user_list.php">會員列表</a>
        <div class="astylename" href="#">編輯</div>
    </div>
    <div class="col-6  conconcon">
        <div class="card tomid">




            <div class="card-body">
                <!-- <h5 class="card-title">資料更新</h5> -->
                <form id="member_form" name="member_form" onsubmit="checkForm(); return false;" novalidate>
                    <input type="hidden" name="id" value="<?= $row['id'] ?>">
                    <div class="form-group">
                        <label for="name"><span class="red-stars"></span>Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?= htmlentities($row['name']) ?>">
                        <small class="form-text error_msg"></small>
                    </div>


                    <div class="form-group">
                        <label for="email"><span class="red-stars"></span>Email</label>
                        <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email" value="<?= htmlentities($row['email']) ?>" readonly>
                        <small class="form-text error_msg">我們不會將您的email外流出去</small>
                    </div>


                    <div class="form-group">
                        <label for="pwd"><span class="red-stars"></span>Password</label>
                        <input type="password" class="form-control" id="pwd" name="pwd" value="<?= htmlentities($row['pwd']) ?>">
                        <small class="form-text error_msg">請輸入包含數字及英文大小寫的密碼</small>
                    </div>

                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="checkPassword" onclick="showpwd()">
                        <label class="form-check-label" for="checkPassword">檢視密碼</label>
                        <small class="form-text eerror_msg"></small>
                    </div>


                    <div class="form-group">
                        <label for="id_number"><span class="red-stars"></span>Id Number</label>
                        <input type="text" class="form-control" id="id_number" name="id_number" value="<?= htmlentities($row['id_number']) ?>" readonly>
                        <small class="form-text error_msg"></small>
                    </div>


                    <div class="form-group">
                        <label for="tel"><span class="red-stars"></span>Tel</label>
                        <input type="tel" class="form-control" id="tel" name="tel" pattern="09\d{2}-?\d{3}-?\d{3}" value="<?= htmlentities($row['tel']) ?>">
                        <small class="form-text error_msg"></small>
                    </div>


                    <div class="form-group">
                        <label for=""><span class="red-stars"></span>Gender</label>

                        <br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="RadioMale" value="1" <?= $row['gender'] == 1 ? 'checked' : '' ?>>
                            <label class="form-check-label" for="inlineRadio1">男</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="RadioFemale" value="2" <?= $row['gender'] == 2 ? 'checked' : '' ?>>
                            <label class="form-check-label" for="inlineRadio2">女</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="RadioElse" value="3" <?= $row['gender'] == 3 ? 'checked' : '' ?>>
                            <label class="form-check-label" for="inlineRadio2">不提供</label>
                        </div>
                    </div>



                    <div class="form-group">
                        <label for="birth"><span class="red-stars"></span>Birthday</label>
                        <input type="date" class="form-control" id="birth" name="birth" value="<?= htmlentities($row['birth']) ?>">
                        <small class="form-text error_msg"></small>
                    </div>


                    <div class="form-group">
                        <label for="address"><span class="red-stars"></span>Address</label>
                        <textarea class="form-control" name="address" id="address" cols="30" rows="3"><?= htmlentities($row['address']) ?></textarea>
                        <small class="form-text error_msg"></small>
                    </div>

                    <div class="form-group">
                        <label for="level"><span class="red-stars"></span>Level</label>
                        <input type="level" class="form-control" id="level" name="level" value="<?= $row['level'] ?>" readonly>
                        <small class="form-text error_msg"></small>
                    </div>


                    <button type="submit" class="btn">更新</button>
                    <div class="row">
                        <div id="infobar" class="alert alert-success" role="alert" style="display: none"></div>
                    </div>


                </form>
            </div>
        </div>
    </div>
</div>

<?php require __DIR__ . '../../parts/__scripts.php'; ?>
<?php require __DIR__ . '/script_edit_user_pattern.php'; ?>

<script>
    function showpwd() {
        const inputtwd = document.getElementById("pwd");
        if (inputtwd.type === "password") {
            inputtwd.type = "text";
        } else {
            inputtwd.type = "password";
        }
    }
</script>
<?php require __DIR__ . '../../parts/__html_foot.php'; ?>