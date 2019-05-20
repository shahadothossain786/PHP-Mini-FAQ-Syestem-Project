//ajax call through ajax shorthand method
function userOperation(op_type) {
    var formData = "";
    if (op_type == 'add') {
        formData = $("#user_add_form").serialize();
        //error variable
        var error_section = "add_error_section";
        var error_massege = "add_error_message_show";
        //success variable
        var success_section = "add_success_section";
        var success_massege = "add_success_message_show";
    }
    if (op_type == 'update') {
        formData = $("#user_edit_form").serialize();
        //error variable
        var error_section = "edit_error_section";
        var error_massege = "edit_error_message_show";
        //success variable
        var success_section = "edit_success_section";
        var success_massege = "edit_success_message_show";
    }


    $.ajax({
        type: "POST", //data passing method
        dataType: "json", //return data format
        data: formData, //data send to url
        url: "function/function.php", //data prcessing url/path
        success: function (response) {
            if (response.status === 'error') {
                $("#" + success_section).hide();
                $("#" + error_section).show();
                $("#" + error_massege).html(response.message);
            } else {
                $("#" + error_section).hide();
                $("#" + success_section).show();
                $("#" + success_massege).html(response.message);
                if (op_type == 'add') {
                    setTimeout(function () {
                        $("#userAddModal").modal('hide');
                        location.reload();
                    }, 2000);
                }

                if (op_type == 'update') {
                    setTimeout(function () {
                        $("#userEditModal").modal('hide');
                        location.reload();
                    }, 2000);
                }
            }
        }
    });
}

//User Edit form Open

function showUserEditForm(user_id) {
    $.ajax({
        type: "GET",
        url: "function/function.php", //data prcessing url/path
        dataType: "json", //return data format
        data: 'user_edit_id=' + user_id, //data send to url
        success: function (response) {
            $("#userEditModal").modal('show');
            $("#user_edit_id").val(response.id);
            $("#edit_full_name").val(response.full_name);
            $("#edit_email").val(response.email);
            $("#edit_type").val(response.type);
            if (response.is_active == 1) {
                $("#status_1").prop("checked", true);
            } else {
                $("#status_2").prop("checked", true);
            }

        }

    });
}

//user delete from open
function showDeleteConfirm(id, table) {
    $("#deleteconfirmModal").modal('show');
    $("#delete_id").val(id);
    $("#table_name").val(table);
}
function showDeleteAllConfirm(tableName) {
    
    $("#deleteallconfirmModal").modal('show');
    $("#table_name_all").val(tableName);
    
}
//executeDeleteOperation

function executeDeleteOperation() {
    //error variable
    var error_section = "delete_error_section";
    var error_massege = "delete_error_message_show";
    //success variable
    var success_section = "delete_success_section";
    var success_massege = "delete_success_message_show";
    $.ajax({
        type: "POST",
        url: "function/function.php", //data prcessing url/path
        dataType: "json", //return data format
        data: $("#delete_form").serialize(), //data send to url
        success: function (response) {
            if (response.status === 'error') {
                $("#" + success_section).hide();
                $("#" + error_section).show();
                $("#" + error_massege).html(response.message);
            } else {
                $("#" + error_section).hide();
                $("#" + success_section).show();
                $("#" + success_massege).html(response.message);
                setTimeout(function () {
                    $("#deleteconfirmModal").modal('hide');
                    location.reload();
                }, 2000);
            }

        }

    });
}

//all delete operation

function executeDeleteAllOperation() {
    //error variable
    var error_section = "delete_all_error_section";
    var error_massege = "delete_all_error_message_show";
    //success variable
    var success_section = "delete_all_success_section";
    var success_massege = "delete_all_success_message_show";
    $.ajax({
        type: "POST",
        url: "function/function.php", //data prcessing url/path
        dataType: "json", //return data format
        data: $("#delete_all_form").serialize(), //data send to url
        success: function (response) {
            if (response.status === 'error') {
                $("#" + success_section).hide();
                $("#" + error_section).show();
                $("#" + error_massege).html(response.message);
            } else {
                $("#" + error_section).hide();
                $("#" + success_section).show();
                $("#" + success_massege).html(response.message);
                setTimeout(function () {
                    $("#deleteallconfirmModal").modal('hide');
                    location.reload();
                }, 2000);
            }

        }

    });
}

//users details form open
function showUserDetails(user_id) {
    $.ajax({
        type: "GET",
        url: "function/function.php", //data prcessing url/path
        dataType: "json", //return data format
        data: 'user_details_id=' + user_id, //data send to url
        success: function (response) {
            $("#userDetailsModal").modal('show');
            $("#details_full_name").html(response.full_name);
            $("#details_email").html(response.email);
            $("#details_pwd").html(response.password);
            if (response.is_active == 1) {
                $("#details_status").html('Active');
            } else {
                $("#details_status").html('Inactive');
            }
            if (response.type == 1) {
                $("#deatails_type").html('Admin');
            } else {
                $("#deatails_type").html('User');
            }
        }

    });
}

