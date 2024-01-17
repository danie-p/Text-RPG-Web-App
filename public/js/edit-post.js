document.addEventListener('DOMContentLoaded', function () {
    const btnsEdit = document.querySelectorAll('[id^="btn-edit-"]');
    // kazdy btn-edit ma k sebe pripojenu akciu na zobrazenie show-on-edit prvkov a skrytie hide-on-edit prvkov
    btnsEdit.forEach(function (btn) {
        var postId = btn.getAttribute('data-postid');
        const showOnEdit = document.getElementById('show-on-edit-' + postId);
        const hideOnEdit = document.getElementById('hide-on-edit-' + postId);

        btn.addEventListener('click', function () {
            showOnEdit.style.visibility = 'visible';
            showOnEdit.style.height = 'auto';
            hideOnEdit.style.visibility = 'hidden';
            hideOnEdit.style.height = 0;
        });

        var editForm = document.getElementById('edit-form-' + postId);

        if (editForm) {
            editForm.addEventListener('submit', function (event) {
                // default akcia k eventu nenastane (submit the form)
                event.preventDefault();

                // uchovat aktualne data vo form
                var formData = new FormData(editForm);

                fetch(editForm.getAttribute('action'), {
                    method: 'POST',
                    body: formData
                }).then(response => {
                    if (!response.ok) {
                        throw new Error('Response is not OK!');
                    }
                    return response.json();
                }).then(data => {
                    var postBody = document.getElementById('post-body-' + postId);
                    var postCharName = document.getElementById('post-char-name-' + postId);
                    var postCharSurname = document.getElementById('post-char-surname-' + postId);
                    var postUpdateTime = document.getElementById('post-update-time-' + postId);
                    var postUserName = document.getElementById('post-user-name-' + postId);
                    var postQuest = document.getElementById('post-quest-' + postId);
                    var iconQuest = document.getElementById('icon-quest-' + postId);

                    postBody.textContent = data.editBody;
                    postCharName.textContent = data.editCharName;
                    postCharSurname.textContent = data.editCharSurname;
                    postUpdateTime.textContent = data.editUpdateTime;   // editUpdateTime by mal poslat uz naformatovane data
                    postUserName.textContent = data.editUserName;
                    if (data.editQuest != null) {
                        postQuest.textContent = 'Quest ' + data.editQuest;
                        iconQuest.style.display = 'block';
                    } else {
                        postQuest.textContent = "";
                        iconQuest.style.display = 'none';
                    }

                    var containerPosts = document.getElementById('container-posts');
                    //containerPosts.prepend(hideOnEdit);

                }).catch(error => {
                    console.error('Fetch error:', error);
                });
            });
        }
    });

    const btnsEditSave = document.querySelectorAll('[id^="btn-edit-save-"]');
    // kazdy btn-edit-save ma k sebe pripojenu akciu na zobrazenie hide-on-edit prvkov a skrytie show-on-edit prvkov
    btnsEditSave.forEach(function (btn) {
        btn.addEventListener('click', function () {
            var postId = btn.getAttribute('data-postid');
            const showOnEdit = document.getElementById('show-on-edit-' + postId);
            const hideOnEdit = document.getElementById('hide-on-edit-' + postId);
            hideOnEdit.style.visibility = 'visible';
            hideOnEdit.style.height = 'auto';
            showOnEdit.style.visibility = 'hidden';
            showOnEdit.style.height = 0;
        });
    });
});
