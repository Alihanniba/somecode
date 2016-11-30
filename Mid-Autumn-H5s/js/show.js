function GetQueryString(name)
        {
             var reg = new RegExp("(^|&)"+ name +"=([^&]*)(&|$)");
             var r = window.location.search.substr(1).match(reg);
             if(r!=null)return  unescape(r[2]); return null;
        }
       var id =  GetQueryString("id");
       $.ajax({
                    url: './show.php',
                    type: 'post',
                    dataType: 'json',
                    data: {
                        'id' :id ,
                    },
                })
                .done(function(data) {
                    console.log(data);
                    $("#img_box").attr("src",data.cardInfo.images);
                    $("#name").html(data.cardInfo.recipient);
                    $("#word").html(data.cardInfo.content);
                    $("#me").html("---"+data.cardInfo.sender);
                   
                    document.title = "亲爱的"+data.cardInfo.recipient+"同学给"+data.cardInfo.sender+"发了贺卡";
                })
                .fail(function(data) {
                    console.log("error");
                })
                .always(function(data) {
                    console.log("complete");
                });