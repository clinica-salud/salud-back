import{M as o}from"./chunk-UONBX2GK.js";var n=e=>e.split("/").pop();var t={required:()=>"Este campo es requerido.",minlength:({requiredLength:e,_:r})=>`Este campo debe tener un minimo de ${e} caracteres.`,maxlength:({requiredLength:e,_:r})=>`Este campo debe tener un maximo de ${e} caracteres.`,email:()=>"Email no es valido."},i=new o("FORM_ERRORS",{providedIn:"root",factory:()=>t});export{n as a,i as b};