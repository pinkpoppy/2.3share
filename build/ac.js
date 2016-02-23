$(function(){
    var ip = returnCitySN['cip']
    var url = "http://www.pai9.com.cn/pjms/fstclick.php"
    var downLink = "http://a.app.qq.com/o/simple.jsp?pkgname=com.snapwine.snapwine"
    var type = "v2_3duobao"
    var pageViewType = "v2.3duobao_view"
    utilities.methods.ajax('2016春节喝红酒统计页面浏览次数',
                                'GET',
                                {type:pageViewType},
                                url,
                                function(response){
                                  if (response==1) {
                                    console.log("浏览次数提交成功")
                                  } else {
                                    console.log("浏览次数提交失败")
                                  }
                                })

    $('#down').click(function(event) {
      var deviceType = utilities.methods.deviceInfo()
      var args = {
        'ip':ip,
        type:type,
        dm:deviceType
      }
      utilities.methods.ajax('2016春节喝红酒统计下载按钮点击次数',
                                'GET',
                                args,
                                url,
                                function(response){
                                  if (response==1) {
                                    console.log("点击次数提交成功")
                                  } else {
                                    console.log("点击次数提交失败")
                                  }
                                  location.assign(downLink)
                                })

    })

    
//bootstrap
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

sina CDN
http://lib.sinaapp.com/?path=/jquery
