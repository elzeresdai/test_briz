document.addEventListener("DOMContentLoaded", function () {

    function editUserInfo() {
        let btn = document.getElementsByClassName('edit_btn');
        for (let i = 0; i < btn.length; i++) {
        btn[i].addEventListener('click', function(e){
            e.preventDefault();
            axios.get(this.dataset.action)
                .then(function (resp) {
                    $('#editModal').modal('show')
                    $('#for_results').html(resp.data)
                    saveChanges();
                })
        })
        }
    }

    function saveChanges(){
        let btn = document.getElementById('save_changes')
        btn.addEventListener('click', function(){
            let form = document.getElementById('update_form');
            let data = new FormData(form);
            axios.post(form.action, data)
                .then(function (resp) {
                    console.log(resp.data);
                })
                .catch(function (err) {
                    console.log(err)
                })
        })
    }

    editUserInfo();
});
