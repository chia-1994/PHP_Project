<?php
$page_title = '會員新增';
$page_name = 'member_new';
require __DIR__ . '/connect_database.php'; ?>
<?php require __DIR__ . '../../parts/html_head.php'; ?>
<style>
    span.red-stars {
        color: red;
    }

    small.error_msg {
        color: #CCCCCC;
    }
</style>
<?php require __DIR__ . '../../parts/navbar.php'; ?>

<div class="container">

    <div class="row">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">會員註冊</h5>
                <form id="member_form" name="member_form" onsubmit="checkForm(); return false;" novalidate>

                    <div class="form-group">
                        <label for="name"><span class="red-stars"></span>Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="name">
                        <small class="form-text error_msg"></small>
                    </div>


                    <div class="form-group">
                        <label for="email"><span class="red-stars"></span>Email</label>
                        <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email" placeholder="email">
                        <small class="form-text error_msg">我們不會將您的email外流出去</small>
                    </div>


                    <div class="form-group">
                        <label for="pwd"><span class="red-stars"></span>Password</label>
                        <input type="password" class="form-control" id="pwd" name="pwd">
                        <small class="form-text error_msg">請輸入包含數字及英文大小寫的密碼</small>
                    </div>

                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="checkPassword" onclick="showpwd()">
                        <label class="form-check-label" for="checkPassword">檢視密碼</label>
                        <small class="form-text eerror_msg"></small>
                    </div>


                    <div class="form-group">
                        <label for="id_number"><span class="red-stars"></span>Id Number</label>
                        <input type="text" class="form-control" id="id_number" name="id_number" placeholder="Id Number">
                        <small class="form-text error_msg"></small>
                    </div>


                    <div class="form-group">
                        <label for="tel"><span class="red-stars"></span>Tel</label>
                        <input type="tel" class="form-control" id="tel" name="tel" pattern="09\d{2}-?\d{3}-?\d{3}">
                        <small class="form-text error_msg"></small>
                    </div>


                    <div class="form-group aaa">
                        <label for=""><span class="red-stars"></span>Gender</label>

                        <br>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="RadioMale" value="1">
                            <label class="form-check-label" for="inlineRadio1">男</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="RadioFemale" value="2">
                            <label class="form-check-label" for="inlineRadio2">女</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="RadioElse" value="3">
                            <label class="form-check-label" for="inlineRadio2">不提供</label>
                        </div>

                        <small class="form-text gender_form"></small>
                    </div>



                    <div class="form-group">
                        <label for="birth"><span class="red-stars"></span>Birthday</label>
                        <input type="date" class="form-control" id="birth" name="birth">
                        <small class="form-text error_msg"></small>
                    </div>


                    <div class="form-group">
                        <label for="address"><span class="red-stars"></span>Address</label>
                        <textarea class="form-control" name="address" id="address" cols="30" rows="3"></textarea>
                        <small class="form-text error_msg"></small>
                    </div>


                    <button type="submit" class="btn btn-primary">註冊</button>
                    <div class="row">
                        <div id="infobar" class="alert alert-success" role="alert" style="display: none"></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require __DIR__ . '../../parts/scripts.php'; ?>
<?php require __DIR__ . '../../parts/script_new_pattern.php'; ?>

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
<?php require __DIR__ . '../../parts/html_foot.php'; ?>