//ajax call through ajax shorthand method for category add
function categoryOperation(op_type) {
    var formData = "";
    if (op_type == 'add') {
        formData = $("#category_add_form").serialize();
        //error variable
        var error_section = "add_error_section";
        var error_massege = "add_error_message_show";
        //success variable
        var success_section = "add_success_section";
        var success_massege = "add_success_message_show";
    }
    if (op_type == 'update') {
        formData = $("#category_edit_form").serialize();
        //error variable
        var error_section = "edit_error_section";
        var error_massege = "edit_error_message_show";
        //success variable
        var success_section = "edit_success_section";
        var success_massege = "edit_success_message_show";
    }


    $.ajax({
        type: "POST", //data passing method
        dataType: "json", //return data format
        data: formData, //data send to url
        url: "function/function.php", //data prcessing url/path
        success: function (response) {
            if (response.status === 'error') {
                $("#" + success_section).hide();
                $("#" + error_section).show();
                $("#" + error_massege).html(response.message);
            } else {
                $("#" + error_section).hide();
                $("#" + success_section).show();
                $("#" + success_massege).html(response.message);
                if (op_type == 'add') {
                    setTimeout(function () {
                        $("#CategoryAddModal").modal('hide');
                        location.reload();
                    }, 2000);
                }

                if (op_type == 'update') {
                    setTimeout(function () {
                        $("#categoryEditModal").modal('hide');
                        location.reload();
                    }, 2000);
                }
            }
        }
    });
}

//Category Edit form Open

function showCategoryEditForm(cat_id) {
    $.ajax({
        type: "GET",
        url: "function/function.php", //data prcessing url/path
        dataType: "json", //return data format
        data: 'cat_edit_id=' + cat_id, //data send to url
        success: function (response) {
            $("#categoryEditModal").modal('show');
            $("#category_edit_id").val(response.id);
            $("#edit_name").val(response.name);
        }

    });
}
//category details form open
function showCategoryDetails(cat_id) {
    $.ajax({
        type: "GET",
        url: "function/function.php", //data prcessing url/path
        dataType: "json", //return data format
        data: 'cat_details_id=' + cat_id, //data send to url
        success: function (response) {
            $("#categoryDetailsModal").modal('show');
            $("#Category_details_full_name").html(response.name);
        }

    });
}
//ajax call through ajax shorthand method
function qaOperation(op_type) {
    var formData = "";
    if (op_type == 'add') {
        formData = $("#qa_add_form").serialize();
        //error variable
        var error_section = "add_error_section";
        var error_massege = "add_error_message_show";
        //success variable
        var success_section = "add_success_section";
        var success_massege = "add_success_message_show";
    }
    if (op_type == 'update') {
        formData = $("#qa_edit_form").serialize();
        //error variable
        var error_section = "edit_error_section";
        var error_massege = "edit_error_message_show";
        //success variable
        var success_section = "edit_success_section";
        var success_massege = "edit_success_message_show";
    }


    $.ajax({
        type: "POST", //data passing method
        dataType: "json", //return data format
        data: formData, //data send to url
        url: "function/function.php", //data prcessing url/path
        success: function (response) {
            if (response.status === 'error') {
                $("#" + success_section).hide();
                $("#" + error_section).show();
                $("#" + error_massege).html(response.message);
            } else {
                $("#" + error_section).hide();
                $("#" + success_section).show();
                $("#" + success_massege).html(response.message);
                if (op_type == 'add') {
                    setTimeout(function () {
                        $("#qaAddModal").modal('hide');
                        location.reload();
                    }, 2000);
                }

                if (op_type == 'update') {
                    setTimeout(function () {
                        $("#qaEditModal").modal('hide');
                        location.reload();
                    }, 2000);
                }
            }
        }
    });
}
//Category Edit form Open

function showQaEditForm(qa_id) {
    $.ajax({
        type: "GET",
        url: "function/function.php", //data prcessing url/path
        dataType: "json", //return data format
        data: 'qa_edit_id=' + qa_id, //data send to url
        success: function (response) {
            $("#qaEditModal").modal('show');
            $("#qa_edit_id").val(qa_id);
            $("#edit_category").val(response.category_id);
            $("#edit_questions").val(response.questions);
            $("#edit_answers").val(response.answers);
        }

    });
}

//QA details form open
function showQADetails(qa_id) {
    $.ajax({
        type: "GET",
        url: "function/function.php", //data prcessing url/path
        dataType: "json", //return data format
        data: 'qa_details_id=' + qa_id, //data send to url
        success: function (response) {
            $("#qaDetailsModal").modal('show');
            $("#details_category_id").html(response.category_name);
            $("#details_questions").html(response.questions);
            $("#details_answers").html(response.answers);
        }

    });
}

//ajax call through ajax shorthand method
function productsOperation(op_type) {
    var formData = "";
    if (op_type == 'add') {
        formData = $("#products_add_form").serialize();
        //error variable
        var error_section = "add_error_section";
        var error_massege = "add_error_message_show";
        //success variable
        var success_section = "add_success_section";
        var success_massege = "add_success_message_show";
    }
    if (op_type == 'update') {
        formData = $("#user_edit_form").serialize();
        //error variable
        var error_section = "edit_error_section";
        var error_massege = "edit_error_message_show";
        //success variable
        var success_section = "edit_success_section";
        var success_massege = "edit_success_message_show";
    }


    $.ajax({
        type: "POST", //data passing method
        dataType: "json", //return data format
        data: formData, //data send to url
        url: "function/function.php", //data prcessing url/path
        success: function (response) {
            if (response.status === 'error') {
                $("#" + success_section).hide();
                $("#" + error_section).show();
                $("#" + error_massege).html(response.message);
            } else {
                $("#" + error_section).hide();
                $("#" + success_section).show();
                $("#" + success_massege).html(response.message);
                if (op_type == 'add') {
                    setTimeout(function () {
                        $("#productsAddModal").modal('hide');
                        location.reload();
                    }, 2000);
                }

                if (op_type == 'update') {
                    setTimeout(function () {
                        $("#userEditModal").modal('hide');
                        location.reload();
                    }, 2000);
                }
            }
        }
    });
}