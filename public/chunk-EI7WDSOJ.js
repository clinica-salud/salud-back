import{b as A,c as b}from"./chunk-SAGQXSKZ.js";import{a as q}from"./chunk-Z2YRB6EF.js";import"./chunk-OI7GQYL7.js";import{a as k,b as ie}from"./chunk-PBZD4OP7.js";import{A as G,Aa as i,Ac as D,Ba as t,C as h,Ca as m,Cc as T,Ha as M,Jc as Q,Kc as X,Mb as $,Mc as Y,Nb as g,O as c,Ob as N,P as u,Pa as r,Qa as z,Xa as f,_ as v,cc as S,cd as Z,dc as d,ec as O,fc as E,fd as R,ga as s,gc as w,gd as B,hc as P,ic as x,lc as F,mc as I,pa as _,qa as C,rd as ee,sd as te,tc as L,ua as l,ud as ne,vc as H,wa as y,xc as J,ya as j,yc as K,za as V}from"./chunk-QVEDGAMG.js";var oe=(()=>{let e=class e{};e.\u0275fac=function(a){return new(a||e)},e.\u0275cmp=u({type:e,selectors:[["app-background"]],standalone:!0,features:[f],decls:5,vars:0,consts:[[1,"images-container"],["src","images/bg_01.png","alt","",1,"image","image_01"],["src","images/bg_02.png","alt","",1,"image","image_02"],["src","images/bg_03.png","alt","",1,"image","image_03"],["src","images/bg_04.png","alt","",1,"image","image_04"]],template:function(a,n){a&1&&(i(0,"div",0),m(1,"img",1)(2,"img",2)(3,"img",3)(4,"img",4),t())},styles:['.images-container[_ngcontent-%COMP%]{display:grid;position:relative;grid-template-columns:repeat(2,1fr);grid-template-rows:repeat(3,33.3333333333dvh)}.images-container[_ngcontent-%COMP%]:before{content:"";position:absolute;background-color:#0006;height:100%;left:0;top:0;width:100%;z-index:1}.images-container[_ngcontent-%COMP%]   .image[_ngcontent-%COMP%]{height:100%;width:100%;object-fit:cover}.images-container[_ngcontent-%COMP%]   .image_01[_ngcontent-%COMP%], .images-container[_ngcontent-%COMP%]   .image_04[_ngcontent-%COMP%]{grid-column:1/3}.images-container[_ngcontent-%COMP%]   .image_02[_ngcontent-%COMP%]{grid-column:1}.images-container[_ngcontent-%COMP%]   .image_03[_ngcontent-%COMP%]{grid-column:2}']});let o=e;return o})();var re=(()=>{let e=class e{};e.\u0275fac=function(a){return new(a||e)},e.\u0275cmp=u({type:e,selectors:[["app-logo-name"]],standalone:!0,features:[f],decls:7,vars:0,consts:[[1,"d-flex","align-items-center"],["width","70","src","images/logo_black.png","alt","Logo Amaro"],[1,"d-flex","flex-column","gap-2"],[1,"fs-2","fw-bold"],[1,"fs-5","fw-light","text-secondary"]],template:function(a,n){a&1&&(i(0,"div",0),m(1,"img",1),i(2,"div",2)(3,"p",3),r(4,"Amaro"),t(),i(5,"span",4),r(6,"Odont\xF3logos Especialistas"),t()()())},encapsulation:2});let o=e;return o})();var me=(()=>{let e=class e{constructor(){this._authService=c(b),this._router=c(g),this._authService.isLoggedIn()&&this._router.navigateByUrl("/pages")}};e.\u0275fac=function(a){return new(a||e)},e.\u0275cmp=u({type:e,selectors:[["app-auth"]],standalone:!0,features:[f],decls:10,vars:0,consts:[[1,"p-0"],[1,"main-container"],[1,"images"],[1,"form"],[1,"p-0","mb-0"],[1,"px-4","px-sm-5","py-5"],[1,"mt-0"]],template:function(a,n){a&1&&(i(0,"nb-layout")(1,"nb-layout-column",0)(2,"div",1),m(3,"app-background",2),i(4,"div",3)(5,"nb-card",4)(6,"nb-card-body",5),m(7,"app-logo-name"),i(8,"div",6),m(9,"router-outlet"),t()()()()()()())},dependencies:[$,Y,Q,X,K,J,H,oe,re],styles:[".main-container[_ngcontent-%COMP%]{display:grid;grid-template-columns:repeat(9,1fr);min-height:100dvh}.main-container[_ngcontent-%COMP%]   .images[_ngcontent-%COMP%]{grid-column:1/span 6}.main-container[_ngcontent-%COMP%]   .form[_ngcontent-%COMP%]{grid-column:7/span 3}.main-container[_ngcontent-%COMP%]   nb-card[_ngcontent-%COMP%]{border:none;height:100dvh}.main-container[_ngcontent-%COMP%]   nb-card-body[_ngcontent-%COMP%]{padding-block:2rem}@media screen and (max-width: 1200px){.main-container[_ngcontent-%COMP%]   .images[_ngcontent-%COMP%]{grid-column:1/span 5}.main-container[_ngcontent-%COMP%]   .form[_ngcontent-%COMP%]{grid-column:6/span 4}}@media screen and (max-width: 1024px){.main-container[_ngcontent-%COMP%]   .images[_ngcontent-%COMP%]{grid-column:1/span 4}.main-container[_ngcontent-%COMP%]   .form[_ngcontent-%COMP%]{grid-column:5/span 5}}@media screen and (max-width: 768px){.main-container[_ngcontent-%COMP%]   .images[_ngcontent-%COMP%]{display:none}.main-container[_ngcontent-%COMP%]   .form[_ngcontent-%COMP%]{grid-column:1/span 9}}@media screen and (max-height: 800px){.main-container[_ngcontent-%COMP%]   nb-card-body[_ngcontent-%COMP%]{padding-block:2rem}}"]});let o=e;return o})();function ce(o,e){o&1&&(i(0,"div",9)(1,"small"),r(2,"\xBFNo tienes cuenta?"),t(),i(3,"a",10),r(4,"Registrate"),t()())}var se=(()=>{let e=class e{constructor(){this._destroyRef=c(v),this._fb=c(F),this._router=c(g),this._authService=c(b),this.isLoading=_(!1),this.form=this._fb.group({email:["test@test.com",[d.required,d.email]],password:["ramirez",[d.required,d.minLength(6)]],remember:[!1]})}get f(){return this.form.controls}login(){this.isLoading.set(!0),this.form.disable();let p={email:this.f.email.value,password:this.f.password.value};this._authService.login(p).pipe(G(500),h(()=>{this.isLoading.set(!1),this.form.enable()}),k(this._destroyRef)).subscribe(()=>this._router.navigateByUrl("/pages"))}};e.\u0275fac=function(a){return new(a||e)},e.\u0275cmp=u({type:e,selectors:[["ng-component"]],standalone:!0,features:[f],decls:16,vars:5,consts:[[1,"fs-4","fw-semibold","py-4"],[1,"d-flex","flex-column","gap-3","gap-lg-4",3,"submit","formGroup"],["for","email",1,"fw-semibold","mb-2"],["nbInput","","type","email","id","email","placeholder","Introduce tu correo electr\xF3nico","formControlName","email","fullWidth","",3,"status"],["controlName","email"],["for","username",1,"fw-semibold","mb-2"],["nbInput","","type","password","id","password","placeholder","Introduce tu contrase\xF1a","formControlName","password","fullWidth","",3,"status"],["controlName","password"],["nbButton","","type","submit","status","primary","fullWidth","",3,"disabled"],[1,"d-flex","align-items-center","justify-content-center","gap-2"],["routerLink","/auth/register"]],template:function(a,n){a&1&&(i(0,"p",0),r(1,"\xA1Nos apasiona tu sonrisa!"),t(),i(2,"form",1),M("submit",function(){return n.login()}),i(3,"div")(4,"label",2),r(5,"Correo electr\xF3nico"),t(),m(6,"input",3)(7,"control-error",4),t(),i(8,"div")(9,"label",5),r(10,"Contrase\xF1a"),t(),m(11,"input",6)(12,"control-error",7),t(),i(13,"button",8),r(14," Iniciar Sesi\xF3n "),t(),C(15,ce,5,0,"div",9),t()),a&2&&(s(2),l("formGroup",n.form),s(4),l("status",n.f.email.dirty?n.f.email.invalid?"danger":"success":"basic"),s(5),l("status",n.f.password.dirty?n.f.password.invalid?"danger":"success":"basic"),s(2),l("disabled",n.form.invalid||n.isLoading()),s(2),y(n.isLoading()?-1:15))},dependencies:[I,w,S,O,E,P,x,N,L,B,R,T,D,A,Z,q],styles:["[_nghost-%COMP%]{display:block;margin-top:5rem}@media screen and (max-width: 768px){[_nghost-%COMP%]{margin-top:3rem}}"]});let o=e;return o})();var ue=(o,e)=>e.tipoid;function fe(o,e){if(o&1&&(i(0,"nb-option",13),r(1),t()),o&2){let U=e.$implicit;l("value",U.tipoid),s(),z(U.nombre)}}function ge(o,e){o&1&&(m(0,"hr"),i(1,"div",25)(2,"small"),r(3,"\xBFTienes cuenta?"),t(),i(4,"a",26),r(5,"Iniciar Sesi\xF3n"),t()())}var le=(()=>{let e=class e{constructor(){this._authService=c(b),this._destroyRef=c(v),this._fb=c(F),this._router=c(g),this.isLoading=_(!1),this.documentTypes=ie(this._authService.getDocumentTypes()),this.form=this._fb.group({name:["",[d.required]],ape_pat:["",[d.required]],ape_mat:["",[d.required]],tipoid:["",[d.required]],numero:["",[d.required]],email:["",[d.required,d.email]],password:["",[d.required,d.minLength(6)]]})}get f(){return this.form.controls}register(){this.isLoading.set(!0),this.form.disable();let p={name:this.f.name.value,ape_pat:this.f.ape_pat.value,ape_mat:this.f.ape_mat.value,tipoid:this.f.tipoid.value,numero:this.f.numero.value,email:this.f.email.value,password:this.f.password.value};this._authService.register(p).pipe(h(()=>{this.isLoading.set(!1),this.form.enable()}),k(this._destroyRef)).subscribe(()=>this._router.navigateByUrl("/auth/login"))}};e.\u0275fac=function(a){return new(a||e)},e.\u0275cmp=u({type:e,selectors:[["ng-component"]],standalone:!0,features:[f],decls:44,vars:10,consts:[[1,"fs-4","fw-semibold","py-4"],[1,"d-flex","flex-column","gap-2","gap-lg-3",3,"submit","formGroup"],["for","name",1,"fw-semibold","mb-2"],["nbInput","","type","text","id","name","placeholder","Introduce tu nombre","formControlName","name","fullWidth","",3,"status"],["controlName","name"],["for","ape_pat",1,"fw-semibold","mb-2"],["nbInput","","type","text","id","ape_pat","placeholder","Introduce tu apellido paterno","formControlName","ape_pat","fullWidth","",3,"status"],["controlName","ape_pat"],["for","ape_mat",1,"fw-semibold","mb-2"],["nbInput","","type","text","id","ape_mat","placeholder","Introduce tu apellido materno","formControlName","ape_mat","fullWidth","",3,"status"],["controlName","ape_mat"],["for","tipoid",1,"fw-semibold","mb-2"],["id","tipoid","placeholder","Selecciona tu tipo de documento","formControlName","tipoid","fullWidth","",3,"status"],[3,"value"],["controlName","tipoid"],["for","numero",1,"fw-semibold","mb-2"],["nbInput","","type","text","id","numero","placeholder","Introduce tu n\xFAmero de documento","formControlName","numero","fullWidth","",3,"status"],["controlName","numero"],["for","email",1,"fw-semibold","mb-2"],["nbInput","","type","email","id","email","placeholder","Introduce tu correo electr\xF3nico","formControlName","email","fullWidth","",3,"status"],["controlName","email"],["for","username",1,"fw-semibold","mb-2"],["nbInput","","type","password","id","password","placeholder","Introduce tu contrase\xF1a","formControlName","password","fullWidth","",3,"status"],["controlName","password"],["nbButton","","type","submit","status","primary","fullWidth","",1,"mt-2",3,"disabled"],[1,"d-flex","align-items-center","justify-content-center","gap-2"],["routerLink","/auth/login"]],template:function(a,n){a&1&&(i(0,"p",0),r(1,"\xA1\xDAnete a nosotros!"),t(),i(2,"form",1),M("submit",function(){return n.register()}),i(3,"div")(4,"label",2),r(5,"Nombre"),t(),m(6,"input",3)(7,"control-error",4),t(),i(8,"div")(9,"label",5),r(10,"Apellido paterno"),t(),m(11,"input",6)(12,"control-error",7),t(),i(13,"div")(14,"label",8),r(15,"Apellido materno"),t(),m(16,"input",9)(17,"control-error",10),t(),i(18,"div")(19,"label",11),r(20,"Tipo de documento"),t(),i(21,"nb-select",12),j(22,fe,2,2,"nb-option",13,ue),t(),m(24,"control-error",14),t(),i(25,"div")(26,"label",15),r(27,"N\xFAmero de documento"),t(),m(28,"input",16)(29,"control-error",17),t(),i(30,"div")(31,"label",18),r(32,"Correo electr\xF3nico"),t(),m(33,"input",19)(34,"control-error",20),t(),i(35,"div")(36,"label",21),r(37,"Contrase\xF1a"),t(),m(38,"input",22)(39,"control-error",23),t(),i(40,"div")(41,"button",24),r(42," Registrate "),t(),C(43,ge,6,0),t()()),a&2&&(s(2),l("formGroup",n.form),s(4),l("status",n.f.name.dirty?n.f.name.invalid?"danger":"success":"basic"),s(5),l("status",n.f.ape_pat.dirty?n.f.ape_pat.invalid?"danger":"success":"basic"),s(5),l("status",n.f.ape_mat.dirty?n.f.ape_mat.invalid?"danger":"success":"basic"),s(5),l("status",n.f.tipoid.dirty?n.f.tipoid.invalid?"danger":"success":"basic"),s(),V(n.documentTypes()),s(6),l("status",n.f.numero.dirty?n.f.numero.invalid?"danger":"success":"basic"),s(5),l("status",n.f.email.dirty?n.f.email.invalid?"danger":"success":"basic"),s(5),l("status",n.f.password.dirty?n.f.password.invalid?"danger":"success":"basic"),s(3),l("disabled",n.form.invalid||n.isLoading()),s(2),y(n.isLoading()?-1:43))},dependencies:[I,w,S,O,E,P,x,N,L,B,R,T,D,A,ne,te,ee,q],encapsulation:2});let o=e;return o})();var Xe=[{path:"",component:me,children:[{path:"login",component:se},{path:"register",component:le},{path:"",pathMatch:"full",redirectTo:"login"},{path:"**",redirectTo:"login"}]}];export{Xe as AUTH_ROUTES};