import{b as y}from"./chunk-OI7GQYL7.js";import{Aa as l,B as m,Ba as h,O as s,P as p,Pa as f,Qa as d,Xa as g,db as b,eb as v,ga as u,hc as E,i as n,l as c,v as a,wb as D}from"./chunk-QVEDGAMG.js";var j=(()=>{let r=class r{constructor(){this.subscription=new n,this.formGroupDirective=s(E),this.errors=s(y),this.message$=new c("")}ngOnInit(){if(this.formGroupDirective){let t=this.formGroupDirective.control.get(this.controlName);if(t)this.subscription=a(t.valueChanges,this.formGroupDirective.ngSubmit).pipe(m()).subscribe(()=>{let e=t.errors;if(e){let o=Object.keys(e)[0],C=this.errors[o],S=this.customErrors?.[o]||C(e[o]);this.setError(S)}else this.setError("")});else{let e=this.controlName?`Control "${this.controlName}" not found in the form group.`:"Input controlName is required";console.error(e)}}else console.error("ErrorComponent must be used within a FormGroupDirective.")}setError(t){this.message$.next(t)}ngOnDestroy(){this.subscription&&this.subscription.unsubscribe()}};r.\u0275fac=function(e){return new(e||r)},r.\u0275cmp=p({type:r,selectors:[["control-error"]],inputs:{controlName:"controlName",customErrors:"customErrors"},standalone:!0,features:[g],decls:3,vars:3,consts:[[1,"label","text-danger"]],template:function(e,o){e&1&&(l(0,"span",0),f(1),b(2,"async"),h()),e&2&&(u(),d(v(2,1,o.message$)))},dependencies:[D],encapsulation:2,changeDetection:0});let i=r;return i})();export{j as a};