// モーダルのイベントリスナ追加
function modalOpen() {
    let createBtn = document.getElementById("createItem");
    createBtn.addEventListener("click", function() {
        let dialog = document.getElementById("dialog");
        // モーダルの表示
        dialog.showModal();
    });
}