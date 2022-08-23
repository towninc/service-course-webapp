<script>
  function ajaxFanction(obj) {
    //data =$('[name=huga]').val(),
  
    $.ajax({
      url:"/CakeProj/Hoge/ajaxTest",
      type:"POST",
      dataType:"json",
      data=data,
      success=function (data, dataType) {
        //通信成功時の処理
        console.log('Success : ' + data);
    },
    error=function (data, dataType) {
        //通信失敗時の処理
      console.log('Error : ' + data);
    },
    }),
  }
</script>