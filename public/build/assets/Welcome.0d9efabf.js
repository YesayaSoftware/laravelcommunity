import{o as l,p as S,l as s,c as n,a as e,e as M,k as B,A as T,n as y,x as a,q as _,L as b,s as g,m as o,t as v,z as d,F as w,y as z,H as V,d as f}from"./app.af8eb93d.js";import{_ as p}from"./plugin-vue_export-helper.21dcd24c.js";function N(r,i){return l(),S("svg",{xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 20 20",fill:"currentColor","aria-hidden":"true"},[s("path",{"fill-rule":"evenodd",d:"M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z","clip-rule":"evenodd"})])}const D={name:"Subscribe",data(){return{form:this.$inertia.form({email:""})}},components:{CheckCircleIcon:N},props:["sessions"],methods:{store(){this.form.post(this.route("subscribe.store"),{preserveScroll:!0,onSuccess:()=>this.form.reset()})}}},j={class:"bg-white"},A={class:"max-w-7xl mx-auto px-4 py-12 sm:px-6 lg:py-16 lg:px-8"},I={class:"px-6 py-6 bg-primary-900 rounded-lg md:py-12 md:px-12 lg:py-16 lg:px-16 xl:flex xl:items-center"},E=e("div",{class:"xl:w-0 xl:flex-1"},[e("h2",{class:"text-2xl font-extrabold tracking-tight text-white sm:text-3xl"}," Want community news and updates? "),e("p",{class:"mt-3 max-w-3xl text-lg leading-6 text-primary-300"}," Sign up for our newsletter to stay up to date. ")],-1),F={class:"sm:flex"},H=e("label",{for:"email-address",class:"sr-only"}," Email address ",-1),W=["disabled"],G=e("p",{class:"mt-3 text-sm text-primary-300"},[a(" We care about the protection of your data. Read our "),e("a",{href:"/privacy",class:"text-white font-medium underline"}," Privacy Policy. ")],-1);function J(r,i,x,h,c,m){return l(),n("div",j,[e("div",A,[e("div",I,[E,e("div",{onSubmit:i[1]||(i[1]=M((...t)=>m.store&&m.store(...t),["prevent"])),class:"mt-8 sm:w-full sm:max-w-md xl:mt-0 xl:ml-8"},[e("form",F,[H,B(e("input",{id:"email-address",name:"email-address",type:"email","onUpdate:modelValue":i[0]||(i[0]=t=>c.form.email=t),autocomplete:"email",required:"",class:"w-full border-white px-5 py-3 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-primary-800 focus:ring-white rounded-md",placeholder:"Enter your email"},null,512),[[T,c.form.email]]),e("button",{class:y([{"opacity-25":c.form.processing},"mt-3 w-full flex items-center justify-center px-5 py-3 border border-transparent shadow text-base font-medium rounded-md text-primary-900 bg-primary-100 hover:bg-primary-300 hover:text-primary-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-primary-800 focus:ring-white sm:mt-0 sm:ml-3 sm:w-auto sm:flex-shrink-0"]),disabled:c.form.processing,type:"submit"}," Notify me ",10,W)]),G],32)])])])}var P=p(D,[["render",J]]);const U=_({components:{Link:b}}),O={class:"bg-gray-100 dark:bg-gray-900"},R={class:"max-w-screen-xl mx-auto py-12 px-4 sm:px-6 lg:py-16 lg:px-8"},Y={class:"xl:grid xl:grid-cols-3 xl:gap-8"},q=d('<div class="xl:col-span-1"><img class="h-10" src="/img/logo.png" alt="Laravel Community"><p class="mt-8 text-gray-500 text-base leading-6"> Reach out to us on Social Media. </p><div class="mt-8 flex"><a href="https://facebook.com/laravelcommunity" class="dark:hover:text-gray-100 text-gray-400 hover:text-gray-500" target="_blank"><span class="sr-only">Facebook</span><svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd"></path></svg></a><a href="https://instagram.com/laravelcommunity" class="ml-6 dark:hover:text-gray-100 text-gray-400 hover:text-gray-500" target="_blank"><span class="sr-only">Instagram</span><svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd"></path></svg></a><a href="https://twitter.com/laravelcommunity" class="ml-6 dark:hover:text-gray-100 text-gray-400 hover:text-gray-500" target="_blank"><span class="sr-only">Twitter</span><svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24"><path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"></path></svg></a><a href="https://github.com/YesayaSoftware/laravelcommunity" class="ml-6 dark:hover:text-gray-100 text-gray-400 hover:text-gray-500" target="_blank"><span class="sr-only">GitHub</span><svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd"></path></svg></a></div></div>',1),Z={class:"mt-12 grid grid-cols-2 gap-8 xl:mt-0 xl:col-span-2"},K={class:"md:grid md:grid-cols-2 md:gap-8"},Q=e("h4",{class:"text-sm leading-5 font-semibold tracking-wider text-gray-400 uppercase"}," Posts ",-1),X={class:"mt-4"},ee=a(" Laravel "),te={class:"mt-4"},se=a(" Inertia "),ae={class:"mt-4"},re=a(" Livewire "),oe={class:"mt-4"},ie=a(" Vue JS "),le={class:"mt-4"},ne=a(" Tailwind CSS "),ce=d('<div class="mt-12 md:mt-0"><h4 class="text-sm leading-5 font-semibold tracking-wider text-gray-400 uppercase"> Events </h4><ul class="mt-4"><li><a href="" target="_blank" class="text-base leading-6 dark:hover:text-gray-100 text-gray-500 hover:text-gray-900"> Laracon TZ </a></li><li class="mt-4"><a href="" target="_blank" class="text-base leading-6 dark:hover:text-gray-100 text-gray-500 hover:text-gray-900"> Virtual Meetup </a></li></ul></div>',1),de={class:"md:grid md:grid-cols-2 md:gap-8"},ge=e("h4",{class:"text-sm leading-5 font-semibold tracking-wider text-gray-400 uppercase"}," Tutorials ",-1),me={class:"mt-4"},he=a(" Laravel "),pe={class:"mt-4"},xe=a(" Inertia "),ue={class:"mt-4"},ve=a(" Livewire "),fe={class:"mt-4"},ye=a(" Vue JS "),_e={class:"mt-4"},be=a(" Tailwind CSS "),we={class:"mt-12 md:mt-0"},ke=e("h4",{class:"text-sm leading-5 font-semibold tracking-wider text-gray-400 uppercase"}," Legal ",-1),$e={class:"mt-4"},Le={class:"mt-4"},Ce=a(" Privacy "),Se={class:"mt-4"},Me=a(" Terms "),Be={class:"mt-12 border-t border-gray-200 pt-8"},Te={class:"text-base leading-6 text-gray-400 xl:text-center"};function ze(r,i,x,h,c,m){const t=g("Link");return l(),n("div",O,[e("div",R,[e("div",Y,[q,e("div",Z,[e("div",K,[e("div",null,[Q,e("ul",X,[e("li",null,[s(t,{href:"/posts/?page=1&category=laravel",class:"text-base dark:hover:text-gray-100 leading-6 text-gray-500 hover:text-gray-900"},{default:o(()=>[ee]),_:1})]),e("li",te,[s(t,{href:"/posts/?page=1&category=inertia",class:"text-base dark:hover:text-gray-100 leading-6 text-gray-500 hover:text-gray-900"},{default:o(()=>[se]),_:1})]),e("li",ae,[s(t,{href:"/posts/?page=1&category=livewire",class:"text-base dark:hover:text-gray-100 leading-6 text-gray-500 hover:text-gray-900"},{default:o(()=>[re]),_:1})]),e("li",oe,[s(t,{href:"/posts/?page=1&category=vue-js",class:"text-base dark:hover:text-gray-100 leading-6 text-gray-500 hover:text-gray-900"},{default:o(()=>[ie]),_:1})]),e("li",le,[s(t,{href:"/posts/?page=1&category=tailwind-css",class:"text-base dark:hover:text-gray-100 leading-6 text-gray-500 hover:text-gray-900"},{default:o(()=>[ne]),_:1})])])]),ce]),e("div",de,[e("div",null,[ge,e("ul",me,[e("li",null,[s(t,{href:"/posts/?page=1&category=laravel",class:"text-base dark:hover:text-gray-100 leading-6 text-gray-500 hover:text-gray-900"},{default:o(()=>[he]),_:1})]),e("li",pe,[s(t,{href:"/posts/?page=1&category=inertia",class:"text-base dark:hover:text-gray-100 leading-6 text-gray-500 hover:text-gray-900"},{default:o(()=>[xe]),_:1})]),e("li",ue,[s(t,{href:"/posts/?page=1&category=livewire",class:"text-base dark:hover:text-gray-100 leading-6 text-gray-500 hover:text-gray-900"},{default:o(()=>[ve]),_:1})]),e("li",fe,[s(t,{href:"/posts/?page=1&category=vue-js",class:"text-base dark:hover:text-gray-100 leading-6 text-gray-500 hover:text-gray-900"},{default:o(()=>[ye]),_:1})]),e("li",_e,[s(t,{href:"/posts/?page=1&category=tailwind-css",class:"text-base dark:hover:text-gray-100 leading-6 text-gray-500 hover:text-gray-900"},{default:o(()=>[be]),_:1})])])]),e("div",we,[ke,e("ul",$e,[e("li",Le,[s(t,{href:"/privacy",class:"text-base dark:hover:text-gray-100 leading-6 text-gray-500 hover:text-gray-900"},{default:o(()=>[Ce]),_:1})]),e("li",Se,[s(t,{href:"#",class:"text-base dark:hover:text-gray-100 leading-6 text-gray-500 hover:text-gray-900"},{default:o(()=>[Me]),_:1})])])])])])]),e("div",Be,[e("p",Te," \xA9 "+v(new Date().getFullYear())+" Laravel Community Tanzania. All rights reserved. ",1)])])])}var Ve=p(U,[["render",ze]]);const Ne=[{title:"Laravel",description:"If your here, you already know about Laravel. We going to talk more about Laravel and the ecosystem around it."},{title:"VueJS",description:"VueJS has been in the DNA of Laravel, and Laravel Developers we love it. Why don\u2019t we talk about it?"},{title:"Tailwind CSS",description:"The styling of an application can be tideous. Tailwind come to rescue us from this and it is working perfectly with Laravel."},{title:"Livewire",description:"If the page reload bothers you during form submission, then with Livewire you can do all the magic."},{title:"Inertia",description:"You can actually build single-page apps, without building an API."},{title:"Laravel Developers",description:"Let\u2019s build a database that will recognise Laravel Developers in Tanzania."},{title:"Events",description:"Laravel developers will prepare different talk and show case of different products."},{title:"Blog",description:"Developers will be invited to write blog posts as authors in the Laravel Community website."}],De={name:"Goals",setup(){return{goals:Ne}}},je={class:"bg-white"},Ae={class:"max-w-7xl mx-auto py-16 px-4 sm:px-6 lg:px-8"},Ie=e("div",{class:"max-w-3xl mx-auto text-center"},[e("h2",{class:"text-3xl font-extrabold text-gray-900"}," About the Community "),e("p",{class:"mt-4 text-lg text-gray-500"}," This community is for Developers and built with Love by Developers in Tanzania. Laravel is a game changer to many and this is the corner for discussion. ")],-1),Ee={class:"mt-12 space-y-10 sm:space-y-0 sm:grid sm:grid-cols-2 sm:gap-x-6 sm:gap-y-12 lg:grid-cols-4 lg:gap-x-8"},Fe=e("svg",{class:"absolute h-6 w-6 text-green-500",xmlns:"http://www.w3.org/2000/svg",fill:"none",viewBox:"0 0 24 24",stroke:"currentColor","aria-hidden":"true"},[e("path",{"stroke-linecap":"round","stroke-linejoin":"round","stroke-width":"2",d:"M5 13l4 4L19 7"})],-1),He={class:"ml-9 text-lg leading-6 font-medium text-gray-900"},We={class:"mt-2 ml-9 text-base text-gray-500"};function Ge(r,i,x,h,c,m){return l(),n("div",je,[e("div",Ae,[Ie,e("dl",Ee,[(l(!0),n(w,null,z(h.goals,t=>(l(),n("div",{key:t.title,class:"relative"},[e("dt",null,[Fe,e("p",He,v(t.title),1)]),e("dd",We,v(t.description),1)]))),128))])])])}var Je=p(De,[["render",Ge]]);const Pe=_({data(){return{hideMobileNav:!0}},components:{Goals:Je,Head:V,Link:b,Subscribe:P,Footer:Ve},props:{canLogin:Boolean,canRegister:Boolean,laravelVersion:String,phpVersion:String},methods:{toggleMobileNav(){this.hideMobileNav=!this.hideMobileNav}}}),Ue={class:"relative bg-white overflow-hidden"},Oe=d('<div class="hidden lg:block lg:absolute lg:inset-0" aria-hidden="true"><svg class="absolute mt-0 top-0 left-1/2 transform translate-x-64 -translate-y-8" width="640" height="784" fill="none" viewBox="0 0 640 784"><defs><pattern id="9ebea6f4-a1f5-4d96-8c4e-4c2abf658047" x="118" y="0" width="20" height="20" patternUnits="userSpaceOnUse"><rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor"></rect></pattern></defs><rect y="72" width="640" height="640" class="text-gray-50" fill="currentColor"></rect><rect x="118" width="404" height="784" fill="url(#9ebea6f4-a1f5-4d96-8c4e-4c2abf658047)"></rect></svg></div>',1),Re={class:"relative pt-6 pb-16 sm:pb-24 lg:pb-32"},Ye={class:"relative max-w-7xl mx-auto flex items-center justify-between px-4 sm:px-6","aria-label":"Global"},qe={class:"flex items-center flex-1"},Ze={class:"flex items-center justify-between w-full md:w-auto"},Ke=e("a",{href:"#"},[e("span",{class:"sr-only"},"Laravel Community Tanzania"),e("img",{class:"h-12 w-auto sm:h-10",src:"/img/logo.png",alt:"Laravel Community Tanzania"})],-1),Qe=e("button",{type:"button",class:"bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-primary-800","aria-expanded":"false"},[e("span",{class:"sr-only"},"Open main menu"),e("svg",{class:"h-6 w-6",xmlns:"http://www.w3.org/2000/svg",fill:"none",viewBox:"0 0 24 24",stroke:"currentColor","aria-hidden":"true"},[e("path",{"stroke-linecap":"round","stroke-linejoin":"round","stroke-width":"2",d:"M4 6h16M4 12h16M4 18h16"})])],-1),Xe=[Qe],et=d('<div class="hidden md:block md:ml-10 md:space-x-10"><a href="#" class="font-medium text-gray-500 hover:text-gray-900"> Home </a><a href="/posts" class="font-medium text-gray-500 hover:text-gray-900"> Blog </a><a href="#" class="font-medium text-gray-500 hover:text-gray-900"> Events </a><a href="#" class="font-medium text-gray-500 hover:text-gray-900"> Developers </a></div>',1),tt={key:0,class:"hidden md:block text-right"},st={class:"inline-flex rounded-md shadow-md ring-1 ring-black ring-opacity-5"},at=["href"],rt={class:"rounded-lg shadow-md bg-white ring-1 ring-black ring-opacity-5 overflow-hidden"},ot={class:"px-5 pt-4 flex items-center justify-between"},it=e("div",null,[e("img",{class:"h-12 w-auto",src:"/img/logo.png",alt:"Laravel Community Tanzania"})],-1),lt=e("button",{type:"button",class:"bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-primary-800"},[e("span",{class:"sr-only"},"Close main menu"),e("svg",{class:"h-6 w-6",xmlns:"http://www.w3.org/2000/svg",fill:"none",viewBox:"0 0 24 24",stroke:"currentColor","aria-hidden":"true"},[e("path",{"stroke-linecap":"round","stroke-linejoin":"round","stroke-width":"2",d:"M6 18L18 6M6 6l12 12"})])],-1),nt=[lt],ct=d('<div class="px-2 pt-2 pb-3 space-y-1"><a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50"> Home </a><a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50"> Blog </a><a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50"> Events </a><a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50"> Developers </a></div>',1),dt={key:0,href:"#",class:"block w-full px-5 py-3 text-center font-medium text-primary-900 bg-gray-50 hover:bg-gray-100"},gt={class:"mt-16 mx-auto max-w-7xl px-4 sm:mt-24 sm:px-6 lg:mt-32"},mt={class:"lg:grid lg:grid-cols-12 lg:gap-8"},ht={class:"sm:text-center md:max-w-2xl md:mx-auto lg:col-span-6 lg:text-left"},pt=d('<h1><span class="block text-sm font-semibold uppercase tracking-wide text-gray-500 sm:text-base lg:text-sm xl:text-base">Tanzania</span><span class="mt-1 block text-4xl tracking-tight font-extrabold sm:text-5xl xl:text-6xl"><span class="block text-gray-900">A Community for</span><span class="block text-primary-900">Laravel Developers</span></span></h1><p class="mt-3 text-base text-gray-500 sm:mt-5 sm:text-xl lg:text-lg xl:text-xl"> A like minded community that brings together Laravel Developers in Tanzania to discuss issues and exchange ideas. </p>',2),xt={class:"mt-8 sm:max-w-lg sm:mx-auto sm:text-center lg:text-left lg:mx-0"},ut=a(" Join our community today "),vt=d('<div class="mt-12 relative sm:max-w-lg sm:mx-auto lg:mt-0 lg:max-w-none lg:mx-0 lg:col-span-6 lg:flex lg:items-center"><svg class="absolute top-0 left-1/2 transform -translate-x-1/2 -translate-y-8 scale-75 origin-top sm:scale-100 lg:hidden" width="640" height="784" fill="none" viewBox="0 0 640 784" aria-hidden="true"><defs><pattern id="4f4f415c-a0e9-44c2-9601-6ded5a34a13e" x="118" y="0" width="20" height="20" patternUnits="userSpaceOnUse"><rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor"></rect></pattern></defs><rect y="72" width="640" height="640" class="text-gray-50" fill="currentColor"></rect><rect x="118" width="404" height="784" fill="url(#4f4f415c-a0e9-44c2-9601-6ded5a34a13e)"></rect></svg><div class="relative mx-auto w-full rounded-lg shadow-lg lg:max-w-md"><button type="button" class="relative block w-full bg-white rounded-lg overflow-hidden focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-800"><span class="sr-only">Watch our video to learn more</span><img class="w-full" src="/img/banner.jpg" alt="Laravel Developers"><div class="absolute inset-0 w-full h-full flex items-center justify-center" aria-hidden="true"><svg class="h-20 w-20 text-primary-900" fill="currentColor" viewBox="0 0 84 84"><circle opacity="0.9" cx="42" cy="42" r="42" fill="white"></circle><path d="M55.5039 40.3359L37.1094 28.0729C35.7803 27.1869 34 28.1396 34 29.737V54.263C34 55.8604 35.7803 56.8131 37.1094 55.9271L55.5038 43.6641C56.6913 42.8725 56.6913 41.1275 55.5039 40.3359Z"></path></svg></div></button></div></div>',1);function ft(r,i,x,h,c,m){const t=g("Head"),k=g("Link"),$=g("Goals"),L=g("Subscribe"),C=g("Footer");return l(),n(w,null,[s(t,{title:"Welcome"}),e("div",Ue,[Oe,e("div",Re,[e("div",null,[e("nav",Ye,[e("div",qe,[e("div",Ze,[Ke,e("div",{onClick:i[0]||(i[0]=(...u)=>r.toggleMobileNav&&r.toggleMobileNav(...u)),class:"-mr-2 flex items-center md:hidden"},Xe)]),et]),r.$page.props.user?f("",!0):(l(),n("div",tt,[e("span",st,[e("a",{href:r.route("login"),class:"inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md text-primary-900 bg-white hover:bg-gray-50"}," Log in ",8,at)])]))]),e("div",{class:y([{hidden:r.hideMobileNav},"absolute top-0 inset-x-0 p-2 transition transform origin-top-right md:hidden"])},[e("div",rt,[e("div",ot,[it,e("div",{onClick:i[1]||(i[1]=(...u)=>r.toggleMobileNav&&r.toggleMobileNav(...u)),class:"-mr-2"},nt)]),ct,r.$page.props.user?f("",!0):(l(),n("a",dt," Log in "))])],2)]),e("main",gt,[e("div",mt,[e("div",ht,[pt,e("div",xt,[s(k,{href:r.route("register"),class:"mt-3 w-full px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-primary-800 shadow-sm hover:bg-primary-900 active:bg-primary-300 active:text-primary-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-800 sm:mt-0 sm:ml-3 sm:flex-shrink-0 sm:inline-flex sm:items-center sm:w-auto"},{default:o(()=>[ut]),_:1},8,["href"])])]),vt])])])]),s($),s(L),s(C)],64)}var bt=p(Pe,[["render",ft]]);export{bt as default};
