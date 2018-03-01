var qcloud = require('../../utils/index')
var config = require('../../config')

Page({

    /**
     * 页面的初始数据
     */
    data: {
        news: {},
				logged: false
    },

    /**
     * 生命周期函数--监听页面加载
     */
		onLoad: function (options) {
			this.getData();
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
		onPullDownRefresh: function () {
			this.getData();
    },

    /**
     * 页面上拉触底事件的处理函数
     */
    onReachBottom: function() {
			this.getData();
    },

    /**
     * 用户点击右上角分享
     */
    onShareAppMessage: function() {

    },
		getData:function() {
			var that = this
			qcloud.request({
				url: config.dataUrl,
				login: true,
				success(result) {
					that.setData({
						news: result.data.result.data,
						logged: true
					})
				},
				fail(error) {
					qcloud.showModel('请求失败', error)
					console.log('request fail', error)
				}
			})
		}
})