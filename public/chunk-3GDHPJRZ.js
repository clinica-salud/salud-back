import{k as nt,m as ot,n as at,o as rt,p as st,q as lt}from"./chunk-3N5LZRWU.js";import{a as dt}from"./chunk-Z2YRB6EF.js";import{a as ct,b as pt,c as mt,d as te}from"./chunk-BGLUF2CD.js";import"./chunk-OI7GQYL7.js";import{a as M,f as ge}from"./chunk-2T43LGJZ.js";import{a as v,b as G}from"./chunk-PBZD4OP7.js";import{Aa as t,Ac as L,Ad as Ze,Ba as e,Bb as ke,Bc as Oe,Bd as et,Ca as c,Cc as $,Cd as tt,Db as De,Dd as it,Ec as Ae,Fc as Re,Ga as k,Ha as h,Hc as Le,Ia as N,Ic as $e,Lb as Te,Mb as Ie,Nb as Fe,O as p,Oa as H,Ob as ce,Oc as We,P as w,Pa as r,Qa as u,Qc as He,Ra as oe,Ua as ae,Va as re,W as g,Wa as se,X as y,Xa as E,Ya as le,Yc as Ge,Za as Se,Zc as me,_ as j,a as W,b as U,cc as pe,cd as Ue,db as D,dc as C,eb as de,ec as z,fb as ee,fc as q,fd as ue,ga as l,gc as K,gd as fe,hc as Y,ic as J,jc as Pe,jd as be,kc as Be,kd as je,lc as I,ld as Q,mc as F,pa as _,pd as ze,q as ie,qa as ne,qd as qe,rd as he,sc as P,sd as _e,tc as B,td as ve,ua as m,uc as V,ud as Ce,vc as O,vd as Ke,wa as Z,wc as Ve,wd as Ye,xa as we,xb as Ee,xc as A,xd as Je,ya as S,yb as Me,yc as R,yd as Qe,za as x,zb as T,zd as Xe}from"./chunk-QVEDGAMG.js";var ut=(()=>{let n=class n{};n.\u0275fac=function(a){return new(a||n)},n.\u0275cmp=w({type:n,selectors:[["app-appointments"]],standalone:!0,features:[E],decls:1,vars:0,template:function(a,d){a&1&&c(0,"router-outlet")},dependencies:[Ie],encapsulation:2});let i=n;return i})();var gt=()=>[];var yt={PN:{primary:"var(--color-basic-500)",secondary:"var(--color-basic-100)"},CC:{primary:"var(--color-primary-500)",secondary:"var(--color-primary-100)"},FIN:{primary:"var(--color-success-500)",secondary:"var(--color-success-100)"},DEL:{primary:"var(--color-danger-500)",secondary:"var(--color-danger-100)"}},St=i=>{switch(i){case"Pendiente":return"PENDING";case"Confirmada":return"CONFIRMED";case"Cancelada":return"CANCELLED";case"Finalizada":return"FINISHED";default:throw new Error(`Unknown estado: ${i}`)}},ft=(()=>{let n=class n{constructor(){this._dialogService=p(Q),this._fb=p(I),this._router=p(Fe),this._datePipe=p(T),this._appointmentService=p(M),this.today=_(new Date),this.appointments=G(this._appointmentService.getAppointments({}).pipe(ie(s=>s.map(a=>{let d=St(a.estado);return U(W({},a),{start:new Date(`${a.fecha} ${a.hora}`),title:"",color:W({},yt[a.estado_abreviatura]),meta:{type:pt[d],detail:a}})}))))}showEvent(s){this._dialogService.open(te,{context:{detail:s.detail,id:s.detail.citaid,origin:mt.CALENDAR}})}dayClicked(s){let a=new Date;if(a.setHours(0,0,0,0),s<a)return;let d=this._datePipe.transform(s,"MM-dd-yyyy");this._router.navigate(["/pages/appointments","new"],{queryParams:{date:d}})}};n.\u0275fac=function(a){return new(a||n)},n.\u0275cmp=w({type:n,selectors:[["ng-component"]],standalone:!0,features:[E],decls:31,vars:16,consts:[[1,"border-0"],[1,"border-0","d-flex","justify-content-between","align-items-end","flex-wrap","px-2","px-md-4"],[1,"d-flex","flex-column","gap-2"],[1,"fs-4"],[1,"fs-6","text-secondary","fw-light"],["routerLink","/pages/appointments"],[1,"pb-0","px-2","px-md-4"],[1,"d-flex","flex-wrap","justify-content-between","align-items-center","gap-2"],[1,""],[1,"d-flex","gap-2"],["nbButton","","mwlCalendarPreviousView","","status","primary","view","month",3,"viewDateChange","viewDate"],["icon","chevron-left-outline"],["nbButton","","mwlCalendarToday","",3,"viewDateChange","viewDate"],["nbButton","","mwlCalendarNextView","","status","primary","view","month",3,"viewDateChange","viewDate"],["icon","chevron-right-outline"],[3,"eventClicked","dayClicked","viewDate","events"]],template:function(a,d){a&1&&(t(0,"nb-card",0)(1,"nb-card-header",1)(2,"div",2)(3,"span",3),r(4,"Calendario"),e(),t(5,"small",4),r(6,"Consultas odontol\xF3gicas"),e()(),t(7,"a",5),r(8,"Ver modo registro"),e()(),t(9,"nb-card-body",6)(10,"div",7)(11,"div")(12,"h6"),r(13),D(14,"date"),e()(),t(15,"div",8)(16,"h5"),r(17),D(18,"date"),D(19,"titlecase"),e()(),t(20,"div",8)(21,"div",9)(22,"button",10),se("viewDateChange",function(f){return re(d.today,f)||(d.today=f),f}),c(23,"nb-icon",11),e(),t(24,"button",12),se("viewDateChange",function(f){return re(d.today,f)||(d.today=f),f}),r(25,"Hoy"),e(),t(26,"button",13),se("viewDateChange",function(f){return re(d.today,f)||(d.today=f),f}),c(27,"nb-icon",14),e()()()(),c(28,"br"),t(29,"div")(30,"mwl-calendar-month-view",15),h("eventClicked",function(f){return d.showEvent(f.event.meta)})("dayClicked",function(f){return d.dayClicked(f.day.date)}),e()()()()),a&2&&(l(13),u(ee(14,7,d.today(),"y")),l(4),u(de(19,13,ee(18,10,d.today(),"MMMM"))),l(5),ae("viewDate",d.today),l(2),ae("viewDate",d.today),l(2),ae("viewDate",d.today),l(4),m("viewDate",d.today())("events",d.appointments()||le(15,gt)))},dependencies:[De,Ee,T,F,ce,R,A,O,V,$,L,B,P,lt,ot,at,rt,st],encapsulation:2});let i=n;return i})();var xt=(i,n)=>n.estadoid;function Nt(i,n){if(i&1&&(t(0,"nb-option",6),r(1),e()),i&2){let o=n.$implicit;m("value",o.estadoid),l(),u(o.nombre)}}var ht=(()=>{let n=class n{constructor(){this._appointmentService=p(M),this._dialogRef=p(je),this._fb=p(I),this._destroyRef=p(j),this.statuses=[],this.form=this._fb.group({estadoid:["",[C.required]]})}updateStatus(){let{estadoid:s}=this.form.value;this._appointmentService.updateStatusAppointment(this.citaid,{estadoid:s||""}).pipe(v(this._destroyRef)).subscribe(()=>this._dialogRef.close({cancel:!1}))}close(){this._dialogRef.close({cancel:!0})}};n.\u0275fac=function(a){return new(a||n)},n.\u0275cmp=w({type:n,selectors:[["app-change-status-modal"]],inputs:{statuses:"statuses",citaid:"citaid"},standalone:!0,features:[E],decls:17,vars:2,consts:[["appWindow","","widthSize","tn"],[1,"d-flex","align-items-center","justify-content-center"],[1,"fs-5","fw-bold"],[1,"d-flex","flex-column","gap-3"],[3,"formGroup"],["placeholder","Seleccione un estado","formControlName","estadoid","fullWidth",""],[3,"value"],[1,"d-flex","gap-3"],["nbButton","","status","danger","fullWidth","",3,"click"],["icon","close-outline"],["nbButton","","status","info","fullWidth","",3,"click","disabled"],["icon","save-outline"]],template:function(a,d){a&1&&(t(0,"nb-card",0)(1,"nb-card-header",1)(2,"p",2),r(3,"Cambiar estado"),e()(),t(4,"nb-card-body",3)(5,"form",4)(6,"nb-select",5),S(7,Nt,2,2,"nb-option",6,xt),e()()(),t(9,"nb-card-footer")(10,"div",7)(11,"button",8),h("click",function(){return d.close()}),c(12,"nb-icon",9),r(13," Cerrar "),e(),t(14,"button",10),h("click",function(){return d.updateStatus()}),c(15,"nb-icon",11),r(16," Guardar "),e()()()()),a&2&&(l(5),m("formGroup",d.form),l(2),x(d.statuses),l(7),m("disabled",!d.form.valid))},dependencies:[F,K,z,q,Y,J,R,A,O,Ve,V,B,P,$,L,Ce,_e,he,ve,ct],encapsulation:2});let i=n;return i})();var wt=(i,n)=>n.medicoid,Et=(i,n)=>n.estadoid,_t=(i,n)=>n.citaid,Mt=()=>["calendar"],vt=i=>["/pages/appointments/edit",i];function kt(i,n){if(i&1&&(t(0,"nb-option",17),r(1),e()),i&2){let o=n.$implicit;m("value",o.medicoid),l(),u(o.nombre_completo)}}function Dt(i,n){if(i&1&&(t(0,"nb-option",17),r(1),e()),i&2){let o=n.$implicit;m("value",o.estadoid),l(),u(o.nombre)}}function Tt(i,n){if(i&1&&(t(0,"th"),r(1),D(2,"uppercase"),e()),i&2){let o=n.$implicit;l(),u(de(2,1,o))}}function It(i,n){if(i&1){let o=k();t(0,"tr",30)(1,"td"),r(2),e(),t(3,"td"),r(4),e(),t(5,"td"),r(6),e(),t(7,"td"),r(8),e(),t(9,"td"),r(10),e(),t(11,"td"),r(12),e(),t(13,"td",34),c(14,"nb-badge",35),e(),t(15,"td")(16,"div",36)(17,"button",37),c(18,"nb-icon",38),e(),t(19,"button",39),h("click",function(){let a=g(o).$implicit,d=N();return y(d.openStatusModal(a.citaid))}),c(20,"nb-icon",40),e()()()()}if(i&2){let o=n.$implicit;l(2),u(o.fecha),l(2),u(o.hora),l(2),u(o.paciente),l(2),u(o.medico),l(2),u(o.especialidad),l(2),u(o.edificio),l(2),m("text",o.estado)("status",o.estado_abreviatura==="PN"?"basic":o.estado_abreviatura==="CC"?"primary":o.estado_abreviatura==="DEL"?"danger":o.estado_abreviatura==="FIN"?"success":""),l(3),m("routerLink",Se(9,vt,o.citaid))}}function Ft(i,n){i&1&&(t(0,"tr",31)(1,"td",41),r(2,"No hay citas."),e()())}function Pt(i,n){if(i&1){let o=k();t(0,"tr")(1,"th"),r(2,"Fecha:"),e(),t(3,"td"),r(4),e()(),t(5,"tr")(6,"th"),r(7,"Hora:"),e(),t(8,"td"),r(9),e()(),t(10,"tr")(11,"th"),r(12,"Paciente:"),e(),t(13,"td"),r(14),e()(),t(15,"tr")(16,"th"),r(17,"M\xE9dico:"),e(),t(18,"td"),r(19),e()(),t(20,"tr")(21,"th"),r(22,"Especialidad:"),e(),t(23,"td"),r(24),e()(),t(25,"tr")(26,"th"),r(27,"Edificio:"),e(),t(28,"td"),r(29),e()(),t(30,"tr")(31,"th"),r(32,"Estado:"),e(),t(33,"td",34),c(34,"nb-badge",42),e()(),t(35,"tr",43)(36,"th"),r(37,"Acciones:"),e(),t(38,"td")(39,"div",22)(40,"button",44),r(41," Editar "),c(42,"nb-icon",38),e(),t(43,"button",45),h("click",function(){let a=g(o).$implicit,d=N();return y(d.openStatusModal(a.citaid))}),r(44," Cambiar estado "),c(45,"nb-icon",40),e()()()()}if(i&2){let o=n.$implicit;l(4),u(o.fecha),l(5),u(o.hora),l(5),u(o.paciente),l(5),u(o.medico),l(5),u(o.especialidad),l(5),u(o.edificio),l(5),m("text",o.estado)("status",o.estado_abreviatura==="PN"?"basic":o.estado_abreviatura==="CC"?"primary":o.estado_abreviatura==="DEL"?"danger":o.estado_abreviatura==="FIN"?"success":""),l(6),m("routerLink",Se(9,vt,o.citaid))}}var Ct=(()=>{let n=class n{get f(){return this.form.controls}constructor(){this._destroyRef=p(j),this._fb=p(I),this._datePipe=p(T),this._setupService=p(ge),this._appointmentService=p(M),this._dialogService=p(Q),this.tableHeadings=_(["Fecha","Hora","Paciente","M\xE9dico","Especialidad","Edificio","Estado","Acciones"]),this.doctors=G(this._setupService.getDoctors()),this.statuses=G(this._appointmentService.getStatuses()),this.appointments=_([]),this.form=this._fb.group({fecha_desde:["",[C.required]],fecha_hasta:["",[C.required]],medicoid:[""],paciente:[""],estadoid:[""]}),this.f.fecha_desde.setValue(new Date(new Date().getFullYear(),new Date().getMonth(),1)),this.f.fecha_hasta.setValue(new Date),this.subscribeForms(),this.getAppointments()}subscribeForms(){this.f.fecha_desde.valueChanges.pipe(v(this._destroyRef)).subscribe(s=>{this.f.fecha_hasta.value<s&&this.f.fecha_hasta.setValue(s)}),this.f.fecha_hasta.valueChanges.pipe(v(this._destroyRef)).subscribe(s=>{this.f.fecha_desde.value>s&&this.f.fecha_desde.setValue(s)})}getAppointments(){let s=U(W({},this.form.value),{fecha_desde:this._datePipe.transform(this.form.value.fecha_desde,"yyyy-MM-dd"),fecha_hasta:this._datePipe.transform(this.form.value.fecha_hasta,"yyyy-MM-dd")});this._appointmentService.getAppointments(s).pipe(v(this._destroyRef)).subscribe(a=>this.appointments.set(a))}openStatusModal(s){this._dialogService.open(ht,{context:{citaid:s,statuses:this.statuses()}}).onClose.subscribe(({cancel:d})=>{d||this.getAppointments()})}};n.\u0275fac=function(a){return new(a||n)},n.\u0275cmp=w({type:n,selectors:[["ng-component"]],standalone:!0,features:[E],decls:70,vars:6,consts:[["dateFromInput",""],["dateFromPicker",""],["dateToInput",""],["dateToPicker",""],[1,"border-0"],[1,"fs-4"],[1,"px-2","px-md-4"],[1,"row","g-3","mb-4",3,"formGroup"],[1,"col-md-6","col-xxl-3"],[1,"label","fs-7","mb-1"],[1,"d-flex","position-relative"],["nbInput","","placeholder","Fecha inicio","formControlName","fecha_desde","fullWidth","",3,"nbDatepicker"],["nbButton","","ghost","",1,"position-absolute","end-0",3,"click"],["icon","calendar-outline"],["nbInput","","placeholder","Fecha fin","formControlName","fecha_hasta","fullWidth","",3,"nbDatepicker"],["placeholder","Seleccione un m\xE9dico","formControlName","medicoid","fullWidth",""],["value",""],[3,"value"],["nbPrefix","","icon","search-outline"],["nbInput","","type","search","placeholder","Buscar paciente por nombre o dni","formControlName","paciente","fullWidth",""],["placeholder","Seleccione un estado","formControlName","estadoid","fullWidth",""],[1,"col-md-6","col-xxl-3","mt-md-auto"],[1,"d-flex","gap-2"],["nbButton","","status","primary","fullWidth","",3,"click"],["icon","options-2-outline"],["nbButton","","status","success",3,"routerLink"],[1,"table-responsive","d-none","d-lg-block"],[1,"table","table-borderless"],[1,"border-bottom","border-top"],[1,"text-center"],[1,"align-middle","text-center"],[1,"text-center","align-middle"],[1,"table-responsive","d-block","d-lg-none"],[1,"table","table-sm","table-bordered"],[1,"position-relative"],["position","top left",1,"center-badge",3,"text","status"],[1,"d-flex","gap-2","justify-content-center"],["nbButton","","size","small","nbTooltip","Editar",3,"routerLink"],["icon","edit-outline"],["nbButton","","size","small","status","info","nbTooltip","Cambiar estado",3,"click"],["icon","options-outline"],["colspan","8"],["position","center left",1,"ms-1",3,"text","status"],[1,"align-middle","last-row"],["nbButton","","size","tiny",3,"routerLink"],["nbButton","","size","tiny","status","info",3,"click"]],template:function(a,d){if(a&1){let b=k();t(0,"nb-card",4)(1,"nb-card-header",4)(2,"span",5),r(3,"Registro de citas"),e()(),t(4,"nb-card-body",6)(5,"form",7)(6,"div",8)(7,"label",9),r(8,"Desde: "),e(),t(9,"div",10),c(10,"input",11,0),t(12,"button",12),h("click",function(){g(b);let X=H(11);return y(X.click())}),c(13,"nb-icon",13),e(),c(14,"nb-datepicker",null,1),e()(),t(16,"div",8)(17,"label",9),r(18,"Hasta: "),e(),t(19,"div",10),c(20,"input",14,2),t(22,"button",12),h("click",function(){g(b);let X=H(21);return y(X.click())}),c(23,"nb-icon",13),e(),c(24,"nb-datepicker",null,3),e()(),t(26,"div",8)(27,"label",9),r(28,"M\xE9dico: "),e(),t(29,"nb-select",15)(30,"nb-option",16),r(31,"Todos"),e(),S(32,kt,2,2,"nb-option",17,wt),e()(),t(34,"div",8)(35,"label",9),r(36,"Paciente: "),e(),t(37,"nb-form-field"),c(38,"nb-icon",18)(39,"input",19),e()(),t(40,"div",8)(41,"label",9),r(42,"Estado: "),e(),t(43,"nb-select",20)(44,"nb-option",16),r(45,"Todos"),e(),S(46,Dt,2,2,"nb-option",17,Et),e()(),t(48,"div",21)(49,"div",22)(50,"button",23),h("click",function(){return g(b),y(d.getAppointments())}),r(51," Filtrar "),c(52,"nb-icon",24),e(),t(53,"button",25),c(54,"nb-icon",13),e()()()(),t(55,"div",26)(56,"table",27)(57,"thead",28)(58,"tr",29),S(59,Tt,3,3,"th",null,we),e()(),t(61,"tbody"),S(62,It,21,11,"tr",30,_t,!1,Ft,3,0,"tr",31),e()()(),t(65,"div",32)(66,"table",33)(67,"tbody"),S(68,Pt,46,11,null,null,_t),e()()()()()}if(a&2){let b=H(15),f=H(25);l(5),m("formGroup",d.form),l(5),m("nbDatepicker",b),l(10),m("nbDatepicker",f),l(12),x(d.doctors()),l(14),x(d.statuses()),l(7),m("routerLink",le(5,Mt)),l(6),x(d.tableHeadings()),l(3),x(d.appointments()),l(6),x(d.appointments())}},dependencies:[Me,F,K,pe,z,q,Y,J,ce,He,We,$,L,R,A,O,V,Ze,Le,$e,Je,Ye,Ke,B,P,fe,ue,be,ve,he,Ce,_e,me,qe,ze],styles:[".status[_ngcontent-%COMP%]:hover{cursor:pointer;background:#f5f5f5}"]});let i=n;return i})();var Bt=(i,n)=>n.tiposervicioid,Vt=(i,n)=>n.medicoid,Ot=(i,n)=>n.especialidadid,At=(i,n)=>n.tipotratamientoid;function Rt(i,n){if(i&1&&(t(0,"small",14),c(1,"nb-icon",35),t(2,"span",36),r(3),e()()),i&2){let o=N();l(3),u(o.pacient())}}function Lt(i,n){if(i&1&&(t(0,"nb-radio",19),r(1),e()),i&2){let o=n.$implicit;m("value",o.tiposervicioid),l(),u(o.nombre)}}function $t(i,n){if(i&1&&(t(0,"nb-radio",19),r(1),e()),i&2){let o=n.$implicit;m("value",o.especialidadid),l(),oe(" ",o.nombre," ")}}function Wt(i,n){if(i&1&&(t(0,"div")(1,"p",16),r(2,"Especialidades"),e()(),t(3,"nb-radio-group",37),S(4,$t,2,2,"nb-radio",19,Ot),e()),i&2){let o=N();l(4),x(o.typesSpecialities())}}function Ht(i,n){if(i&1&&(t(0,"nb-radio",19),r(1),e()),i&2){let o=n.$implicit;m("value",o.tipotratamientoid),l(),oe(" ",o.nombre," ")}}function Gt(i,n){if(i&1&&(t(0,"div")(1,"p",16),r(2,"Tratamientos"),e()(),t(3,"nb-radio-group",38),S(4,Ht,2,2,"nb-radio",19,At),e()),i&2){let o=N();l(4),x(o.typesTreatments())}}function Ut(i,n){if(i&1&&(t(0,"nb-radio",19),c(1,"nb-user",39),e()),i&2){let o=n.$implicit;m("value",o.medicoid),l(),m("name",o.nombre_completo)("title",o.especialidad)}}function jt(i,n){i&1&&c(0,"input",28)}function zt(i,n){if(i&1&&(t(0,"p",21),r(1),D(2,"currency"),e()),i&2){let o=N();l(),oe("Costo: S/. ",ee(2,1,o.cost()," "),"")}}function qt(i,n){if(i&1){let o=k();t(0,"button",40),h("click",function(){g(o);let a=N();return y(a.saveCost())}),c(1,"nb-icon",41),e(),t(2,"button",42),h("click",function(){g(o);let a=N();return y(a.toggleCostInput())}),c(3,"nb-icon",43),e()}}function Kt(i,n){if(i&1){let o=k();t(0,"button",44),h("click",function(){g(o);let a=N();return y(a.toggleCostInput())}),c(1,"nb-icon",45),e()}}var Ne=(()=>{let n=class n{constructor(){this._destroyRef=p(j),this._dialogService=p(Q),this._activatedRoute=p(Te),this._setupService=p(ge),this._fb=p(I),this._datePipe=p(T),this._appointmentService=p(M),this.selectedDate$=_(new Date),this.today=_(new Date),this.appointment=G(this._activatedRoute.data.pipe(ie(a=>a.appoinment))),this.pacient=_(""),this.pacientId=_(0),this.typesServices=_([]),this.typesSpecialities=_([]),this.typesTreatments=_([]),this.doctors=_([]),this.cost=_(0),this.showCostInput=_(!1),this.form=this._fb.group({dni:["",[C.required,C.minLength(8),C.maxLength(8),C.pattern("^[0-9]*$")]],tiposervicioid:["",[C.required]],especialidadid:["",[C.required]],tipotratamientoid:[""],medicoid:["",[C.required]],hora:["",[C.required]],costo:[""],observacion:[""]}),this.today().setHours(0,0,0,0);let s=this._activatedRoute.snapshot.queryParams.date;s&&this.selectedDate$.set(new Date(s)),this.getTypesServices(),this.subscribeForms()}get f(){return this.form.controls}get selectedDate(){return this.selectedDate$()}set selectedDate(s){this.selectedDate$.set(s)}subscribeForms(){this.f.tiposervicioid.valueChanges.subscribe(s=>{s===1&&this.getTypesSpecialties(),s===2&&this.getTypesTreatments()}),this.f.tipotratamientoid.valueChanges.subscribe(s=>{this.doctors.set([]),s===3&&this.getDoctors(s)}),this.f.especialidadid.valueChanges.subscribe(s=>{this.doctors.set([]),s===1&&this.getDoctors(s)}),this.f.medicoid.valueChanges.subscribe(s=>{s&&this.getCost()})}getPersonByDNI(){let s=this.f.dni.value;!s||s.length!==8||this._setupService.getPersonByDNI(s).pipe(v(this._destroyRef)).subscribe(a=>{a&&a.personaid&&(this.f.dni.setValue(a.dni),this.pacient.set(a.ape_pat+" "+a.ape_mat+" "+a.nombre),this.pacientId.set(a.personaid))})}searchByDNI(){this.pacient.set(""),this.getPersonByDNI()}getTypesServices(){this._setupService.getTypesServices().pipe(v(this._destroyRef)).subscribe(s=>{this.typesServices.set(s);let a=s[0].tiposervicioid||"";this.f.tiposervicioid.setValue(a),this.appointment()&&(this.selectedDate$.set(new Date(this.appointment().fecha)),this.pacient.set(`${this.appointment().ape_pat_paciente} ${this.appointment().ape_mat_paciente} ${this.appointment().nombre_paciente}`),this.pacientId.set(this.appointment().pacienteid),this.form.patchValue({dni:this.appointment().dni_paciente,tiposervicioid:this.appointment().tiposervicioid,especialidadid:this.appointment().especialidadid,medicoid:this.appointment().medicoid,hora:new Date(`${this.appointment().fecha} ${this.appointment().hora}`),costo:this.appointment().costo,observacion:this.appointment().observacion}))})}getTypesSpecialties(){this._setupService.getTypesSpecialities().pipe(v(this._destroyRef)).subscribe(s=>this.typesSpecialities.set(s))}getTypesTreatments(){this._setupService.getTypesTreatments().pipe(v(this._destroyRef)).subscribe(s=>this.typesTreatments.set(s))}getDoctors(s){this._setupService.getDoctors().pipe(v(this._destroyRef)).subscribe(a=>this.doctors.set(a))}getCost(){let s={tiposervicioid:this.f.tiposervicioid.value,medicoid:this.f.medicoid.value,especialidadid:this.f.especialidadid.value};this._setupService.getCost(s).pipe(v(this._destroyRef)).subscribe(a=>this.cost.set(a.costo))}toggleCostInput(){this.showCostInput.set(!this.showCostInput()),this.f.costo.setValue(Number(this.cost()))}saveCost(){this.showCostInput.set(!1),this.cost.set(this.f.costo.value)}saveAppointment(){let s=U(W({},this.form.value),{pacienteid:this.pacientId(),fecha:this._datePipe.transform(this.selectedDate,"yyyy-MM-dd"),hora:this._datePipe.transform(this.f.hora.value,"HH:mm:ss"),costo:Number(this.cost())});this.appointment()?this._appointmentService.updateAppointment(this.appointment().citaid,s).pipe(v(this._destroyRef)).subscribe(a=>this._dialogService.open(te,{context:{detail:a,id:a.citaid}})):this._appointmentService.addAppointment(s).pipe(v(this._destroyRef)).subscribe(a=>this._dialogService.open(te,{context:{detail:a,id:a.citaid}}))}};n.\u0275fac=function(a){return new(a||n)},n.\u0275cmp=w({type:n,selectors:[["ng-component"]],standalone:!0,features:[E],decls:64,vars:10,consts:[["timepicker","nbTimepicker"],[1,"border-0"],[1,"border-0","px-2","px-md-4"],[1,"fs-4"],[1,"py-0","px-2","px-md-4"],[1,"row","m-0","g-3",3,"formGroup"],[1,"col-md-6","px-0","pe-md-2","pe-lg-3","pe-xl-4"],[1,"d-flex","flex-column","gap-4"],[1,"fw-medium","mb-2","text-black","d-block","required"],[1,"d-flex","gap-2"],["type","text","nbInput","","placeholder","00000000","formControlName","dni","minlength","8","maxlength","8","fullWidth",""],["nbButton","",3,"click","disabled"],["icon","refresh-outline"],["controlName","dni"],[1,"fw-medium"],[1,"d-flex","flex-column","gap-1"],[1,"fs-6","fw-medium"],[1,"fs-7","text-black-50"],["name","tiposervicioid","formControlName","tiposervicioid","status","success",1,"d-flex","flex-wrap","gap-3"],[3,"value"],[1,"d-flex","flex-column","gap-3"],[1,"fs-6","fw-semibold"],["status","success","formControlName","medicoid"],[1,"col-md-6","px-0","ps-md-2","ps-lg-3","ps-xl-4"],[1,"d-flex","justify-content-center",3,"dateChange","date","min"],["nbInput","","type","text","formControlName","hora","placeholder","00:00 AM/PM","fullWidth","",3,"nbTimepicker"],["twelveHoursFormat",""],[1,"d-flex","align-items-center","justify-content-center","border","py-3"],["nbInput","","fieldSize","small","formControlName","costo","type","text"],["nbButton","","ghost","","status","info","size","small",1,"ms-2"],["nbInput","","fullWidth","","placeholder","Observaci\xF3n...","formControlName","observacion","rows","3"],[1,"row","g-2"],[1,"col-md-6"],["nbButton","","fullWidth",""],["nbButton","","status","primary","fullWidth","",3,"click","disabled"],["icon","done-all-outline","status","success",2,"font-size","0.9rem"],[1,"text-secondary"],["name","especialidadid","formControlName","especialidadid","status","success",1,"d-flex","flex-wrap","gap-3"],["name","tipotratamientoid","formControlName","tipotratamientoid","status","success",1,"d-flex","flex-wrap","gap-3"],[3,"name","title"],["nbButton","","ghost","","status","primary","size","small",1,"ms-2",3,"click"],["icon","save-outline"],["nbButton","","ghost","","status","danger","type","button","size","small",1,"ms-2",3,"click"],["icon","close-outline"],["nbButton","","ghost","","status","info","size","small",1,"ms-2",3,"click"],["icon","edit-outline"]],template:function(a,d){if(a&1){let b=k();t(0,"nb-card",1)(1,"nb-card-header",2)(2,"span",3),r(3,"Crear nueva cita"),e()(),t(4,"nb-card-body",4)(5,"form",5)(6,"div",6)(7,"div",7)(8,"div")(9,"p",8),r(10,"Paciente"),e(),t(11,"div",9),c(12,"input",10),t(13,"button",11),h("click",function(){return g(b),y(d.searchByDNI())}),c(14,"nb-icon",12),e()(),c(15,"control-error",13),ne(16,Rt,4,1,"small",14),e(),t(17,"div",15)(18,"p",16),r(19,"\xBFC\xF3mo podemos apoyarte?"),e(),t(20,"p",17),r(21,"Consultas con el mejor staff altamente calificado"),e()(),t(22,"nb-radio-group",18),S(23,Lt,2,2,"nb-radio",19,Bt),e(),ne(25,Wt,6,0)(26,Gt,6,0),t(27,"div",20)(28,"p",21),r(29,"Escoge a tu especialista"),e(),t(30,"nb-radio-group",22),S(31,Ut,2,3,"nb-radio",19,Vt),e()()()(),t(33,"div",23)(34,"div",7)(35,"p",21),r(36,"Selecciona la fecha de tu cita"),e(),t(37,"nb-calendar",24),h("dateChange",function(X){return g(b),y(d.selectedDate=X)}),e(),t(38,"p",21),r(39,"Selecciona el horario de tu cita"),e(),t(40,"div"),c(41,"input",25)(42,"nb-timepicker",26,0),e(),t(44,"div",15)(45,"p",21),r(46,"Resumen"),e(),t(47,"p",17),r(48,"Lorem ipsum dolor sit amet."),e()(),t(49,"div",27),ne(50,jt,1,0,"input",28)(51,zt,3,4,"p",21)(52,qt,4,0)(53,Kt,2,0,"button",29),e(),t(54,"p",21),r(55,"Observaci\xF3n"),e(),c(56,"textarea",30),t(57,"div",31)(58,"div",32)(59,"button",33),r(60,"Cancelar"),e()(),t(61,"div",32)(62,"button",34),h("click",function(){return g(b),y(d.saveAppointment())}),r(63," Guardar "),e()()()()()()()()}if(a&2){let b=H(43);l(5),m("formGroup",d.form),l(8),m("disabled",d.f.dni.invalid),l(3),Z(d.pacient()?16:-1),l(7),x(d.typesServices()),l(2),Z(d.f.tiposervicioid.value===1?25:d.f.tiposervicioid.value===2?26:-1),l(6),x(d.doctors()),l(6),m("date",d.selectedDate)("min",d.today()),l(4),m("nbTimepicker",b),l(9),Z(d.showCostInput()?50:51),l(2),Z(d.showCostInput()?52:53),l(10),m("disabled",!d.form.valid)}},dependencies:[F,K,pe,z,q,Pe,Be,Y,J,ke,$,L,Ae,Oe,R,A,O,V,Ue,B,P,fe,ue,be,it,et,tt,Xe,Re,Qe,me,Ge,nt,dt],styles:["[_nghost-%COMP%]   nb-calendar[_ngcontent-%COMP%]     nb-base-calendar{max-width:100%}[_nghost-%COMP%]   nb-calendar[_ngcontent-%COMP%]     nb-card{max-width:100%}"]});let i=n;return i})();var tn=[{path:"",component:ut,children:[{path:"",component:Ct},{path:"calendar",component:ft,data:{breadcrumb:"Calendario"}},{path:"new",component:Ne,data:{breadcrumb:"Nueva cita"}},{path:"edit/:citaid",component:Ne,data:{breadcrumb:"Editar cita"},resolve:{appoinment:i=>{let n=p(M),o=i.params.citaid;return n.getAppointmentById(o)}}},{path:"",pathMatch:"full",redirectTo:""}]}];export{tn as APPOINTMENTS_ROUTES};
