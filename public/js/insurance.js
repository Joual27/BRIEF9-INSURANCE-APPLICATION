$(document).ready(function(){
    function fetchInsurances(response){
        $("#insurances").empty();
        $.each(response,function(index,row){
            $("#insurances").append('<tr class="odd:bg-white odd:dark:bg-white even:dark:bg-slate-100 text-gray-500 font-medium"><td scope="col" class="px-6 py-3">'+row.insurerId+'</td><td scope="col" class="px-6 py-3">'+row.brandName+'</td><td scope="col" class="px-6 py-3">'+row.phone+'</td><td scope="col" class="px-6 py-3">'+row.email+'</td><td scope="col" class="px-6 py-3 flex gap-[10px]"><img src="http://localhost/insurance-app/pics/edit.png" class="w-[30px] h-[30px] edit cursor-pointer"><img src="http://localhost/insurance-app/pics/delete.png" class="w-[30px] h-[30px] deleteInsurance cursor-pointer" alt=""></td></tr>');
        })
    }

    function clearInsuranceForm(){
        $("#insuranceForm").each(function(){
            this.reset();
            $("#insuranceError").text("");
        })
    }

    $("#showInsuranceForm").click(function(){
        clearInsuranceForm();
        $("#addInsuranceForm").removeClass("hidden");
       
    })

    $("#closeBtn").on("click",function(){
        $("#addInsuranceForm").addClass("hidden");
    })

    $.ajax({
        url : "http://localhost/insurance-app/pages/getAllInsurances",
        dataType : "json",
        success : function(response){
            fetchInsurances(response);
        }
    })

    $("#addInsuranceBtn").on("click",function(e){
        e.preventDefault();
        
        brandName = $("#brand").val();
        phone = $("#phone").val();
        email = $("#email").val();

        if( brandName.trim() === "" || phone.trim() === "" || email.trim() === ""){
           $("#insuranceError").text("All Fields Are Required !");
        }
        else{
            $.ajax({
                url : "http://localhost/insurance-app/pages/addInsurance",
                type : "POST",
                dataType : "json",
                data : {
                   'add' : 1,
                   'brandName' : brandName,
                   'phone' : phone ,
                   'email' : email
                },
                success : function(response){
                   $("#addInsuranceForm").addClass("hidden");
                   fetchInsurances(response);
                }
            })
        }
    })

    var id ;

    $("#insurances").on("click" , ".edit" , function(){
        $("#insuranceError").text("");
        $("#addInsuranceForm").removeClass("hidden");
        $("#addInsuranceBtn").addClass("hidden");
        $("#updateInsuranceBtn").removeClass("hidden");

        let row = $(this).closest("tr");
        id = row.find("td:eq(0)").text().trim();
        let brandName = row.find("td:eq(1)").text().trim();
        let phone = row.find("td:eq(2)").text().trim();
        let email = row.find("td:eq(3)").text().trim();

        $("#brand").val(brandName);
        $("#phone").val(phone);
        $("#email").val(email);

    })

    $("#insuranceForm").on("click" , "#updateInsuranceBtn" , function(){
        brandName = $("#brand").val();
        phone = $("#phone").val();
        email = $("#email").val();

        if(brandName.trim() === "" || phone.trim() === "" || email.trim() === ""){
           $("#insuranceError").text("All Fields Are Required !");
        }
        else{
            $.ajax({
                url : "http://localhost/insurance-app/pages/updateInsurance",
                type : "POST",
                dataType : "json",
                data : {
                    "edit" : 1,
                    'id' : id,
                    'brandName' : brandName,
                    'phone' : phone,
                    'email' : email
                },
                success : function(response){
                    $("#addInsuranceForm").addClass("hidden");
                    fetchInsurances(response);
                }

            })
        }
       
    })

    $("#insurances").on("click" , ".deleteInsurance" , function(){
        
        id = $(this).closest("tr").find("td:eq(0)").text().trim();
        
        $.ajax({
            url : "http://localhost/insurance-app/pages/deleteInsurance",
            type : "POST",
            dataType : "json",
            data : {
                'delete' : 1,
                'id' : id
            },
            success : function(response){
                fetchInsurances(response);
            }
        })

    })

    function fetchArticles(response){
        $("#articles").empty();
        $.each(response,function(index,row){
            $("#articles").append('<tr class="odd:bg-white odd:dark:bg-white even:dark:bg-slate-100 text-gray-500 font-medium"><td scope="col" class="px-6 py-3">'+row.articleId+'</td><td scope="col" class="px-6 py-3">'+row.title+'</td><td scope="col" class="px-6 py-3">'+row.content+'</td><td scope="col" class="px-6 py-3">'+row.firstName+" " +row.familyName+'</td><td scope="col" class="px-6 py-3">'+row.brandName+'</td><td scope="col" class="px-6 py-3 flex gap-[10px]"><img src="http://localhost/insurance-app/pics/edit.png" class="w-[30px] h-[30px] editArticle cursor-pointer"><img src="http://localhost/insurance-app/pics/delete.png" class="w-[30px] h-[30px] deleteArticle cursor-pointer" alt=""></td></tr>');
        })
    }


    $("#showArticleForm").click(function(){
        $("#articleError").text("");
        $("#addArticleForm").removeClass("hidden");
    })

    $("#closeBtn").on("click",function(){
        $("#addArticleForm").addClass("hidden");
        clearArticlesForm();
    })

    $.ajax({
        url : "http://localhost/insurance-app/pages/getAllArticles",
        type : "GET",
        dataType : "json",
        success : function(response){
           fetchArticles(response)
        }
    })


    function fetchCustomerItems(response){
        $.each(response , function(index,row){
            $("#holder").append("<option value='"+row.customer_id +"'> "+row.customer_firstName +" "+ row.customer_familyName+"</option>");
        })
    }

    $.ajax({
        url : "http://localhost/insurance-app/pages/getAllCustomers",
        dataType : "json",
        success : function(response){
            // console.log(response);
            fetchCustomerItems(response);
        }

    })
    function fetchInsurerItems(response){
        $.each(response , function(index,row){
            $("#insurance").append("<option value='"+row.insurerId +"'> "+row.brandName +"</option>");
        })
    }

    function clearArticlesForm(){
            $("#articleForm").each(function(){
                this.reset();
                $("#articleError").text("");
            })
     
    }

    $.ajax({
        url : "http://localhost/insurance-app/pages/getAllInsurances",
        dataType : "json",
        success : function(response){
            // console.log(response);
            fetchInsurerItems(response);
        }

    })

    $("#addArticleBtn").on("click",function(e){
        e.preventDefault();
        let title = $("#title").val();
        let content = $("#content").val();
        let holder = $("#holder").val();
        let insurance = $("#insurance").val();

        if( title.trim() === "" || content.trim() === "" || holder.trim() === "" || insurance.trim() === ""){
            $("#articleError").text("ALL FIELDS ARE REQUIRED !");
        }
        else{
            $.ajax({
                url : "http://localhost/insurance-app/pages/addArticle",
                type : "POST",
                dataType : "json",
                data : {
                    'add' : 1,
                    'title' : title,
                    'content' : content,
                    'customerId' : holder,
                    'insurerId' : insurance 
                },
                success : function(response){
                    $("#addArticleForm").addClass("hidden");
                    fetchArticles(response);
                    clearArticlesForm();
                }

            })
        }
    })


    var id;

    $("#articles").on("click" , ".editArticle" ,function(){
        
        $("#addArticleBtn").addClass("hidden");
        $("#updateArticleBtn").removeClass("hidden");


        $("#addArticleForm").removeClass("hidden");

        let row = $(this).closest("tr");
        id = row.find("td:eq(0)").text().trim(); 
        let title = row.find("td:eq(1)").text().trim(); 
        let content = row.find("td:eq(2)").text().trim(); 
        let holder = row.find("td:eq(3)").text().trim(); 
        let insurance = row.find("td:eq(4)").text().trim(); 

        $("#title").val(title);
        $("#content").val(content);

        $("#holder").empty();
        $("#holder").append('<option>'+ holder+'</option>');
        $("#holder").prop("disabled",true);
        $("#insurance").empty();
        $("#insurance").append('<option>'+ insurance+'</option>');
        $("#insurance").prop("disabled",true);

    })

    $("#articleForm").on("click", "#updateArticleBtn" , function(){
        
        let title = $("#title").val();
        let content = $("#content").val();
        
        if( title.trim() === "" || content.trim() === ""){
            $("#articleError").text("ALL FIELDS ARE REQUIRED !");
        }
        else{
            $.ajax({
                url : "http://localhost/insurance-app/pages/updateArticle",
                type : "POST" ,
                dataType : "json",
                data : {
                    'edit' : 1,
                    'id' : id,
                    'title' : title,
                    'content' : content
                },
                success : function(response){
                    $("#addArticleForm").addClass("hidden");
                    fetchArticles(response);
                    clearArticlesForm();
                }
            })
        }

    })
    $("#articles").on("click" , ".deleteArticle" ,function(){

        let articleId = $(this).closest("tr").find("td:eq(0)").text().trim();

        $.ajax({
            url : "http://localhost/insurance-app/pages/deleteArticle",
            type : 'POST',
            dataType : "json",
            data : {
                'delete' : 1,
                'id' : articleId
            },
            success : function(response){
                fetchArticles(response);
            }

        })
    })


}) 