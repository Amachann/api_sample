$(function() {
    itemsList();
    // モーダル表示イベントを設定する
    modalOpen();
    // ボタンクリック時のイベントリスナを追加
    // $("#createItemArea").find(".btn").on("click", function() {
    //     createItem(this);
    // });
    // $(".menuList").on("click", function() {
    //     switchingShowContent(this);
    // });
    $("#confirmBtn").on("click", function() {
        createItemFromModal();
    });
});

function createItemFromModal() {
    let data = $("#dialog");
    $.ajax({
        type: "post",
        url: "create",
        headers: {
            "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr("content")
        },
        data: {
            "name": data.find("input[type='text']").val(),
            "price": data.find("input[type='number']").val()
        }
    }).done(function(response) {
        // 登録したデータをログとして表示する
        console.log("ID: " + response.id);
        console.log("商品名: " + response.name);
        console.log("価格: " + response.price + "円");
        // 商品が増えたので商品一覧を更新する
        itemsList();
    }).fail(function(error) {
        console.log(error);
    });
}

// 商品リスト作成
function itemsList() {
    $.ajax({
        type: "get",
        url: "list"
    }).done(function(response) {
        // 初期テーブルの削除
        $("#listTable").children().remove();
        // データをもとにテーブルの作成
        response.forEach(item => {
            let tr = $("<tr>");
            tr.append($("<td>").text(item.id));
            tr.append($("<td>").text(item.name));
            tr.append($("<td>").text(item.price + "円"));
            $("#listTable").append(tr);
        });
    }).fail(function(error) {
        console.error(error);
    });
}

function createItem(element) {
    let data = $(element).parent();
    $.ajax({
        type: "post",
        url: "create",
        // CSRFトークンを渡す
        headers: {
            "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr("content")
        },
        // input要素の内容を渡す
        data: {
            "name": data.find("input[type='text']").val(),
            "price": data.find("input[type='number']").val()
        }
    }).done(function(response) {
        $("#result").removeClass("none");
        $("#resultItem").append($("<p>").text("ID: " + response.id));
        $("#resultItem").append($("<p>").text("商品名: " + response.name));
        $("#resultItem").append($("<p>").text("価格: " + response.price + "円"));
    }).fail(function(error) {
        console.log(error);
    });
}

function switchingShowContent(targetElement) {
    classInit();
    // 表示する画面を取得、表示
    var idName = $(targetElement).attr("id");
    $("#" + idName + "Area").removeClass("none");

    // 商品一覧が表示された場合、商品一覧をテーブルに表示
    if (idName === "itemsList") {
        itemsList();
    }
}

function classInit() {
    // 一覧と新規登録画面をどちらも非表示
    $(".content").addClass("none");
    $("#result").addClass("none");
    // 新規登録の結果表示を削除
    $("#resultItem").children().remove();
}
