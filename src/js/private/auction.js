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
                          $('.host-say>span').text(response.nickname)
                          $('.host-wrap>img').attr('src', response.headpic)
                          var isWin = "resources/target.png"
                          var notWin = "resources/not-target.png"
                          var test = response.winning
                          if (test) {
                            $('.host-say img').attr('src',isWin)
                          } else{
                            $('.host-say img').attr('src',notWin)
                          }
                          $('.reward-bottom .headline').text(response.title)
                          $('.total').text("总需" + response.total + "人次")
                          $('.progress-wrap span').text("还剩" + response.need + "人次")
                        }
                      })
})