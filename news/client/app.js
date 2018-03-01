//app.js
var qcloud = require('./utils/index')
var config = require('./config')

App({
	data: {
		userInfo: {},
		logged: false,
		takeSession: false
	},
	onLaunch: function() {
		qcloud.setLoginUrl(config.loginUrl)
		this.login()
	},
	// 用户登录示例
	login: function() {
		if (!this.data.logged) {
			qcloud.showBusy('正在登录')
			var that = this

			// 调用登录接口
			qcloud.login({
				success(result) {
					if (result) {
						qcloud.showSuccess('登录成功')
						that.data.userInfo = result
						that.data.logged = true
					} else {
						// 如果不是首次登录，不会返回用户信息，请求用户信息接口获取
						qcloud.request({
							url: config.requestUrl,
							login: true,
							success(result) {
								qcloud.showSuccess('登录成功')
								that.data.userInfo = result.data.data
								that.data.logged = true
							},

							fail(error) {
								qcloud.showModel('请求失败', error)
								console.log('request fail', error)
							}
						})
					}
				},

				fail(error) {
					qcloud.showModel('登录失败', error)
					console.log('登录失败', error)
				}
			})
		}
	}
})