<script>
    // 檢查
    const email_pattern = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    const password_pattern = /^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])([a-zA-Z0-9]{6,})$/;
    const id_number_pattern = /^[A-Za-z][12]\d{8}$/;
    const tel_pattern = /^09\d{2}-?\d{3}-?\d{3}$/;

    const _name = document.querySelector('#name');
    const _email = document.querySelector('#email');
    const _password = document.querySelector('#pwd');
    const _idnumber = document.querySelector('#id_number');
    const _tel = document.querySelector('#tel');
    const _birth = document.querySelector('#birth');
    const _address = document.querySelector('#address');

    const require_fields = [_name, _email, _password, _idnumber, _tel, _birth, _address];

    const infobar = document.querySelector('#infobar');
    const submitBtn = document.querySelector('button[type=submit]');


    function checkForm() {

        let isPass = true;

        require_fields.forEach(el => {
            el.style.borderColor = '#CCCCCC';
            el.nextElementSibling.innerHTML = '';
        });

        submitBtn.style.display = 'none';

        if (_name.value.length < 2) {
            isPass = false;
            _name.style.borderColor = 'red';
            _name.nextElementSibling.style.color = 'red';
            _name.nextElementSibling.innerHTML = '請填寫正確的姓名';
        }
        if (!email_pattern.test(_email.value)) {
            isPass = false;
            _email.style.borderColor = 'red';
            _email.nextElementSibling.style.color = 'red';
            _email.nextElementSibling.innerHTML = '請填寫正確格式的電子郵箱';
        }
        if (!password_pattern.test(_password.value)) {
            isPass = false;
            _password.style.borderColor = 'red';
            _password.nextElementSibling.style.color = 'red';
            _password.nextElementSibling.innerHTML = '請填寫正確格式的密碼';
        }
        if (!id_number_pattern.test(_idnumber.value)) {
            isPass = false;
            _idnumber.style.borderColor = 'red';
            _idnumber.nextElementSibling.style.color = 'red';
            _idnumber.nextElementSibling.innerHTML = '請填寫正確格式的身分證字號';
        }
        if (!tel_pattern.test(_tel.value)) {
            isPass = false;
            _tel.style.borderColor = 'red';
            _tel.nextElementSibling.style.color = 'red';
            _tel.nextElementSibling.innerHTML = '請填寫正確格式的電話號碼';
        }

        if (isPass) {
            const fd = new FormData(document.member_form);
            fetch('member_edit_api.php', {
                    method: 'POST',
                    body: fd
                })
                .then(r => r.json())
                .then(obj => {
                    console.log(obj);

                    if (obj.success) {
                        infobar.innerHTML = '修改成功';
                        infobar.className = "alert alert-success";
                        setTimeout(() => {
                            location.href = '<?= $_SERVER['HTTP_REFERER'] ?? "member_list.php" ?>';
                        }, 3000)
                    } else {
                        infobar.innerHTML = obj.error || '修改失敗';
                        infobar.className = "alert alert-danger";
                        submitBtn.style.display = 'block';
                    }
                    infobar.style.display = 'block';
                });
        } else {
            submitBtn.style.display = 'block';
        }

    }
</script>