// Owl Carousel Start..................

$(document).ready(function() {
    var one = $("#one");
    var two = $("#two");

    $('#customNextBtn').click(function() {
        one.trigger('next.owl.carousel');
    })
    $('#customPrevBtn').click(function() {
        one.trigger('prev.owl.carousel');
    })
    one.owlCarousel({
        autoplay:true,
        loop:true,
        dot:true,
        autoplayHoverPause:true,
        autoplaySpeed:100,
        margin:10,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:2
            },
            1000:{
                items:4
            }
        }
    });

    two.owlCarousel({
        autoplay:true,
        loop:true,
        dot:true,
        autoplayHoverPause:true,
        autoplaySpeed:100,
        margin:10,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            1000:{
                items:1
            }
        }
    });

});


// Owl Carousel End..................

//Contact send Confirm Btn

$('#ContactSendBtnID').click(function(){

    var ContactName=$('#ContactNameID').val();
    var ContactMobile=$('#ContactMobileID').val();
    var ontactEmail=$('#ContactEmailID').val();
    var ContactMsg=$('#ContactMsgID').val();
    sendContact(ContactName,ContactMobile,ontactEmail,ContactMsg);

});

function sendContact(contact_name,contact_mobile,contact_email,contact_msg){
    if(contact_name.length==0){
        $('#ContactSendBtnID').html("FillUp Name");
        setTimeout(function (){
            $('#ContactSendBtnID').html("পাঠিয়ে দিন");

        },2000)

    }
    else if(contact_mobile.length==0){
        $('#ContactSendBtnID').html("FillUp Mobile Number");

        setTimeout(function (){
            $('#ContactSendBtnID').html("পাঠিয়ে দিন");

        },2000)

    }
    else if(contact_email.length==0){
        $('#ContactSendBtnID').html("FillUp Email");

        setTimeout(function (){
            $('#ContactSendBtnID').html("পাঠিয়ে দিন");

        },2000)

    }
    else if(contact_msg.length==0){
        $('#ContactSendBtnID').html("FillUp Message");

        setTimeout(function (){
            $('#ContactSendBtnID').html("পাঠিয়ে দিন");

        },2000)

    }
    else{
        $('#ContactSendBtnID').html("Sending...");

        axios.post('/contactSend',{

            "contact_name":contact_name ,
            "contact_mobile":contact_mobile ,
            "contact_email":contact_email ,
            "contact_msg":contact_msg ,

        })

            .then(function (response){
                if(response.status==200){
                    if (response.data==1){
                        $('#ContactSendBtnID').html("Send Successful");
                        setTimeout(function (){
                            $('#ContactSendBtnID').html("পাঠিয়ে দিন");

                        },5000)


                    }
                    else{
                        $('#ContactSendBtnID').html("Send Failed!!!");
                        setTimeout(function (){
                            $('#ContactSendBtnID').html("পাঠিয়ে দিন");

                        },5000)

                    }

                }

                else{
                    $('#ContactSendBtnID').html("Send Failed!!!");
                    setTimeout(function (){
                        $('#ContactSendBtnID').html("পাঠিয়ে দিন");

                    },5000)




                }

            }).catch(function (){
            $('#ContactSendBtnID').html("Try Again");
            setTimeout(function (){
                $('#ContactSendBtnID').html("পাঠিয়ে দিন");

            },2000)


        })


    }

}

