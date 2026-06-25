import{s as ie,a as ae}from"./index-uZUg6blK.js";import{s as re}from"./index-Bbla8W1r.js";import{s as le}from"./index-CrmvI-Ku.js";import{s as se}from"./index-aP6Kw_Dw.js";import{B as J,c as y,b as C,g as f,m as j,k as T,n as k,p as q,t as L,q as ce,v as W,x as de,y as ue,a as r,i as P,j as F,d as m,w as B,z as N,h as pe,A as me,r as I,o as fe,s as he,f as E,C as be,D as ge,e as ye}from"./index-BGqQTzru.js";import{s as ve}from"./index-DtcQr_ih.js";import{s as ke}from"./index-Bfz3qw2I.js";import"./index-3XY2O1f6.js";import"./index-B6ttfFHG.js";import"./index-tQy_CBpL.js";import"./index-D_Ng0OJW.js";import"./index-Da9mP3g0.js";var we=`
    .p-chip {
        display: inline-flex;
        align-items: center;
        background: dt('chip.background');
        color: dt('chip.color');
        border-radius: dt('chip.border.radius');
        padding-block: dt('chip.padding.y');
        padding-inline: dt('chip.padding.x');
        gap: dt('chip.gap');
    }

    .p-chip-icon {
        color: dt('chip.icon.color');
        font-size: dt('chip.icon.font.size');
        width: dt('chip.icon.size');
        height: dt('chip.icon.size');
    }

    .p-chip-image {
        border-radius: 50%;
        width: dt('chip.image.width');
        height: dt('chip.image.height');
        margin-inline-start: calc(-1 * dt('chip.padding.y'));
    }

    .p-chip:has(.p-chip-remove-icon) {
        padding-inline-end: dt('chip.padding.y');
    }

    .p-chip:has(.p-chip-image) {
        padding-block-start: calc(dt('chip.padding.y') / 2);
        padding-block-end: calc(dt('chip.padding.y') / 2);
    }

    .p-chip-remove-icon {
        cursor: pointer;
        font-size: dt('chip.remove.icon.size');
        width: dt('chip.remove.icon.size');
        height: dt('chip.remove.icon.size');
        color: dt('chip.remove.icon.color');
        border-radius: 50%;
        transition:
            outline-color dt('chip.transition.duration'),
            box-shadow dt('chip.transition.duration');
        outline-color: transparent;
    }

    .p-chip-remove-icon:focus-visible {
        box-shadow: dt('chip.remove.icon.focus.ring.shadow');
        outline: dt('chip.remove.icon.focus.ring.width') dt('chip.remove.icon.focus.ring.style') dt('chip.remove.icon.focus.ring.color');
        outline-offset: dt('chip.remove.icon.focus.ring.offset');
    }
`,Ie={root:"p-chip p-component",image:"p-chip-image",icon:"p-chip-icon",label:"p-chip-label",removeIcon:"p-chip-remove-icon"},xe=J.extend({name:"chip",style:we,classes:Ie}),Ce={name:"BaseChip",extends:W,props:{label:{type:[String,Number],default:null},icon:{type:String,default:null},image:{type:String,default:null},removable:{type:Boolean,default:!1},removeIcon:{type:String,default:void 0}},style:xe,provide:function(){return{$pcChip:this,$parentInstance:this}}},G={name:"Chip",extends:Ce,inheritAttrs:!1,emits:["remove"],data:function(){return{visible:!0}},methods:{onKeydown:function(n){(n.key==="Enter"||n.key==="Backspace")&&this.close(n)},close:function(n){this.visible=!1,this.$emit("remove",n)}},computed:{dataP:function(){return de({removable:this.removable})}},components:{TimesCircleIcon:ce}},Se=["aria-label","data-p"],Ve=["src"];function Oe(e,n,t,a,s,i){return s.visible?(f(),y("div",k({key:0,class:e.cx("root"),"aria-label":e.label},e.ptmi("root"),{"data-p":i.dataP}),[j(e.$slots,"default",{},function(){return[e.image?(f(),y("img",k({key:0,src:e.image},e.ptm("image"),{class:e.cx("image")}),null,16,Ve)):e.$slots.icon?(f(),T(q(e.$slots.icon),k({key:1,class:e.cx("icon")},e.ptm("icon")),null,16,["class"])):e.icon?(f(),y("span",k({key:2,class:[e.cx("icon"),e.icon]},e.ptm("icon")),null,16)):C("",!0),e.label!==null?(f(),y("div",k({key:3,class:e.cx("label")},e.ptm("label")),L(e.label),17)):C("",!0)]}),e.removable?j(e.$slots,"removeicon",{key:0,removeCallback:i.close,keydownCallback:i.onKeydown},function(){return[(f(),T(q(e.removeIcon?"span":"TimesCircleIcon"),k({class:[e.cx("removeIcon"),e.removeIcon],onClick:i.close,onKeydown:i.onKeydown},e.ptm("removeIcon")),null,16,["class","onClick","onKeydown"]))]}):C("",!0)],16,Se)):C("",!0)}G.render=Oe;var Be=`
    .p-inputchips {
        display: inline-flex;
    }

    .p-inputchips-input {
        margin: 0;
        list-style-type: none;
        cursor: text;
        overflow: hidden;
        display: flex;
        align-items: center;
        flex-wrap: wrap;
        padding: calc(dt('inputchips.padding.y') / 2) dt('inputchips.padding.x');
        gap: calc(dt('inputchips.padding.y') / 2);
        color: dt('inputchips.color');
        background: dt('inputchips.background');
        border: 1px solid dt('inputchips.border.color');
        border-radius: dt('inputchips.border.radius');
        width: 100%;
        transition:
            background dt('inputchips.transition.duration'),
            color dt('inputchips.transition.duration'),
            border-color dt('inputchips.transition.duration'),
            outline-color dt('inputchips.transition.duration'),
            box-shadow dt('inputchips.transition.duration');
        outline-color: transparent;
        box-shadow: dt('inputchips.shadow');
    }

    .p-inputchips:not(.p-disabled):hover .p-inputchips-input {
        border-color: dt('inputchips.hover.border.color');
    }

    .p-inputchips:not(.p-disabled).p-focus .p-inputchips-input {
        border-color: dt('inputchips.focus.border.color');
        box-shadow: dt('inputchips.focus.ring.shadow');
        outline: dt('inputchips.focus.ring.width') dt('inputchips.focus.ring.style') dt('inputchips.focus.ring.color');
        outline-offset: dt('inputchips.focus.ring.offset');
    }

    .p-inputchips.p-invalid .p-inputchips-input {
        border-color: dt('inputchips.invalid.border.color');
    }

    .p-variant-filled.p-inputchips-input {
        background: dt('inputchips.filled.background');
    }

    .p-inputchips:not(.p-disabled).p-focus .p-variant-filled.p-inputchips-input {
        background: dt('inputchips.filled.focus.background');
    }

    .p-inputchips.p-disabled .p-inputchips-input {
        opacity: 1;
        background: dt('inputchips.disabled.background');
        color: dt('inputchips.disabled.color');
    }

    .p-inputchips-chip.p-chip {
        padding-top: calc(dt('inputchips.padding.y') / 2);
        padding-bottom: calc(dt('inputchips.padding.y') / 2);
        border-radius: dt('inputchips.chip.border.radius');
        transition:
            background dt('inputchips.transition.duration'),
            color dt('inputchips.transition.duration');
    }

    .p-inputchips-chip-item.p-focus .p-inputchips-chip {
        background: dt('inputchips.chip.focus.background');
        color: dt('inputchips.chip.focus.color');
    }

    .p-inputchips-input:has(.p-inputchips-chip) {
        padding-left: calc(dt('inputchips.padding.y') / 2);
        padding-right: calc(dt('inputchips.padding.y') / 2);
    }

    .p-inputchips-input-item {
        flex: 1 1 auto;
        display: inline-flex;
        padding-top: calc(dt('inputchips.padding.y') / 2);
        padding-bottom: calc(dt('inputchips.padding.y') / 2);
    }

    .p-inputchips-input-item input {
        border: 0 none;
        outline: 0 none;
        background: transparent;
        margin: 0;
        padding: 0;
        box-shadow: none;
        border-radius: 0;
        width: 100%;
        font-family: inherit;
        font-feature-settings: inherit;
        font-size: 1rem;
        color: inherit;
    }

    .p-inputchips-input-item input::placeholder {
        color: dt('inputchips.placeholder.color');
    }
`,$e={root:function(n){var t=n.instance,a=n.props;return["p-inputchips p-component p-inputwrapper",{"p-disabled":a.disabled,"p-invalid":a.invalid,"p-focus":t.focused,"p-inputwrapper-filled":a.modelValue&&a.modelValue.length||t.inputValue&&t.inputValue.length,"p-inputwrapper-focus":t.focused}]},input:function(n){var t=n.props,a=n.instance;return["p-inputchips-input",{"p-variant-filled":t.variant?t.variant==="filled":a.$primevue.config.inputStyle==="filled"||a.$primevue.config.inputVariant==="filled"}]},chipItem:function(n){var t=n.state,a=n.index;return["p-inputchips-chip-item",{"p-focus":t.focusedIndex===a}]},pcChip:"p-inputchips-chip",chipIcon:"p-inputchips-chip-icon",inputItem:"p-inputchips-input-item"},Ee=J.extend({name:"inputchips",style:Be,classes:$e}),Ae={name:"BaseInputChips",extends:W,props:{modelValue:{type:Array,default:null},max:{type:Number,default:null},separator:{type:[String,Object],default:null},addOnBlur:{type:Boolean,default:null},allowDuplicate:{type:Boolean,default:!0},placeholder:{type:String,default:null},variant:{type:String,default:null},invalid:{type:Boolean,default:!1},disabled:{type:Boolean,default:!1},inputId:{type:String,default:null},inputClass:{type:[String,Object],default:null},inputStyle:{type:Object,default:null},inputProps:{type:null,default:null},removeTokenIcon:{type:String,default:void 0},chipIcon:{type:String,default:void 0},ariaLabelledby:{type:String,default:null},ariaLabel:{type:String,default:null}},style:Ee,provide:function(){return{$pcInputChips:this,$parentInstance:this}}};function A(e){return De(e)||Te(e)||je(e)||Pe()}function Pe(){throw new TypeError(`Invalid attempt to spread non-iterable instance.
In order to be iterable, non-array objects must have a [Symbol.iterator]() method.`)}function je(e,n){if(e){if(typeof e=="string")return U(e,n);var t={}.toString.call(e).slice(8,-1);return t==="Object"&&e.constructor&&(t=e.constructor.name),t==="Map"||t==="Set"?Array.from(e):t==="Arguments"||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(t)?U(e,n):void 0}}function Te(e){if(typeof Symbol<"u"&&e[Symbol.iterator]!=null||e["@@iterator"]!=null)return Array.from(e)}function De(e){if(Array.isArray(e))return U(e)}function U(e,n){(n==null||n>e.length)&&(n=e.length);for(var t=0,a=Array(n);t<n;t++)a[t]=e[t];return a}var H={name:"InputChips",extends:Ae,inheritAttrs:!1,emits:["update:modelValue","add","remove","focus","blur"],data:function(){return{inputValue:null,focused:!1,focusedIndex:null}},mounted:function(){console.warn("Deprecated since v4. Use AutoComplete component instead with its typeahead property.")},methods:{onWrapperClick:function(){this.$refs.input.focus()},onInput:function(n){this.inputValue=n.target.value,this.focusedIndex=null},onFocus:function(n){this.focused=!0,this.focusedIndex=null,this.$emit("focus",n)},onBlur:function(n){this.focused=!1,this.focusedIndex=null,this.addOnBlur&&this.addItem(n,n.target.value,!1),this.$emit("blur",n)},onKeyDown:function(n){var t=n.target.value;switch(n.code){case"Backspace":t.length===0&&this.modelValue&&this.modelValue.length>0&&(this.focusedIndex!==null?this.removeItem(n,this.focusedIndex):this.removeItem(n,this.modelValue.length-1));break;case"Enter":case"NumpadEnter":t&&t.trim().length&&!this.maxedOut&&this.addItem(n,t,!0);break;case"ArrowLeft":t.length===0&&this.modelValue&&this.modelValue.length>0&&this.$refs.container.focus();break;case"ArrowRight":n.stopPropagation();break;default:this.separator&&(this.separator===n.key||n.key.match(this.separator))&&this.addItem(n,t,!0);break}},onPaste:function(n){var t=this;if(this.separator){var a=this.separator.replace("\\n",`
`).replace("\\r","\r").replace("\\t","	"),s=(n.clipboardData||window.clipboardData).getData("Text");if(s){var i=this.modelValue||[],w=s.split(a);w=w.filter(function(c){return t.allowDuplicate||i.indexOf(c)===-1}),i=[].concat(A(i),A(w)),this.updateModel(n,i,!0)}}},onContainerFocus:function(){this.focused=!0},onContainerBlur:function(){this.focusedIndex=-1,this.focused=!1},onContainerKeyDown:function(n){switch(n.code){case"ArrowLeft":this.onArrowLeftKeyOn(n);break;case"ArrowRight":this.onArrowRightKeyOn(n);break;case"Backspace":this.onBackspaceKeyOn(n);break}},onArrowLeftKeyOn:function(){this.inputValue.length===0&&this.modelValue&&this.modelValue.length>0&&(this.focusedIndex=this.focusedIndex===null?this.modelValue.length-1:this.focusedIndex-1,this.focusedIndex<0&&(this.focusedIndex=0))},onArrowRightKeyOn:function(){this.inputValue.length===0&&this.modelValue&&this.modelValue.length>0&&(this.focusedIndex===this.modelValue.length-1?(this.focusedIndex=null,this.$refs.input.focus()):this.focusedIndex++)},onBackspaceKeyOn:function(n){this.focusedIndex!==null&&this.removeItem(n,this.focusedIndex)},updateModel:function(n,t,a){var s=this;this.$emit("update:modelValue",t),this.$emit("add",{originalEvent:n,value:t}),this.$refs.input.value="",this.inputValue="",setTimeout(function(){s.maxedOut&&(s.focused=!1)},0),a&&n.preventDefault()},addItem:function(n,t,a){if(t&&t.trim().length){var s=this.modelValue?A(this.modelValue):[];(this.allowDuplicate||s.indexOf(t)===-1)&&(s.push(t),this.updateModel(n,s,a))}},removeItem:function(n,t){if(!this.disabled){var a=A(this.modelValue),s=a.splice(t,1);this.focusedIndex=null,this.$refs.input.focus(),this.$emit("update:modelValue",a),this.$emit("remove",{originalEvent:n,value:s})}}},computed:{maxedOut:function(){return this.max&&this.modelValue&&this.max===this.modelValue.length},focusedOptionId:function(){return this.focusedIndex!==null?"".concat(this.$id,"_inputchips_item_").concat(this.focusedIndex):null}},components:{Chip:G}};function $(e){"@babel/helpers - typeof";return $=typeof Symbol=="function"&&typeof Symbol.iterator=="symbol"?function(n){return typeof n}:function(n){return n&&typeof Symbol=="function"&&n.constructor===Symbol&&n!==Symbol.prototype?"symbol":typeof n},$(e)}function R(e,n){var t=Object.keys(e);if(Object.getOwnPropertySymbols){var a=Object.getOwnPropertySymbols(e);n&&(a=a.filter(function(s){return Object.getOwnPropertyDescriptor(e,s).enumerable})),t.push.apply(t,a)}return t}function M(e){for(var n=1;n<arguments.length;n++){var t=arguments[n]!=null?arguments[n]:{};n%2?R(Object(t),!0).forEach(function(a){Ke(e,a,t[a])}):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(t)):R(Object(t)).forEach(function(a){Object.defineProperty(e,a,Object.getOwnPropertyDescriptor(t,a))})}return e}function Ke(e,n,t){return(n=ze(n))in e?Object.defineProperty(e,n,{value:t,enumerable:!0,configurable:!0,writable:!0}):e[n]=t,e}function ze(e){var n=Ne(e,"string");return $(n)=="symbol"?n:n+""}function Ne(e,n){if($(e)!="object"||!e)return e;var t=e[Symbol.toPrimitive];if(t!==void 0){var a=t.call(e,n);if($(a)!="object")return a;throw new TypeError("@@toPrimitive must return a primitive value.")}return(n==="string"?String:Number)(e)}var Le=["aria-labelledby","aria-label","aria-activedescendant"],Fe=["id","aria-label","aria-setsize","aria-posinset","data-p-focused"],Ue=["id","disabled","placeholder","aria-invalid"];function _e(e,n,t,a,s,i){var w=ue("Chip");return f(),y("div",k({class:e.cx("root")},e.ptmi("root")),[r("ul",k({ref:"container",class:e.cx("input"),tabindex:"-1",role:"listbox","aria-orientation":"horizontal","aria-labelledby":e.ariaLabelledby,"aria-label":e.ariaLabel,"aria-activedescendant":s.focused?i.focusedOptionId:void 0,onClick:n[5]||(n[5]=function(c){return i.onWrapperClick()}),onFocus:n[6]||(n[6]=function(){return i.onContainerFocus&&i.onContainerFocus.apply(i,arguments)}),onBlur:n[7]||(n[7]=function(){return i.onContainerBlur&&i.onContainerBlur.apply(i,arguments)}),onKeydown:n[8]||(n[8]=function(){return i.onContainerKeyDown&&i.onContainerKeyDown.apply(i,arguments)})},e.ptm("input")),[(f(!0),y(P,null,F(e.modelValue,function(c,d){return f(),y("li",k({key:"".concat(d,"_").concat(c),id:e.$id+"_inputchips_item_"+d,role:"option",class:e.cx("chipItem",{index:d}),"aria-label":c,"aria-selected":!0,"aria-setsize":e.modelValue.length,"aria-posinset":d+1},{ref_for:!0},e.ptm("chipItem"),{"data-p-focused":s.focusedIndex===d}),[j(e.$slots,"chip",{class:N(e.cx("pcChip")),index:d,value:c,removeCallback:function(u){return e.removeOption(u,d)}},function(){return[m(w,{class:N(e.cx("pcChip")),label:c,removeIcon:e.chipIcon||e.removeTokenIcon,removable:"",unstyled:e.unstyled,onRemove:function(u){return i.removeItem(u,d)},pt:e.ptm("pcChip")},{removeicon:B(function(){return[j(e.$slots,e.$slots.chipicon?"chipicon":"removetokenicon",{class:N(e.cx("chipIcon")),index:d,removeCallback:function(u){return i.removeItem(u,d)}})]}),_:2},1032,["class","label","removeIcon","unstyled","onRemove","pt"])]})],16,Fe)}),128)),r("li",k({class:e.cx("inputItem"),role:"option"},e.ptm("inputItem")),[r("input",k({ref:"input",id:e.inputId,type:"text",class:e.inputClass,style:e.inputStyle,disabled:e.disabled||i.maxedOut,placeholder:e.placeholder,"aria-invalid":e.invalid||void 0,onFocus:n[0]||(n[0]=function(c){return i.onFocus(c)}),onBlur:n[1]||(n[1]=function(c){return i.onBlur(c)}),onInput:n[2]||(n[2]=function(){return i.onInput&&i.onInput.apply(i,arguments)}),onKeydown:n[3]||(n[3]=function(c){return i.onKeyDown(c)}),onPaste:n[4]||(n[4]=function(c){return i.onPaste(c)})},M(M({},e.inputProps),e.ptm("inputItemField"))),null,16,Ue)],16)],16,Le)],16)}H.render=_e;var qe={name:"Chips",extends:H,mounted:function(){console.warn("Deprecated since v4. Use InputChips component instead.")}};const Re={class:"grid grid-cols-12 gap-4"},Me={class:"col-span-12 md:col-span-5"},Je={class:"card"},We={class:"mb-4 text-xl font-bold"},Ge={class:"flex flex-col gap-4"},He={key:0,class:"text-blue-500"},Qe={class:"mt-2 border-t pt-4 dark:border-gray-700"},Xe={class:"flex justify-between items-center mb-3"},Ye={class:"grid grid-cols-12 gap-4 mt-2"},Ze={class:"col-span-12 md:col-span-8"},en={class:"col-span-12 md:col-span-4"},nn={class:"flex items-center gap-2 bg-white dark:bg-gray-900 border border-gray-300 dark:border-gray-600 p-1 rounded-md"},tn=["onUpdate:modelValue"],on={class:"text-[10px] font-mono uppercase text-gray-500"},an={class:"col-span-12"},rn={key:0,class:"text-gray-500 italic block mt-2 text-center"},ln={class:"flex gap-2 mt-2"},sn={class:"col-span-12 md:col-span-7"},cn={class:"card"},dn={class:"flex flex-wrap gap-2"},un={class:"flex gap-2"},Cn={__name:"Secciones",setup(e){const n=pe(),t=me(),a=I([]),s=I(""),i=I([]),w=I(!1),c=I(!1),d=I(!1),S=I(null),u=I({numero:"",casillas_disponibles:[],poligono:null,barrios:null}),Q=()=>{i.value.push({nombre:"",color:"#3b82f6",poligonoTexto:""})},X=l=>{i.value.splice(l,1)},Y=l=>{if(!l||l.length===0)return null;let o=90,b=-90,v=180,g=-180;return l.forEach(h=>{h[0]<o&&(o=h[0]),h[0]>b&&(b=h[0]),h[1]<v&&(v=h[1]),h[1]>g&&(g=h[1])}),{lat:o+(b-o)/2,lng:v+(g-v)/2}},D=async()=>{w.value=!0;try{const l=localStorage.getItem("token_electoral"),o=await E.get("http://127.0.0.1:8000/api/secciones",{headers:{Authorization:`Bearer ${l}`}});a.value=o.data}catch(l){console.error("Error al cargar secciones:",l)}finally{w.value=!1}},Z=l=>{if(d.value=!0,S.value=l.id,s.value=l.poligono?JSON.stringify(l.poligono):"",i.value=[],l.barrios&&l.barrios.length>0){let o=typeof l.barrios=="string"?JSON.parse(l.barrios):l.barrios;i.value=o.map(b=>({nombre:b.nombre,color:b.color||"#3b82f6",poligonoTexto:b.poligono?JSON.stringify(b.poligono):""}))}u.value={numero:l.numero,casillas_disponibles:[...l.casillas_disponibles],poligono:l.poligono,barrios:l.barrios}},_=()=>{d.value=!1,S.value=null,u.value={numero:"",casillas_disponibles:[],poligono:null,barrios:null},s.value="",i.value=[]},ee=async()=>{if(!u.value.numero||u.value.casillas_disponibles.length===0){n.add({severity:"warn",summary:"Campos incompletos",detail:"Por favor escribe el número de sección y agrega al menos una casilla.",life:3e3});return}c.value=!0;try{const l=localStorage.getItem("token_electoral");let o=null;if(s.value)try{o=JSON.parse(s.value)}catch{n.add({severity:"error",summary:"Error de Sintaxis",detail:"El Polígono principal debe ser un arreglo de coordenadas válido.",life:4e3}),c.value=!1;return}u.value.poligono=o;let b=[];for(let v=0;v<i.value.length;v++){let g=i.value[v];if(!g.nombre){n.add({severity:"error",summary:"Falta Nombre",detail:`Por favor escribe un nombre para el barrio #${v+1}.`,life:3e3}),c.value=!1;return}let h=[];if(g.poligonoTexto)try{h=JSON.parse(g.poligonoTexto)}catch{n.add({severity:"error",summary:"Error en Coordenadas",detail:`Las coordenadas del barrio ${g.nombre} no tienen el formato correcto.`,life:4e3}),c.value=!1;return}b.push({nombre:g.nombre.toUpperCase(),color:g.color,centro:Y(h),poligono:h})}u.value.barrios=b,d.value?(await E.put(`http://127.0.0.1:8000/api/secciones/${S.value}`,u.value,{headers:{Authorization:`Bearer ${l}`}}),n.add({severity:"success",summary:"¡Actualizada!",detail:"La sección se modificó correctamente.",life:3e3})):(await E.post("http://127.0.0.1:8000/api/secciones",u.value,{headers:{Authorization:`Bearer ${l}`}}),n.add({severity:"success",summary:"¡Guardada!",detail:"La nueva sección se registró con éxito.",life:3e3})),_(),D()}catch(l){console.error("Error al guardar:",l),n.add({severity:"error",summary:"Error al guardar",detail:"Verifica la información. ¿Quizás ese número de sección ya está registrado?",life:4e3})}finally{c.value=!1}},ne=l=>{t.require({message:"¿Estás seguro de que deseas eliminar esta sección y todas sus casillas? Esta acción no se puede deshacer.",header:"Confirmar Eliminación",icon:"pi pi-exclamation-triangle",rejectProps:{label:"Cancelar",severity:"secondary",outlined:!0},acceptProps:{label:"Sí, Eliminar",severity:"danger"},accept:async()=>{try{const o=localStorage.getItem("token_electoral");await E.delete(`http://127.0.0.1:8000/api/secciones/${l}`,{headers:{Authorization:`Bearer ${o}`}}),D(),n.add({severity:"success",summary:"¡Eliminada!",detail:"La sección fue borrada correctamente.",life:3e3})}catch(o){console.error(o),n.add({severity:"error",summary:"Error",detail:"No se pudo eliminar la sección.",life:3e3})}}})};return fe(()=>{D()}),(l,o)=>{const b=he,v=ke,g=ve,h=qe,K=se,V=le,z=ae,te=re,oe=ie;return f(),y(P,null,[m(b),m(v),r("div",Re,[r("div",Me,[r("div",Je,[r("h5",We,L(d.value?"Editar Sección":"Nueva Sección"),1),r("div",Ge,[r("div",null,[o[3]||(o[3]=r("label",{class:"block font-bold mb-2"},"Número de Sección",-1)),m(g,{modelValue:u.value.numero,"onUpdate:modelValue":o[0]||(o[0]=p=>u.value.numero=p),placeholder:"Ej. 1070",class:"w-full",disabled:d.value},null,8,["modelValue","disabled"]),d.value?(f(),y("small",He,"El número de sección no se puede cambiar, solo las casillas.")):C("",!0)]),r("div",null,[o[4]||(o[4]=r("label",{class:"block font-bold mb-2"},"Casillas Disponibles",-1)),m(h,{modelValue:u.value.casillas_disponibles,"onUpdate:modelValue":o[1]||(o[1]=p=>u.value.casillas_disponibles=p),placeholder:"Escribe y presiona Enter",class:"w-full"},null,8,["modelValue"]),o[5]||(o[5]=r("small",{class:"text-gray-500 block mt-1"},"Ej: Básica (Enter), Contigua 1 (Enter)",-1))]),r("div",null,[o[6]||(o[6]=r("label",{class:"block font-bold mb-2"},"Polígono en Mapa (Opcional)",-1)),m(K,{modelValue:s.value,"onUpdate:modelValue":o[2]||(o[2]=p=>s.value=p),rows:"3",placeholder:"Ej: [[19.43, -99.13], [19.44, -99.14]]",class:"w-full text-xs font-mono"},null,8,["modelValue"]),o[7]||(o[7]=r("small",{class:"text-gray-500 block mt-1"},"Pega el arreglo JSON de coordenadas aquí.",-1))]),r("div",Qe,[r("div",Xe,[o[8]||(o[8]=r("label",{class:"block font-bold mb-2"}," Barrios de la Sección (Opcional) ",-1)),m(V,{label:"Añadir Barrio",icon:"pi pi-plus",size:"small",severity:"secondary",outlined:"",onClick:Q})]),(f(!0),y(P,null,F(i.value,(p,x)=>(f(),y("div",{key:x,class:"p-4 bg-gray-50 dark:bg-gray-800/50 rounded-xl border border-gray-200 dark:border-gray-700 mb-3 relative shadow-sm"},[m(V,{icon:"pi pi-trash",severity:"danger",text:"",rounded:"","aria-label":"Eliminar",class:"absolute top-2 right-2",onClick:O=>X(x),title:"Quitar barrio"},null,8,["onClick"]),r("div",Ye,[r("div",Ze,[o[9]||(o[9]=r("label",{class:"block text-xs font-bold mb-1 text-gray-600"},"Nombre del Barrio",-1)),m(g,{modelValue:p.nombre,"onUpdate:modelValue":O=>p.nombre=O,placeholder:"Ej. CENTRO",class:"w-full p-inputtext-sm uppercase font-bold"},null,8,["modelValue","onUpdate:modelValue"])]),r("div",en,[o[10]||(o[10]=r("label",{class:"block text-xs font-bold mb-1 text-gray-600"},"Color",-1)),r("div",nn,[be(r("input",{type:"color","onUpdate:modelValue":O=>p.color=O,class:"h-6 w-8 cursor-pointer border-0 p-0 bg-transparent"},null,8,tn),[[ge,p.color]]),r("span",on,L(p.color),1)])]),r("div",an,[o[11]||(o[11]=r("label",{class:"block text-xs font-bold mb-1 text-gray-600"},"Coordenadas (Polígono)",-1)),m(K,{modelValue:p.poligonoTexto,"onUpdate:modelValue":O=>p.poligonoTexto=O,rows:"2",placeholder:"[[lat, lng], ...]",class:"w-full text-xs font-mono"},null,8,["modelValue","onUpdate:modelValue"])])])]))),128)),i.value.length===0?(f(),y("small",rn,"No hay subdivisiones configuradas.")):C("",!0)]),r("div",ln,[m(V,{label:d.value?"Actualizar":"Guardar",icon:d.value?"pi pi-refresh":"pi pi-save",severity:"primary",onClick:ee,loading:c.value,class:"flex-1"},null,8,["label","icon","loading"]),d.value?(f(),T(V,{key:0,label:"Cancelar",icon:"pi pi-times",severity:"secondary",outlined:"",onClick:_,class:"flex-1"})):C("",!0)])])])]),r("div",sn,[r("div",cn,[o[13]||(o[13]=r("h5",{class:"mb-4 text-xl font-bold"},"Secciones Registradas",-1)),m(oe,{value:a.value,paginator:!0,rows:10,loading:w.value,class:"p-datatable-sm",showGridlines:"",rowHover:"",size:"large"},{empty:B(()=>[...o[12]||(o[12]=[r("div",{class:"text-center p-4 text-gray-500 font-bold"},[r("i",{class:"pi pi-search text-2xl mb-2 block"}),ye(" No se encontraron registros que coincidan con tu búsqueda. ")],-1)])]),default:B(()=>[m(z,{field:"numero",header:"Sección",style:{width:"20%"}}),m(z,{header:"Casillas"},{body:B(({data:p})=>[r("div",dn,[(f(!0),y(P,null,F(p.casillas_disponibles,x=>(f(),T(te,{key:x,value:x,severity:"info"},null,8,["value"]))),128))])]),_:1}),m(z,{header:"Acciones",style:{width:"15%"}},{body:B(({data:p})=>[r("div",un,[m(V,{icon:"pi pi-pencil",severity:"success",rounded:"",outlined:"",onClick:x=>Z(p)},null,8,["onClick"]),m(V,{icon:"pi pi-trash",severity:"danger",rounded:"",outlined:"",onClick:x=>ne(p.id)},null,8,["onClick"])])]),_:1})]),_:1},8,["value","loading"])])])])],64)}}};export{Cn as default};
