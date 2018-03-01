var IsShuai = cc.Class({
    //-- 继承
    extends: cc.Component,
    //-- 属性
    properties: {
        question: cc.Label,
        yes: cc.Button,
        no: cc.Button,
        target: cc.Node
    },
    doDestroy () {
        this.target.destroy();
    }
});
