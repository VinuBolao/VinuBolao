import{R as t,r as g,d as b}from"./app.ccdda4e7.js";import{d as O,A as G,a as H,b as J,C as K,c as Q,E as W,L as Y}from"./helpers.1e5d47d2.js";const Z=({jogo:n,list:u,handleClose:N})=>{var i,h;const x=(s,c,r)=>{let o="w-[30%] text-center rounded-md";const C=s!==null,k=c!==null,P=r&&r.palpite_casa!==null,m=r&&r.palpite_fora!==null;if(C&&k&&P&&m){const E=r.palpite_casa,f=r.palpite_fora,S=s===r.palpite_casa,_=c===r.palpite_fora,y=s>c&&E>f,v=c>s&&f>E;S&&_?o+=" bg-green-100 dark:bg-green-400 dark:text-slate-800":(y||v||s===c&&E===f)&&(o+=" bg-yellow-50 dark:bg-yellow-500 dark:text-slate-800")}return o};return t.createElement("div",{className:"absolute grid place-content-center inset-0 w-full h-screen bg-[#000000bf] z-[100]"},t.createElement("div",{className:"w-[90vw] sm:w-[600px] bg-white dark:bg-slate-800 shadow-md rounded-t-xl rounded-b-lg text-gray-600 dark:text-slate-300"},t.createElement("h1",{className:"flex justify-between font-bold text-xl text-center bg-slate-800 dark:bg-slate-900 text-white p-4 rounded-t-lg"},t.createElement("span",{className:""}),t.createElement("span",{className:"flex items-center justify-center"},`${((i=n==null?void 0:n.timecasa)==null?void 0:i.nome)||""} vs ${((h=n==null?void 0:n.timefora)==null?void 0:h.nome)||""}`),t.createElement("span",{className:""},t.createElement("button",{onClick:()=>N(null),className:"p-2 bg-gray-100 rounded-[50%] text-slate-800"},O))),t.createElement("ul",{className:"h-[80vh] divide-y overflow-y-auto py-2 px-4"},u.map((s,c)=>t.createElement("li",{key:c,className:"flex justify-between p-2 font-bold border-gray-700"},t.createElement("div",{className:"w-[10%]"},c+1),t.createElement("div",{className:"w-[60%]"},s.user.name),t.createElement("div",{className:x(n.placar_casa,n.placar_fora,s)},s.palpite_casa," x ",s.palpite_fora))))))},te=({user:n,bolao:u,compare:N,jogos:x,rodada:i,participantes:h,selected:s})=>{const[c,r]=g.exports.useState(!1),[o,C]=g.exports.useState(!1),[k,P]=g.exports.useState(!1),[m,E]=g.exports.useState({jogo:0,casa:null,fora:null}),f=(e,a)=>{(m.jogo===0||a.id===m.jogo)&&E({...m,jogo:a.id,[e.target.name.split("_")[1]]:+e.target.value})},S=e=>{if(e.target.value>0){let a=`/palpites?participante=${e.target.value}`;window.location.search.includes("rodada")&&(a+=`&rodada=${i}`),b.Inertia.get(a,{},{preserveScroll:!0})}},_=(e,a)=>{a.id===m.jogo&&m.casa!==null&&m.fora!==null&&F(a)},y=e=>{e?(P(e),b.Inertia.get(`/palpites?rodada=${i}&compare=${e.id}`,{},{preserveState:!0})):b.Inertia.get(`/palpites?rodada=${i}`)},v=e=>{if(e>0){let a=`/palpites?rodada=${e}`;C(!1),window.location.search.includes("participante")&&(a+=`&participante=${s}`),b.Inertia.get(a,{},{preserveScroll:!0})}},F=e=>{const a={jogo_id:e.id,user_id:n.id,inicio_jogo:e.inicio,palpite_casa:m.casa,palpite_fora:m.fora};e.palpite?b.Inertia.visit(`/palpites/${e.palpite.id}`,{method:"PUT",data:a,preserveScroll:!0,onStart:()=>r(!0),onFinish:()=>r(!1)}):b.Inertia.visit("/palpites",{method:"POST",data:a,preserveScroll:!0,onStart:()=>r(!0),onFinish:()=>r(!1)})},I=({palpite:e,inicio_timestamp:a})=>{const l=e&&e.palpite_casa!==null,d=e&&e.palpite_fora!==null;return!!(!l&&!d&&w(a))},q=({palpite:e},a)=>{const l=n.id===+s,d=e===null||e[`palpite_${a}`]===null;return l&&d},w=e=>new Date().getTime()>e*1e3,R=e=>{if(n.id===+s&&e.palpite){const a=e.palpite.palpite_casa!==null,l=e.palpite.palpite_fora!==null;if((a||l)&&!w(e.inicio_timestamp))return!0}return!1},T=e=>{if(n.id===+s&&e.palpite){const a=e.palpite.palpite_casa!==null,l=e.palpite.palpite_fora!==null;if(a&&l&&w(e.inicio_timestamp))return!0}return!1},L=({placar_casa:e,placar_fora:a,palpite:l})=>{const d=e!==null,p=a!==null,B=l&&l.palpite_casa!==null,D=l&&l.palpite_fora!==null;if(d&&p&&B&&D){const $=l.palpite_casa,A=l.palpite_fora,X=e===l.palpite_casa,z=a===l.palpite_fora,U=e>a&&$>A,V=a>e&&A>$,M=e===a&&$===A;if(X&&z)return"flex flex-col gap-1 bg-green-100 dark:bg-green-400 dark:text-slate-800";if(U||V||M)return"flex flex-col gap-1 bg-yellow-50 dark:bg-yellow-500 dark:text-slate-800"}else return"flex flex-col gap-1"};return t.createElement(t.Fragment,null,t.createElement("div",{className:"bg-white dark:bg-slate-800 text-gray-600 dark:text-slate-300 overflow-hidden shadow-sm sm:rounded-lg"},(x.length>0||i>0)&&t.createElement("div",{className:"flex flex-wrap-reverse items-center justify-between"},t.createElement("div",null,t.createElement("div",{className:o?"vb-btn-group open":"vb-btn-group"},t.createElement("button",{onClick:()=>v(+i-1),disabled:+i==1},G),t.createElement("button",{onClick:()=>C(!o)},t.createElement("span",{className:"flex items-center justify-center"},i,"\xAA Rodada ",H)),t.createElement("button",{onClick:()=>v(+i+1),disabled:u.qtd_rodadas===+i},J)),o&&t.createElement("div",{className:"vb-dropdown"},[...Array(u.qtd_rodadas).keys()].map((e,a)=>t.createElement("button",{key:a,onClick:()=>v(e+1)},e+1,"\xAA")))),t.createElement("div",{className:"w-[18.5rem] p-3 pb-0 sm:px-6 sm:pt-6"},t.createElement("select",{name:"users",onChange:S,defaultValue:s,className:"vb-custom-input dark:bg-slate-800"},h.map((e,a)=>t.createElement("option",{key:a,value:e.user_id},e.name))))),x.length>0?t.createElement("div",{className:"p-3 sm:p-6 border-gray-200"},t.createElement("div",{className:"flex justify-between flex-row border-b-2 p-2 font-bold bg-slate-800 dark:bg-slate-900 text-white rounded-t-lg dark:border-slate-500"},t.createElement("div",{className:"px-2 text-center"},"Status"),t.createElement("div",{className:"px-2 flex text-center truncate"},"Palpites"),t.createElement("div",{className:"px-2 text-center"},"A\xE7\xF5es")),x.map((e,a)=>{var l,d;return t.createElement("div",{key:a,className:L(e)},t.createElement("div",{className:"flex text-sm justify-center pt-2 gap-1"},t.createElement("strong",{className:"capitalize"},c?"Salvando...":e.inicio_format)),t.createElement("div",{className:"flex px-2 items-center justify-between border-b-2 pb-2 gap-2 dark:border-slate-500"},t.createElement("div",{className:"text-center"},e.palpite&&(e.palpite.palpite_casa!==null||e.palpite.palpite_fora!==null)?K:Q),t.createElement("div",{className:"flex items-center justify-center gap-2"},t.createElement("div",{className:"flex items-center gap-2"},t.createElement("span",{className:"vb-sigla-time"},e.timecasa.sigla),t.createElement("span",{className:"w-28 hidden sm:flex justify-end truncate"},e.timecasa.nome),t.createElement("img",{alt:e.timecasa.nome,className:"vb-escudo-time",src:e.timecasa.escudo_url})),t.createElement("div",{className:"flex items-center gap-2"},q(e,"casa")?t.createElement("input",{min:"0",type:"number",name:"palpite_casa",className:"vb-input-jogos",onBlur:p=>_(p,e),disabled:c||I(e),onChange:p=>f(p,e)}):t.createElement("span",{className:"vb-placar-number"},n.id!==+s&&!w(e.inicio_timestamp)?e.palpite?"X":"":(l=e==null?void 0:e.palpite)==null?void 0:l.palpite_casa),t.createElement("span",null,"x"),n.id===+s&&I(e)&&t.createElement("strong",{className:"vb-expired"},"Esgotado!"),q(e,"fora")?t.createElement("input",{min:"0",type:"number",name:"palpite_fora",className:"vb-input-jogos",onBlur:p=>_(p,e),disabled:c||I(e),onChange:p=>f(p,e)}):t.createElement("span",{className:"vb-placar-number"},n.id!==+s&&!w(e.inicio_timestamp)?e.palpite?"X":"":(d=e==null?void 0:e.palpite)==null?void 0:d.palpite_fora)),t.createElement("div",{className:"flex items-center gap-2"},t.createElement("img",{alt:e.timefora.nome,className:"vb-escudo-time",src:e.timefora.escudo_url}),t.createElement("span",{className:"w-28 hidden sm:flex truncate"},e.timefora.nome),t.createElement("span",{className:"vb-sigla-time"},e.timefora.sigla))),t.createElement("div",{className:"w-6"},R(e)&&t.createElement("button",{onClick:()=>F(e)},W),T(e)&&t.createElement("button",{onClick:()=>y(e)},Y))))}),t.createElement("div",{className:"pt-9"},t.createElement("h4",{className:"font-bold text-lg pb-1"},"Legenda"),t.createElement("div",{className:"flex items-center gap-1"},t.createElement("span",{className:"w-4 h-4 bg-green-100 border-[1px] border-gray-400"}),t.createElement("p",null,"- Placar Exato (",u.placar_exato," pontos)")),t.createElement("div",{className:"flex items-center gap-1"},t.createElement("span",{className:"w-4 h-4 bg-yellow-50 border-[1px] border-gray-400"}),t.createElement("p",null,"- Placar Vencedor (",u.placar_vencedor," pontos)")))):t.createElement("div",{id:"box-empty"},"N\xE3o existem dados para listar!")),N.length>0&&t.createElement(Z,{jogo:k,list:N,handleClose:y}))};export{te as default};
