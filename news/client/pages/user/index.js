Page({

	/**
	 * 页面的初始数据
	 */
	data: {
		head: '',
		userInfo: {},
		logged: false,
		takeSession: false
	},

	/**
	 * 生命周期函数--监听页面加载
	 */
	onLoad: function(options) {
		var userSimpleInfo = [
			getApp().data.userInfo.nickName, 
			(getApp().data.userInfo.gender == 1) ? 'man' : 'woman', 
			getApp().data.userInfo.province, 
			getApp().data.userInfo.country,
			getApp().data.userInfo.language
			]

		this.setData({
			head: getApp().data.userInfo.avatarUrl,
			userInfo: userSimpleInfo,
			logged: getApp().data.logged,
			takeSession: getApp().data.takeSession
		})
	},

	/**
	 * 生命周期函数--监听页面初次渲染完成
	 */
	onReady: function() {

	},

	/**
	 * 生命周期函数--监听页面显示
	 */
	onShow: function() {

	},

	/**
	 * 生命周期函数--监听页面隐藏
	 */
	onHide: function() {

	},

	/**
	 * 生命周期函数--监听页面卸载
	 */
	onUnload: function() {

	},

	/**
	 * 页面相关事件处理函数--监听用户下拉动作
	 */
	onPullDownRefresh: function() {

	},

	/**
	 * 页面上拉触底事件的处理函数
	 */
	onReachBottom: function() {

	},

	/**
	 * 用户点击右上角分享
	 */
	onShareAppMessage: function() {

	}
})