import{H as b,J as y,O as i,U as u,_ as o,ib as h,j as d,na as c}from"./chunk-UONBX2GK.js";function p(r){r||(u(p),r=i(o));let e=new d(n=>r.onDestroy(n.next.bind(n)));return n=>n.pipe(b(e))}function f(r,e){let n=!e?.manualCleanup;n&&!e?.injector&&u(f);let a=n?e?.injector?.get(o)??i(o):null,s;e?.requireSync?s=c({kind:0}):s=c({kind:1,value:e?.initialValue});let l=r.subscribe({next:t=>s.set({kind:1,value:t}),error:t=>{if(e?.rejectErrors)throw t;s.set({kind:2,error:t})}});return a?.onDestroy(l.unsubscribe.bind(l)),h(()=>{let t=s();switch(t.kind){case 1:return t.value;case 2:throw t.error;case 0:throw new y(601,"`toSignal()` called with `requireSync` but `Observable` did not emit synchronously.")}})}export{p as a,f as b};
