//User Edit form Open

function getCategoryWiseQa(category_id ,testName) {
    var selectedCategoryName    =   "Of "+$("#category option:selected").text();
    $.ajax({
        type: "GET",
        url: "admin/function/function.php", //data prcessing url/path
        dataType: "html", //return data format
        data: 'search_qa_by_cat_id=' + category_id, //data send to url
        success: function (response) {
            $("#categoryNameShow").html(selectedCategoryName);
            $("#accdr").html(response);
            $('.accordion').simpleAccordion('refresh');
            $('.accordion').simpleAccordionactive('refresh');
            $('.accordion').addClass('simpleAccordionactive');
        }

    });
}

//search code
function searchQuestions(){
    $.ajax({
        type:"POST",
        url:"admin/function/function.php",// data get url/path
        dataType:"html",
        data:$("#any_search_form").serialize(),
        success:function(response){
            $("#accdr").html(response);
        }
    });
}

