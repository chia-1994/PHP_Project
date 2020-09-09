<?php
$page_title = '新增課程';
$page_name = 'course-data-insert';
require __DIR__ . '/parts/__course_connect_db.php';
// require __DIR__. '/parts/admin_required.php';
?>
<?php require __DIR__ . '/parts/__html_head.php'; ?>
<style>
    .container {
        margin: 50px 400px 300px 300px;
    }

    span.red-stars {
        color: red;
    }

    small.error-msg {
        color: red;
    }

    .col-lg-12 {
        margin-top: 20px;
    }
</style>

<?php include __DIR__ . '/parts/__course_navbar.php'; ?>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">新增課程</h5>

                    <form name="form1" onsubmit="checkForm(); return false;" novalidate>
                        <div class="form-group">
                            <label for="teacher"><span class=" red-stars">**</span>講師</label>
                            <input type="text" class="form-control" id="teacher" name="teacher" required>
                            <small class="form-text error-msg"></small>
                        </div>
                        <div class="form-group">
                            <label for="course_name"><span class="red-stars">**</span>課程名稱</label>
                            <input type="text" class="form-control" id="course_name" name="course_name" required>
                            <small class="form-text error-msg"></small>
                        </div>
                        <div class="form-group">
                            <label for="course_type"><span class="red-stars">**</span>課程類型(請擇一填寫：公益活動／室內課程／戶外活動)</label>
                            <input type="text" class="form-control" id="course_type" name="course_type" required>
                            <small class="form-text error-msg"></small>
                        </div>

                        <div class="form-group">
                            <label for="date"><span class="red-stars">**</span>課程日期(請依照格式填寫，例如：2020-09-04)</label>
                            <input type="text" class="form-control" id="date" name="date" required>
                            <small class="form-text error-msg"></small>
                        </div>

                        <div class="form-group">
                            <label for="course_time"><span class="red-stars">**</span>上課時間(請記得輸入上下午，例如：上午10點半)</label>
                            <input type="text" class="form-control" id="course_time" name="course_time" required>
                            <small class="form-text error-msg"></small>
                        </div>
                        <div class="form-group">
                            <label for="place"><span class="red-stars">**</span>上課地點(請輸入分店名稱，公益活動與戶外活動請記得輸入地址)</label>
                            <input type="text" class="form-control" id="place" name="place" required>
                            <small class="form-text error-msg"></small>
                        </div>
                        <div class="form-group">
                            <label for="members"><span class="red-stars">**</span>人數限制(請填寫數字，例如：10人)</label>
                            <input type="text" class="form-control" id="members" name="members" required>
                            <small class="form-text error-msg"></small>
                        </div>
                        <div class="form-group">
                            <label for="price"><span class="red-stars">**</span>課程費用(請填寫數字即可，例如：300)</label>
                            <input type="text" class="form-control" id="price" name="price" required>
                            <small class="form-text error-msg"></small>
                        </div>

                        <div class="form-group">
                            <label for="on_sale"><span class="red-stars">**</span>課程狀態(請擇一填寫：上架／已下架)</label>
                            <input type="text" class="form-control" id="on_sale" name="on_sale" required>
                            <small class="form-text error-msg"></small>
                        </div>

                        <div class="form-group">
                            <label for="introduction">課程簡介</label>
                            <textarea class=" form-control" name="introduction" id="introduction" cols="30" rows="3" placeholder="請摘要輸入廣宣或新聞稿內容"></textarea>
                        </div>
                        <form>
                            <div class="row">
                                <div class="col">
                                    <button type="submit" class="btn btn-primary col-lg-12">送出新增</button>
                                </div>
                                <div class="col">
                                    <button type="submit" class="btn btn-warning col-lg-12" onclick="self.location.href='course-data-list.php'" style="text-decoration:none;color:black;">取消新增</button>
                                </div>
                            </div>
                        </form>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div id="infobar" class="alert alert-success" role="alert" text-align="center" style="display: none"></div>
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
        // console.log('hi');
        let isPass = true;

        r_fields.forEach(el => {
            el.style.borderColor = '#cccccc';
            el.nextElementSibling.innerHTML = '';
        });
        // submitBtn.style.display = 'none';
        // TODO: 檢查資料格式
        if ($teacher.value.length < 2) {
            isPass = false;
            $teacher.style.borderColor = 'red';
            $teacher.nextElementSibling.innerHTML = '請填寫講師姓名';
            infobar.style.display = 'block';
            infobar.innerHTML = '請輸入紅框必填項目，若資訊不齊全，表單不會送出，請先按「取消新增」';
            infobar.className = "alert alert-danger";
        }

        if ($course_name.value.length < 2) {
            isPass = false;
            $course_name.style.borderColor = 'red';
            $course_name.nextElementSibling.innerHTML = '請填寫課程名稱';
        }

        if ($course_type.value.length < 2) {
            isPass = false;
            $course_type.style.borderColor = 'red';
            $course_type.nextElementSibling.innerHTML = '請填寫課程類型';
        }

        if ($date.value.length < 2) {
            isPass = false;
            $date.style.borderColor = 'red';
            $date.nextElementSibling.innerHTML = '請填寫課程日期';
        }

        if ($course_time.value.length < 2) {
            isPass = false;
            $course_time.style.borderColor = 'red';
            $course_time.nextElementSibling.innerHTML = '請填寫上課時間';
        }

        if ($place.value.length < 2) {
            isPass = false;
            $place.style.borderColor = 'red';
            $place.nextElementSibling.innerHTML = '請填寫上課地點';
        }

        if ($members.value.length < 2) {
            isPass = false;
            $members.style.borderColor = 'red';
            $members.nextElementSibling.innerHTML = '請填寫人數限制';
        }

        if ($price.value.length < 2) {
            isPass = false;
            $price.style.borderColor = 'red';
            $price.nextElementSibling.innerHTML = '請填寫課程費用';
        }

        if ($on_sale.value.length < 2) {
            isPass = false;
            $on_sale.style.borderColor = 'red';
            $on_sale.nextElementSibling.innerHTML = '請填寫課程狀態';
        }

        // infobar.style.display = 'block';
        // infobar.innerHTML = '請輸入紅框必填項目，若資訊不齊全，表單不會送出，請先按「取消新增」';
        // infobar.className = "alert alert-danger";

        if (isPass) {
            const fd = new FormData(document.form1);

            fetch('course-data-insert-api.php', {
                    method: 'POST',
                    body: fd
                })
                .then(r => r.json())
                .then(obj => {
                    console.log(obj);
                    if (obj.success) {
                        infobar.innerHTML = '新增成功';
                        infobar.className = "alert alert-success";
                        // if(infobar.classList.contains('alert-danger')){
                        //     infobar.classList.replace('alert-danger', 'alert-success')
                        // }
                        setTimeout(() => {
                            location.href = 'course-data-list.php';
                        }, 1500)
                    } else {
                        infobar.innerHTML = obj.error || '新增失敗';
                        infobar.className = "alert alert-danger";
                        // if(infobar.classList.contains('alert-success')){
                        //     infobar.classList.replace('alert-success', 'alert-danger')
                        // }
                        submitBtn.style.display = 'block';
                    }
                    infobar.style.display = 'block';
                });
        } else {
            submitBtn.style.display = 'block';
        }
    }
</script>
<?php include __DIR__ . '/parts/__html_foot.php'; ?>
