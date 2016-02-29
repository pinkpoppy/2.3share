$(function(){
  var args = app.methods.getSearchArgFromUrl()
  function getBasicData(){
    // var res = {}
    // for (var pro in args) {
    //   res.pro = args[pro]
    // }
    var res = {
      'userId':'2155963685',
      'userType':'2',
      'dbId':'1'
    }
    return res
  }

  function getRequestArguments(type){
    var res = getBasicData()
    // res.openId = "800EA222D462D4F8809AE24214E27329"
    res.openId = "1234test"
    if (type == "CLIAM") {
      //获取信息接口
      res.head_pic = "http://q.qlogo.cn/qqapp/1101986508/6735FDEBF7A5C762EDAE710EBBCE3E7E/100"
    }
    return res
  }
  app.methods.appAjax('请求夺宝详情接口',
                      app.urls.getInfo,
                      getRequestArguments(),
                      function(response){
                        if (response.state == 1 && response.msg == "success") {
                          console.log(response.code)
                        }
                      })
})