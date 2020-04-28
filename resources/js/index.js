document.addEventListener("DOMContentLoaded", function () {

    function addUser() {
        let form = document.getElementById('save_user')
        form.addEventListener('submit', function (e) {
            e.preventDefault();

            let data = new FormData(form)
            axios.post(form.action, data)
                .then(function () {
                    location.reload()
                })
                .catch(function (error) {
                    showError(error)
                })

        })
    }

    function addPhone() {
        let btn = document.getElementById('add_phone');
        btn.addEventListener('click', function (e) {
            e.preventDefault();
            let addRes = document.getElementById('add_result');
            addRes.innerHTML += `<div class="form-group"><input type="number" maxlength="10" name="phone[]" class="form-control added_phone" title="Phone"><button class="btn del_new_number"><i class="fas fa-minus-circle"></i></button></div>`;
            delNewNumber();
        })
    }

    addPhone();
    addUser();

    function deleteUser() {
        let btn = document.getElementsByClassName('dell_btn')
        for (let i = 0; i < btn.length; i++) {
            btn[i].addEventListener('click', function () {
                let current = this;
                openConfirmDialog('Do you really wants to delete user?');
                let answer = answerFromConfirm();
                answer.then(() => {
                    axios.get(this.dataset.action)
                        .then(function (resp) {
                            if (resp.data === 'ok') {
                                current.parentNode.parentNode.remove();
                            }
                        })
                        .catch(function (error) {
                            console.log(error);
                        })
                })
                    .catch(err => {
                        console.log(err)
                    })
            })
        }
    }


    function openConfirmDialog(message) {
        document.getElementById('alert_text').innerText = message;
        $('#alertModal').modal('show');
    }

    function answerFromConfirm() {
        return new Promise((resolve, reject) => {
            let tr = document.querySelector('.true_button');
            tr.addEventListener('click', function (e) {
                e.preventDefault();
                resolve(true);
                $('#alertModal').modal('hide');
            })
            let fl = document.querySelector('.false_button');
            fl.addEventListener('click', function (e) {
                e.preventDefault();
                reject(false)
                $('#alertModal').modal('hide');
            })
        })
    }


    function editUserInfo() {
        let btn = document.getElementsByClassName('edit_btn');
        for (let i = 0; i < btn.length; i++) {
            btn[i].addEventListener('click', function (e) {
                e.preventDefault();
                axios.get(this.dataset.action)
                    .then(function (resp) {
                        $('#for_results').html(resp.data)
                        $('#editModal').modal('show')
                        saveChanges();
                        addNewNumber();
                        delIssetNumber();
                    })
            })
        }
    }

    function saveChanges() {
        let btn = document.getElementById('save_changes')
        btn.addEventListener('click', function () {
            let form = document.getElementById('update_form');
            let data = new FormData(form);
            axios.post(form.action, data)
                .then(function (resp) {
                    if (resp.data === 'ok') {
                        location.reload();
                    }
                })
                .catch(function (error) {
                    showError(error)
                })
        })
    }
    function showError(error){
        let ul = document.getElementById('errors');
        let btn = document.getElementById('close_modal');
        console.log(btn)
        for (let key in (error.response.data.errors)) {
            let li = document.createElement('li');
            li.innerText = error.response.data.errors[key];
            ul.appendChild(li);
        }
        $('#success_modal').modal("show");
        btn.addEventListener('click', function () {
            $('#success_modal').modal("hide")
            ul.innerHTML = '';
        })
    }

    function addNewNumber() {
        let btn = document.getElementById('add_new_number');
        btn.addEventListener('click', function (e) {
            e.preventDefault();
            let addRes = document.getElementById('add_number');
            addRes.innerHTML += `<div class="input-group"><input type="text" name="new_phone[]" class="form-control added_phone"><button class="btn del_new_number"><i class="fas fa-minus-circle"></i></button></div>`;
            delNewNumber();
        })
    }

    function delNewNumber() {
        let btn = document.getElementsByClassName('del_new_number');
        for (let i = 0; i < btn.length; i++) {
            btn[i].addEventListener('click', function (e) {
                e.preventDefault();
                this.parentNode.remove();
            })
        }

    }

    function delIssetNumber() {
        let btn = document.getElementsByClassName('del_number');
        for (let i = 0; i < btn.length; i++) {
            btn[i].addEventListener('click', function (e) {
                e.preventDefault();
                let number = this;
                axios.post(this.dataset.action, {
                    phone_id: this.dataset.id,
                })
                    .then(function (resp) {
                        if (resp.data === 'ok') {
                            number.parentNode.remove();
                        }
                    })
                    .catch(function (err) {
                        console.log(err.data)
                    })

            })
        }
    }

    editUserInfo();
    deleteUser();
})
