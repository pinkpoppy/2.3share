var app = (function(){
  /*
  * 0 全部订单 1 代付款 2 代发货 3 代收货
  */
  var 
    configUrlMap = {
      //APIBase : "http://t.snapwine.net:7784/pjapi/"
      APIBase : "http://192.168.1.7:7784/pjapi/"
    },
    //config = {
    //  Base64Key:"RkVB2p5ida3ywUDJf7IgXcoGrm8TjOEAb",
    //  userId :localStorage['userId'],
    //  userType : "12",
    //  headPic:localStorage['headPic'],
    //  nickname:localStorage['nickname'],
    //  sex:localStorage['sex'],
    //  intro:'',
    //  country:localStorage['country'],
    //  pro:localStorage['province'],
    //  city:localStorage['city'],
    //  dis:''
    //},
      config = {
        Base64Key:"RkVB2p5ida3ywUDJf7IgXcoGrm8TjOEAb",
        userId :'oUeq9t-m7cPT5sAb7V7nPTfxbnpU',
        userType : "12",
        headPic:'',
        nickname:'',
        sex:'',
        intro:'',
        country:'',
        pro:'',
        city:'',
        dis:''
      },
    localArr = ['n','t','p','c','d','de'],

    browser = {
      versions : function(){
        var 
          u = window.navigator.userAgent,
          app = window.navigator.appVersion;
        return {
          trident: u.indexOf('Trident') > -1, //IE内核
          presto: u.indexOf('Presto') > -1, //opera内核
          webKit: u.indexOf('AppleWebKit') > -1, //苹果、谷歌内核
          gecko: u.indexOf('Gecko') > -1 && u.indexOf('KHTML') == -1, //火狐内核
          mobile: !!u.match(/AppleWebKit.*Mobile.*/), //是否为移动终端
          ios: !!u.match(/\(i[^;]+;( U;)? CPU.+Mac OS X/), //ios终端
          android: u.indexOf('Android') > -1 || u.indexOf('Linux') > -1, //android终端或uc浏览器
          iPhone: u.indexOf('iPhone') > -1, //是否为iPhone或者QQHD浏览器
          iPad: u.indexOf('iPad') > -1, //是否iPad
          webApp: u.indexOf('Safari') == -1 //是否web应用程序，没有头部与底部
        }
      }(),
      language:(navigator.browserLanguage || navigator.language).toLowerCase()
    };

  var 
    moduleId = 1,
    pageId = 1; 

  var 
    appState = {
      module:moduleId,
      page:pageId,
      storageType:"localStorage",
      storageArr:localArr
    };

  function calScreenWidth(){
    return screen.width
  }

  function calScreenHeight(){
    return screen.height
  }
  
  function getSearchArgFromUrl(){
    var searchString = decodeURIComponent(window.location.search)
    var res = {}
    if (searchString.length > 0) {
      var argArr = searchString.substr(1,searchString.length -1 ).split('&')
      
      for (var i = 0; i < argArr.length; i++) {
        var coupleArg = argArr[i].split('=')
        console.log(coupleArg)

        res[coupleArg[0]] = coupleArg[1]
      }
    }
    return res
  }
  
  function deviceInfo(){
    var 
      devicePlat = browser.versions,
      device = "";
    if (devicePlat.ios) {
       device = "iphone"
    } else if (devicePlat.android) {
      device = "android"
    }
    return device
  }  

  function browserInfo(){
    if (browser.versions.mobile) {
      var ua = navigator.userAgent.toLowerCase()
      if (ua.match(/MicroMessenger/i) == "micromessenger") {
        return "weixin"
      } else if (ua.match(/WeiBo/i) == "weibo") {
        return "weibo"
      } else if (ua.match(/QQ/i) == "qq") {
        return qq
      } else if (browser.versions.ios) {
        return "ios"
      } else if (browser.versions.android) {
        return "android"
      }
    } else {
      return "pc"
    }
  }

  function appVersion(){
    var version = "2.2.0"
    return version
  }

  function timestamp(){
    return parseInt(new Date() / 1000)
  }

  function ajaxLog(path,des,feedback) {
    console.log(path +" "+ des +" " + feedback)
  }

  function pathInfo(addPath){
    var
      l = window.location,
      host = l.protocol + "//" + l.host,
      pathname = l.pathname,
      path = pathname.substring(0,pathname.lastIndexOf('/')+1),
      newPathName = host + path + addPath;

    return newPathName
  }

  function initStorage(type) {
    try {
      var 
        storage = window[type];
      return true
    }
    catch(e) {
      alert("错误类型: " + e.name)
      return false
    }
  }
  function AES(plainText,timestamp) {

    pkcs7 = function(str) {
      var len = str.length,
          block_size = 32,
          pad = block_size-(len % block_size),
          padChar=String.fromCharCode(pad);

      for (var i = 0; i < pad; i++) {
        str = str + padChar
      }
      return str
    }

    var Base64Key = config['Base64Key'] + timestamp + '=',
        key = CryptoJS.enc.Base64.parse(Base64Key),
        iv = key.left(16);

    plainText = unescape(encodeURIComponent(plainText))
    var text=CryptoJS.enc.Latin1.parse(pkcs7(plainText));
        ciphertext = CryptoJS.AES.encrypt(text, 
                                          key, 
                                          {iv: iv, 
                                            mode:CryptoJS.mode.CBC, 
                                            padding:CryptoJS.pad.NoPadding}),
        base64Text = CryptoJS.enc.Base64.stringify(ciphertext.ciphertext)
    return base64Text
  }

  /**
  *@param Des descripption of the request String
  *@param MethodName specific API name of current request String
  *@param RequestType GET/POST or Other Type String
  *@param userData JSON
  *@param Timestamp Current Timestamp an 10bit Interger
  */
  function appAjax(des,
                   methodName,
                   requestType,
                   userData,
                   timestamp,
                   succeedCallback
                   ) {
    var 
      path = configUrlMap['APIBase'],
      data = jointPostData(methodName,timestamp,AES(userData,timestamp));
    $.ajax({
      url : path,
      method : requestType,
      dataType : 'json',
      data : data
    })
    .done(function(data) {
      ajaxLog(path,des,'successed')
      //var json = JSON.parse(JSON.stringify(eval( "(" + data +")")))
      //callBack(json)
      succeedCallback(data)
    })
    .fail(function(data) {
      //failedCallback(data)
      ajaxLog(path,des,'failed')
    })
    .always(function(data) {
      //alwaysCallback(data)
      ajaxLog(path,des,'completed')
    });
  }

  /**
  *   
  */
  function getUserinfoData(){
    var u = {};
    u.userId = config.userId
    u.userType = config.userType
    u.headPic = config.headPic
    u.nickname = config.nickname
    u.sex = config.sex
    u.intro = config.intro
    u.version = appVersion()
    u.deviceMode = deviceInfo()
    console.log("u in getUserinfoData " + u.userId)
    return u
  }

  /**
  * @m API method name
  * @t timestamp using for AES
  * @p base64text representing the sensitive user info
  */
  function jointPostData(m,t,p) {
    return data = {"m" : m,"t" : t,"p" : p}
  }

  return {
    urls:configUrlMap,
    screenSize:calScreenWidth,
    appState:appState,
    config:config,
    methods:{
      getSearchArgFromUrl:getSearchArgFromUrl,
      deviceInfo : deviceInfo,
      appVersion : appVersion,
      timestamp : timestamp,
      getBasicUserinfo : getUserinfoData,
      appAjax : appAjax,
      browser : browserInfo,
      pathInfo : pathInfo,
      setBgImage :setBgImage,
      initStorage:initStorage,
      localArr:localArr,
      setModalMask:setModalMask,
      isLegalMobilePhone : isLegalMobilePhone
    }
  }

  function setBgImage(str) {
    if (str.search('focus') != -1) {//点击的时候是选中状态
      str = str.replace('focus','blur')
    } else if (str.search('blur') != -1) { //点击的时候是未选中状态
      str = str.replace('blur','focus')
    }
    return str
  }

  function setModalMask(ele) {
    var 
      screenW = parseFloat(calScreenWidth()),
      screenH = parseFloat(calScreenHeight()),
      boxW = Math.ceil(parseFloat(screenW * 0.84)),
      boxH = Math.ceil(parseFloat(screenH * 0.46));
    $(ele).css('width',screenW+'px')
    $(ele).css('height',screenH+'px')
    $(ele).children('.modal-body').css('width',boxW + 'px')
    $(ele).children('.modal-body').css('height',boxH + 'px')
  }

  //表单验证
  function isInputEmpty(str){
    if (str.length == 0) {
      return true
    }
  }

  function isLegalMobilePhone(str) {
    var
      mpReg = /1[^0126][0-9]{9}/;
    if (isInputEmpty(str)) {
      return "EMPTY"
    } else {
      if (mpReg.test(str)) {
        return true
      }
      return false
    }
  }
}());

