<?php
$page_title = '編輯課程';
$page_name = 'course-data-edit';
require __DIR__ . '/parts/__connect_db.php';
// require __DIR__. '/parts/admin_required.php';
$sid = isset($_GET['sid']) ? intval($_GET['sid']) : 0;
if(empty($sid)){
    header('Location: course-data-list.php');
    exit;
}

$sql = " SELECT * FROM course_list WHERE sid=$sid";
$row = $pdo->query($sql)->fetch();
if(empty($row)){
    header('Location: course-data-list.php');
    exit;
}
?>
<?php require __DIR__ . '/parts/__html_head.php'; ?>
<style>
    .container {
        margin: 100px 400px;
    }

    span.red-stars {
        color: red;
    }

    small.error-msg {
        color: red;
    }
</style>

<?php include __DIR__ . '/parts/__navbar.php'; ?>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div id="infobar" class="alert alert-success" role="alert" style="display: none">
                A simple success alert—check it out!
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">編輯課程</h5>

                    <form name="form1" onsubmit="checkForm(); return false;" novalidate>

                        <input type="hidden" name="sid" value="<?= $row['sid'] ?>">

                        <div class="form-group">
                            <label for="teacher"><span class=" red-stars">**</span>講師</label>
                            <input type="text" class="form-control" id="teacher" name="teacher" required value="<?= $row['teacher'] ?>">
                            <small class="form-text error-msg"></small>
                        </div>
                        <div class="form-group">
                            <label for="course_name"><span class="red-stars">**</span>課程名稱</label>
                            <input type="text" class="form-control" id="course_name" name="course_name" required value="<?= $row['course_name'] ?>">
                            <small class="form-text error-msg"></small>
                        </div>
                        <div class="form-group">
                            <label for="course_type"><span class="red-stars">**</span>課程類型(請擇一填寫：公益活動／室內課程／戶外活動)</label>
                            <input type="text" class="form-control" id="course_type" name="course_type" required value="<?= $row['course_type'] ?>">
                            <small class="form-text error-msg"></small>
                        </div>

                        <div class="form-group">
                            <label for="date"><span class="red-stars">**</span>課程日期(請依照格式填寫，例如：2020-09-04)</label>
                            <input type="text" class="form-control" id="date" name="date" required value="<?= $row['date'] ?>">
                            <small class="form-text error-msg"></small>
                        </div>

                        <div class="form-group">
                            <label for="course_time"><span class="red-stars">**</span>上課時間(請記得輸入上下午，例如：上午10點半)</label>
                            <input type="text" class="form-control" id="course_time" name="course_time" required value="<?= $row['course_time'] ?>">
                            <small class="form-text error-msg"></small>
                        </div>
                        <div class="form-group">
                            <label for="place"><span class="red-stars">**</span>上課地點(請輸入分店名稱，公益活動與戶外活動請記得輸入地址)</label>
                            <input type="text" class="form-control" id="place" name="place" required value="<?= $row['place'] ?>">
                            <small class="form-text error-msg"></small>
                        </div>
                        <div class="form-group">
                            <label for="members"><span class="red-stars">**</span>人數限制(請填寫數字，例如：10人)</label>
                            <input type="text" class="form-control" id="members" name="members" required value="<?= $row['members'] ?>">
                            <small class="form-text error-msg"></small>
                        </div>
                        <div class="form-group">
                            <label for="price"><span class="red-stars">**</span>課程費用(請填寫數字即可，例如：300)</label>
                            <input type="text" class="form-control" id="price" name="price" required value="<?= $row['price'] ?>">
                            <small class="form-text error-msg"></small>
                        </div>

                        <div class="form-group">
                            <label for="on_sale"><span class="red-stars">**</span>課程狀態(請擇一填寫：上架／已下架)</label>
                            <input type="text" class="form-control" id="on_sale" name="on_sale" required value="<?= $row['on_sale'] ?>">
                            <small class="form-text error-msg"></small>
                        </div>


                        <div class="form-group">
                            <label for="introduction">課程簡介</label>
                            <textarea class=" form-control" id="introduction" name="introduction" cols="30" rows="3" placeholder="請摘要輸入廣宣或新聞稿內容" ><?= $row['introduction'] ?></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include __DIR__ . '/parts/__scripts.php'; ?>
