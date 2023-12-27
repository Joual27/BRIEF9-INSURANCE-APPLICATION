

$(document).ready(function(){

     
    function fetchCustomers(response){
        $('#searchResult').empty();
        $.each(response, function(index, row){
            $('#searchResult').append('<tr class="odd:bg-white odd:dark:bg-white even:dark:bg-slate-100 text-gray-500 font-medium"><td scope="col" class="px-6 py-3">'+row.customer_id+'</td><td scope="col" class="px-6 py-3">'+row.customer_firstName+'</td><td scope="col" class="px-6 py-3">'+row.customer_familyName+'</td><td scope="col" class="px-6 py-3">'+row.customer_cin+'</td><td scope="col" class="px-6 py-3">'+row.customer_adress+'</td><td scope="col" class="px-6 py-3">'+row.customer_phone+'</td><td scope="col" class="px-6 py-3">'+row. customer_email+'</td><td scope="col" class="px-6 py-3">'+row.insurer_brand+'</td><td scope="col" class="px-6 py-3 flex gap-[10px]"><img src="http://localhost/insurance-app/pics/edit.png" class="w-[30px] h-[30px] edit cursor-pointer"><img src="http://localhost/insurance-app/pics/delete.png" class="w-[30px] h-[30px] delete cursor-pointer" alt=""></td></tr>');

        });
    }


    $.ajax({
        url : "http://localhost/insurance-app/pages/getAllCustomers",
        // type : "GET",
        dataType : 'json',
        success : function(response){
        //   console.log(response);
          fetchCustomers(response);
        },
        error: function(xhr, status, error) {
            console.log("AJAX Error:", status, error);
        }
    })

    function clearForm(){
        $( '#customerForm' ).each(function(){
            this.reset();
        });
    }

    function ValidateNames(){
        let firstName = $("#firstName").val();
        let familyName = $("#familyName").val();
        let regex = /^[a-zA-Z]+$/;
        if(!regex.test(firstName) || !regex.test(familyName)){
            $("#familyNameError").text("Names Can Only Contain Letters !");
            return false;
        } 
        return true;
    }

    function validateEmail(){
        let email = $("#email").val();

        let regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if(!regex.test(email)){
            $("#emailError").text("invalid email format");
            return false;
        }
        return true;
    }
    function validateCin(){
        let cin = $("#cin").val();

        let regex = /^[A-Za-z]{2}\d{1,7}$/;
        
        if(!regex.test(cin)){
            $("#cinError").text("invalid CIN format");
            return false;
        }
        return true;
    }
    function validatePhoneNumber(){
        let number = $("#phone").val();

        let regex = /^\d{10}$/;
        
        if(!regex.test(number)){
            $("#phoneError").text("Invalid Phone Number Format");
            return false;
        }
        return true;
    }
    
    $("#closeBtn").click(function(){
        $("#addCustomerForm").addClass("hidden");
        clearForm();
    })

    $("#showAddCustomerForm").click(function(e){
        e.preventDefault();
        $("#addCustomerForm").removeClass("hidden");
        $("#submit").removeClass("hidden");
        $(".editBtn").addClass("hidden");
    })
    $("#submit").click(function(e){
        $("#error").text("");
        $("#familyNameError").text("");
        $("#cinError").text("");
        $("#emailError").text("");
        $("#phoneError").text("");
        e.preventDefault();
        if($("#firstName").val().trim() === "" || $("#familyName").val().trim() === "" || $("#cin").val().trim() === "" || $("#adress").val().trim() === "" ||$("#phone").val().trim() === "" ||$("#email").val().trim() === "" || $("#insurer").val().trim() === ""){
            $("#error").text("All Field Are Required !");
        }
        else{
            let firstName = $("#firstName").val();
            let familyName = $("#familyName").val();
            let cin = $("#cin").val();
            let adress = $("#adress").val();
            let phone = $("#phone").val();
            let email = $("#email").val(); 
            let insurer = $("#insurer").val();
            let brandName = $("#insurer option:selected").text();
            ValidateNames();
            validateEmail();
            validateCin();
            validatePhoneNumber();
            if(validateCin() && validateEmail() && validatePhoneNumber() && ValidateNames()){
                $.ajax({
                   url : "http://localhost/insurance-app/pages/addCustomer",
                   type : "POST",
                   dataType : "json",
                   data : {
                    'add' : 1,
                    'firstName' : firstName,
                    'familyName' : familyName,
                    'cin' : cin,
                    'adress' : adress,
                    'phone' : phone,
                    'email' : email,
                    'insurer' : insurer,
                    'brandName' : brandName
                   },
                   success : function(response){
                     $("#addCustomerForm").addClass("hidden");
                     $("#searchResult").append(response);
                     clearForm();
                   }
                })
            }
        }
    })


    function fetchInsurancesData(response){
    //    $("#insurer").empty();
       $.each(response,function(index,row){
        $("#insurer").append('<option value="'+row.insurerId+'">'+row.brandName+'</option>');
       })
    }

    $.ajax({
        url : "http://localhost/insurance-app/pages/getAllInsurances",
        dataType : "json",
        success : function(response){7
            // console.log(response);
            fetchInsurancesData(response);
        }
    })


    $("#searchResult").on("click" ,".edit",function(){
        let customer = $(this).closest("tr");
        let customerId = customer.find("td:eq(0)").text().trim();
        let firstName = customer.find("td:eq(1)").text().trim();
        let familyName = customer.find("td:eq(2)").text().trim();
        let cin = customer.find("td:eq(3)").text().trim();
        let adress = customer.find("td:eq(4)").text().trim();
        let phone = customer.find("td:eq(5)").text().trim();
        let email = customer.find("td:eq(6)").text().trim();
        let insurer = customer.find("td:eq(7)").text().trim();
        
    
        $("#addCustomerForm").removeClass("hidden");
        $("#submit").addClass("hidden");
        $(".editCustomerBtn").removeClass("hidden");
        $("#firstName").val(firstName);
        $("#familyName").val(familyName);
        $("#cin").val(cin);
        $("#adress").val(adress);
        $("#phone").val(phone);
        $("#email").val(email); 
        $("#insurer").html(`<option >${insurer}</option>`);
        $("#insurer").prop("disabled", true);

        
        $(".editCustomerBtn").attr("data-id", customerId);    
        // $(".editBtn").attr("data-row", customer);    

    })
    
    $("#customerForm").on("click",".editCustomerBtn",function(e){
        e.preventDefault();
        let id = $(this).attr("data-id");
        // let row = $(this).attr("data-row");
        let familyName = $("#familyName").val();
        let firstName = $("#firstName").val();
        let cin = $("#cin").val();
        let adress = $("#adress").val();
        let phone = $("#phone").val();
        let email = $("#email").val();


        
        $.ajax({
            url : "http://localhost/insurance-app/pages/editCustomer",
            type : 'POST',
            dataType : "json",
            data : {
                'edit' : 1,
                'id' : id ,
                'familyName' : familyName ,
                'firstName' : firstName ,
                'cin' : cin ,
                'adress': adress ,
                'phone' : phone ,
                'email' : email
            },
            success : function(response){
                $("#addCustomerForm").addClass("hidden");
                fetchCustomers(response);
                clearForm();
                
             },
            error: function (xhr, status, error) {
                console.error("AJAX Error:", status, error);
            }
        })
    })


    $(document).on("click", ".delete" , function(){
        customer = $(this).closest("tr");
        id = customer.find("td:eq(0)").text().trim();
        // console.log(id);

        $.ajax({
            url : "http://localhost/insurance-app/pages/deleteCustomer",
            type : "POST",
            dataType : "json",
            data : {
                "delete" : 1,
                "id" : id
            },
            success : function(response){
               fetchCustomers(response);
            }
        })
    })

   




    $("#searchCustomers").keyup(function(){
        var searchValue = $(this).val();
        $.ajax({
            url : "http://localhost/insurance-app/pages/search",
            type : "POST",
            data : {search : searchValue},
            dataType : 'json',
            success : function(response){
              fetchCustomers(response);
            }
        })
    })})

