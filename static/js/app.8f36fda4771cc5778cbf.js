webpackJsonp([1],{"669q":function(t,e){},E5v8:function(t,e){},L56a:function(t,e,s){"use strict";var a={render:function(){var t=this.$createElement;return(this._self._c||t)("div",{attrs:{id:"manage"}},[this._v("\n\t11\n")])},staticRenderFns:[]};e.a=a},NHnr:function(t,e,s){"use strict";Object.defineProperty(e,"__esModule",{value:!0});var a=s("7+uW"),n={render:function(){var t=this.$createElement,e=this._self._c||t;return e("div",{attrs:{id:"app"}},[e("router-view")],1)},staticRenderFns:[]},r=s("VU/8")({name:"App"},n,!1,null,null,null).exports,o=s("/ocq"),i=s("mvHQ"),u=s.n(i),l=s("Xk2u"),c=s.n(l),m=s("NYxO"),d={data:function(){return{form:{username:"",password:""},adminInfo:{},options:{color:"rgba(225,225,225,0.5)",radius:15,densety:.3,clearOffset:.2},userData:{},isBtnLoading:!1}},created:function(){this.$store.dispatch("getRequest"),JSON.parse(localStorage.getItem("user"))&&JSON.parse(localStorage.getItem("user")).username&&(console.log("localStorage yes"),this.adminInfo={status:1})},mounted:function(){this.userData&&(this.userData=this.$store.getters.getUserData)},computed:{btnText:function(){if(this.isBtnLoading)return this.$message({type:"success",message:"登录成功"}),void this.$router.push("manage")}},watch:{adminInfo:function(t){t.status&&(this.$message({type:"success",message:"检测到您之前登录过，将自动登录"}),this.$router.push("manage")),console.log("登录态",t)}},components:{"vue-canvas-nest":c.a},methods:{login:function(){if(this.userData.status){if(!this.form.username)return void this.$message({type:"warning",message:"请填写账号"});if(this.form.username!==this.userData.username)return void this.$message({type:"warning",message:"账号错误"});if(!this.form.password)return void this.$message({type:"warning",message:"请填写密码"});if(this.form.password!==this.userData.password)return void this.$message({type:"warning",message:"密码错误"});if(this.isBtnLoading=!0,!localStorage.getItem("user")){var t=u()({username:this.userData.username,password:this.userData.password});localStorage.setItem("user",t)}}}}},f={render:function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("div",{staticClass:"container-login"},[s("el-form",{ref:"form",staticClass:"login-form",attrs:{model:t.form,"label-width":"80px"}},[s("h2",{staticClass:"login-title",staticStyle:{}},[t._v("后台管理系统")]),t._v(" "),s("el-form-item",{staticClass:"box",staticStyle:{},attrs:{label:"账号"}},[s("el-input",{staticClass:"m-l ax-icon",model:{value:t.form.username,callback:function(e){t.$set(t.form,"username",e)},expression:"form.username"}})],1),t._v(" "),s("el-form-item",{staticClass:"box",attrs:{label:"密码"}},[s("el-input",{staticClass:"m-l",attrs:{type:"password"},model:{value:t.form.password,callback:function(e){t.$set(t.form,"password",e)},expression:"form.password"}})],1),t._v(" "),s("el-button",{attrs:{type:"primary"},nativeOn:{click:function(e){return t.login(e)}}},[t._v("登录")]),t._v(" "),s("el-button",{staticClass:"cancle"},[t._v("取消")])],1),t._v(" "),s("div",{directives:[{name:"show",rawName:"v-show",value:t.isBtnLoading,expression:"isBtnLoading"}]},[t._v(t._s(t.btnText))]),t._v(" "),s("vue-canvas-nest")],1)},staticRenderFns:[]};var p=s("VU/8")(d,f,!1,function(t){s("uXOg")},"data-v-99a8a49e",null).exports,g=s("uYCW");a.default.use(o.a);var v=new o.a({routes:[{path:"/login",name:"login",component:p},{path:"/manage",name:"manage",component:g.default},{path:"*",redirect:"/login"}]}),h=s("mtWM"),w=s.n(h),_=s("bOdI"),b="GET_STATUS",y={state:{userData:{username:"",password:"",status:""}},getters:{getUserData:function(t){return t.userData}},mutations:s.n(_)()({},b,function(t,e){console.log("data",e),t.userData.username=e.username,t.userData.password=e.password,t.userData.status=e.status}),actions:{getRequest:function(t){var e=t.commit;t.state;w.a.get("/api/user.json").then(function(t){console.log(t),e(b,t.data.data)})}}};a.default.use(m.a);var D=new m.a.Store({modules:{login:y}}),$=s("zL8q"),x=s.n($);s("tvR6"),s("oiIt");a.default.config.productionTip=!1,a.default.prototype.aixos=w.a,a.default.use(x.a),new a.default({el:"#app",router:v,store:D,components:{App:r},template:"<App/>"})},oiIt:function(t,e){},tvR6:function(t,e){},uXOg:function(t,e){},uYCW:function(t,e,s){"use strict";var a=s("E5v8"),n=s.n(a),r=s("L56a");var o=function(t){s("669q")},i=s("VU/8")(n.a,r.a,!1,o,"data-v-60d26ce2",null);e.default=i.exports}},["NHnr"]);
//# sourceMappingURL=app.8f36fda4771cc5778cbf.js.map