<script>
    const $teacher = document.querySelector('#teacher');
    const $course_name = document.querySelector('#course_name');
    const $course_type = document.querySelector('#course_type');
    const $date = document.querySelector('#date');
    const $course_time = document.querySelector('#course_time');
    const $place = document.querySelector('#place');
    const $members = document.querySelector('#members');
    const $price = document.querySelector('#price');
    const $on_sale = document.querySelector('#on_sale');
    const r_fields = [$teacher, $course_name, $course_type, $date, $course_time, $place, $members, $price, $on_sale];
    const infobar = document.querySelector('#infobar');
    const submitBtn = document.querySelector('button[type=submit]');

    function checkForm() {
        console.log('hi');
        let isPass = true;

        r_fields.forEach(el => {
            el.style.borderColor = '#cccccc';
            el.nextElementSibling.innerHTML = '';
        });
        submitBtn.style.display = 'none';
        // TODO: 檢查資料格式
        // if ($teacher.value.length < 2) {
        //     isPass = false;
        //     $name.style.borderColor = 'red';
        //     $name.nextElementSibling.innerHTML = '請填寫講師姓名';
        // }

        // if ($course_name.value.length < 2) {
        //     isPass = false;
        //     $name.style.borderColor = 'red';
        //     $name.nextElementSibling.innerHTML = '請填寫課程名稱';
        // }

        // if ($course_type.value.length < 2) {
        //     isPass = false;
        //     $name.style.borderColor = 'red';
        //     $name.nextElementSibling.innerHTML = '請填寫課程類型';
        // }

        // if ($date.value.length < 2) {
        //     isPass = false;
        //     $name.style.borderColor = 'red';
        //     $name.nextElementSibling.innerHTML = '請填寫課程日期';
        // }

        // if ($course_time.value.length < 2) {
        //     isPass = false;
        //     $name.style.borderColor = 'red';
        //     $name.nextElementSibling.innerHTML = '請填寫上課時間';
        // }

        // if ($place.value.length < 2) {
        //     isPass = false;
        //     $name.style.borderColor = 'red';
        //     $name.nextElementSibling.innerHTML = '請填寫上課地點';
        // }

        // if ($members.value.length < 2) {
        //     isPass = false;
        //     $name.style.borderColor = 'red';
        //     $name.nextElementSibling.innerHTML = '請填寫人數限制';
        // }

        // if ($price.value.length < 2) {
        //     isPass = false;
        //     $name.style.borderColor = 'red';
        //     $name.nextElementSibling.innerHTML = '請填寫課程費用';
        // }

        // if ($on_sale.value.length < 2) {
        //     isPass = false;
        //     $name.style.borderColor = 'red';
        //     $name.nextElementSibling.innerHTML = '請填寫課程狀態';
        // }

        if (isPass) {
            const fd = new FormData(document.form1);

            fetch('course-data-edit-api.php', {
                    method: 'POST',
                    body: fd
                })
                .then(r => r.json())
                .then(obj => {
                    console.log(obj);
                    // if (obj.success) {
                    //     infobar.innerHTML = '修改成功';
                    //     infobar.className = "alert alert-success";
                    //     // if(infobar.classList.contains('alert-danger')){
                    //     //     infobar.classList.replace('alert-danger', 'alert-success')
                    //     // }
                    //     setTimeout(() => {
                    //         location.href = 'course-data-list.php';
                    //     }, 3000)
                    // } else {
                    //     infobar.innerHTML = obj.error || '資料沒有修改';
                    //     infobar.className = "alert alert-danger";
                    //     // if(infobar.classList.contains('alert-success')){
                    //     //     infobar.classList.replace('alert-success', 'alert-danger')
                    //     // }
                    //     submitBtn.style.display = 'block';
                    // }
                    // infobar.style.display = 'block';
                });
        } else {
            submitBtn.style.display = 'block';
        }
    }
</script>
<?php include __DIR__ . '/parts/__html_foot.php'; ?>