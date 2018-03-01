var constants = require('./constants');
var login = require('./login');
var Session = require('./session');
var request = require('./request');
var util = require('./util');

var exports = module.exports = {
    login: login.login,
    setLoginUrl: login.setLoginUrl,
    LoginError: login.LoginError,

    clearSession: Session.clear,

    request: request.request,
    RequestError: request.RequestError,

    formatTime: util.formatTime,
    showBusy: util.showBusy,
    showSuccess: util.showSuccess,
    showModel: util.showModel
};

// 导出错误类型码
Object.keys(constants).forEach(function(key) {
    if (key.indexOf('ERR_') === 0) {
        exports[key] = constants[key];
    }
});