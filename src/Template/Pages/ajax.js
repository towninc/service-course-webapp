$(function(){
    // レコードを全件表示する
    function getAllData(){
        $.ajax({
            // 通信先ファイル名
            url: "getajaxdata",
            type: "GET",
            // 通信が成功した時
            success: function(data) {
                // 取得したレコードをeachで順次取り出す
                $.each(data, function(key, value){
                    // #all_show_result内にappendで追記していく
                    $('#all_show_result').append("<tr><td>" + value.id + "</td><td>" + value.section + "</td><td>" + value.lat + "</td></tr>" + value.lng + "</td></tr>");
                });
    
                console.log("通信失敗");
                console.log(data);
            },
    
            // 通信が失敗した時
            error: function(){
                console.log("通信失敗");
                console.log(data);
            }
        });
    }
    
    // 関数を実行
    getAllData();
        return false;
    });