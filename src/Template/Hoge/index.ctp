<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script>
        function ajaxFunction(obj) {
            var data = {
                data: $('[name=huga]').val()
            };
            $.ajax({
                url: "http://linkdata.org/api/1/rdf1s544i/100Cherry_List/datapackage.json",
                type: "POST",
                dataType: "json",
                data: data,
                success: function (data, dataType) {
                    //通信成功時の処理
                    console.log('Success : ' + data);
                },
                error: function (data, dataType) {
                //通信失敗時の処理
                    console.log('Error : ' + data);
                }
            });
        }
        ajaxFunction();
    </script>
</body>
</html>