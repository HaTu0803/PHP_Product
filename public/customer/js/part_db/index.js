function showModalYNC(title = '', content = '') {
    if (title == '' && content == '') {
        content =
            'いずれかのボタンを選択してください。<br><br>' +
            '【はい】フォームの保存<br>' +
            '【いいえ】フォームの投函';
    }
    $('#mdal_ync_title').empty().append(title);
    $('#mdal_ync_content').empty().append(content);
    $('#show_mdal_ync').click();
}

function showModal(text) {
    showModalYNC();
    $('#txt_ync').val(text);
}

// btn-200
function showModalYNCItem6() {
    let title = '商品情報登録CSV出力';
    let content =
        '商品コード設定表より、部品DB登録用CSVを作成します。<br><br>' +
        '【はい】ブック単位CSV（推奨）<br>' +
        '【いいえ】シート単位CSV';

    showModalYNC(title, content);
    $('#txt_ync').val('商品コードCSV');
}

function showModalHelp(title, content) {
    $('#mdal_help_title').empty().append(title);
    $('#mdal_help_content').empty().append(content);
    $('#show_mdal_popup').click();
}

function showModalHelpItem7() {
    let title = 'HELP';
    let content =
        '左側の機能ボタンをクリックすると、部品番号を一括で取得するための<br>' +
        'フォーム取得と、作成したフォームを投函するためのサブメニューが<br>' +
        '利用できます。<br><br>' +
        '投函に際しては、事前にサブメニューで所定のチェックを行いますが、<br>' +
        'フォームの記入例を参照の上ご利用ください。';

    showModalHelp(title, content);
}

function showModalHelpItem12() {
    let title = 'HELP';
    let content =
        '左側の機能ボタンをクリックすると、部品番号を一括で登録するための<br>' +
        'フォーム取得と、作成したフォームを投函するためのサブメニューが<br>' +
        '利用できます。<br><br>' +
        '未承認部品番号に対してのみ処理可能です。承認済み、設変中、承認依頼中はNGです。<br><br>' +
        '投函に際しては、事前にサブメニューで所定のチェックを行いますが、<br>' +
        'フォームの記入例を参照の上ご利用ください。';

    showModalHelp(title, content);
}

function showModalHelpItem13() {
    let title = 'HELP';
    let content =
        '左側の機能ボタンをクリックすると、構成情報を一括で登録するための<br>' +
        'フォーム取得と、作成したフォームを投函するためのサブメニューが<br>' +
        '利用できます。<br><br>' +
        '新規の商品コードに対してのみ処理可能です。' +
        '承認済み、設変中、承認依頼中はNGです。<br><br>' +
        '投函に際しては、事前にサブメニューで所定のチェックを行いますが、<br>' +
        'フォームの記入例を参照の上ご利用ください。';

    showModalHelp(title, content);
}

function showModalHelpItem20() {
    let title = '';
    let content =
        '「帳票再作成」は部品情報DBで部品表を承認状態のまま、<br>' +
        '以下①～③を追加反映出来る”管理者のみ操作可能な機能”です。<br><br>' +
        '①図面番号を追加反映したい場合。<br>' +
        '※部品表(承認前)には図面承認した翌日以降でないと部品表に図面番号が反映しません。<br><br>' +
        '②購買番号を追加反映したい場合。<br><br>' +
        '③英訳を追加反映したい場合。';

    showModalHelp(title, content);
}

function formFG(filename, url) {
    $.ajax({
        url: url,
        type: "post",
        data: {
            _token: $(`[name="csrf-token"]`).attr("content"),
            filename
        },
        beforeSend: () => {
            $("#loading_page").css({
                "display": "flex"
            });
        },
        success: (data) => {
            $("#loading_page").hide();
            $("#copy_file").prop("disabled", false);
            if (data.status !== undefined) {
                data.status && Swal.fire({
                    text: `${data.data.file_name}`,
                    icon: 'success',
                    showCloseButton: false,
                    showCancelButton: false,
                    cancelButtonText: 'キャンセル',
                    confirmButtonText: 'OK',
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.open(data.data.spreadsheet_link);
                        Swal.DismissReason.timer;
                    }
                });
                !data.status && errorHandler();
            } else {
                errorHandler();
            }
        },
        error: (data) => {
            errorHandler();
            $("#loading_page").hide();
        }
    });
}

const errorHandler = (
    text = "エラーが発生しました。再度お試しください。") => {
    Swal.fire({
        text: text,
        icon: 'error',
        confirmButtonText: 'OK',
    });
}
