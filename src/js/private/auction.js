$(function(){
  var args = app.methods.getSearchArgFromUrl()
  function userData(){
    // var res = {}
    // for (var pro in args) {
    //   res.pro = args[pro]
    // }
    var res = {
      'userId':'800EA222D462D4F8809AE24214E27329',
      'userType':'1',
      'bid':1
    }
    return res
  }
  app.methods.appAjax('请求夺宝详情接口',
                      'bbinfo',
                      'POST',
                      userData(),
                      app.methods.timestamp(),
                      function(response){
                        if (response.type == 1) {
                          
                        }
                      })
})