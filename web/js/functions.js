// Side Navigation Menu Slide

$(document).ready(function() {
    $("#nav > li > a.collapsed + ul").slideToggle("medium");
    $("#nav > li > a").click(function() {
            $(this).toggleClass('expanded').toggleClass('collapsed').parent().find('> ul').slideToggle('medium');
    });
});

/************************************************************************
 * @name: bPopup
 * @author: Bjoern Klinggaard (http://dinbror.dk/bpopup)
 * @version: 0.4.1.min
 ************************************************************************/ 

(function(b){b.fn.bPopup=b.bPopup=function(r,u){function s(){j=v(c,a.amsl);f=l?a.position[1]:j[1];g=m?a.position[0]:j[0];t=w();a.modal&&b('<div class="bModal '+d+'"></div>').css({"background-color":a.modalColor,height:"100%",left:0,opacity:0,position:"fixed",top:0,width:"100%","z-index":a.zIndex+n}).each(function(){a.appending&&b(this).appendTo(a.appendTo)}).fadeTo(a.fadeSpeed,a.opacity);c.data("bPopup",a).data("id",d).css({left:!(!a.follow[0]&&m||k)?g+h.scrollLeft():g,position:a.positionStyle||"absolute",top:!(!a.follow[1]&&l||k)?f+h.scrollTop():f,"z-index":a.zIndex+n+1}).each(function(){a.appending&&b(this).appendTo(a.appendTo)}).fadeIn(a.fadeSpeed,function(){p(u);e.data("bPopup",n);c.delegate("."+a.closeClass,"click."+d,q);a.modalClose&&b(".bModal."+d).css("cursor","pointer").bind("click",q);!x&&(a.follow[0]||a.follow[1])&&e.bind("scroll."+d,function(){t&&c.stop().animate({left:a.follow[0]&&!k?g+h.scrollLeft():g,top:a.follow[1]&&!k?f+h.scrollTop():f},a.followSpeed)}).bind("resize."+d,function(){if(t=w())j=v(c,a.amsl),a.follow[0]&&(g=m?g:j[0]),a.follow[1]&&(f=l?f:j[1]),c.stop().each(function(){k?b(this).css({left:g,top:f}):b(this).animate({left:!m?g+h.scrollLeft():g,top:!l?f+h.scrollTop():f},a.followSpeed)})});a.escClose&&h.bind("keydown."+d,function(a){27==a.which&&q()})})}function q(){a.modal&&b(".bModal."+c.data("id")).fadeTo(a.fadeSpeed,0,function(){b(this).remove()});c.stop().fadeOut(a.fadeSpeed,function(){a.loadUrl&&a.contentContainer.empty();a.scrollBar||b("html").css("overflow","auto");c.undelegate("."+a.closeClass,"click."+d,q);b(".bModal."+d).unbind("click");h.unbind("keydown."+d);e.unbind("."+d);e.data("bPopup",0<e.data("bPopup")-1?e.data("bPopup")-1:null);c.data("bPopup",null)});a.onClose&&setTimeout(function(){p(a.onClose)},a.fadeSpeed);return!1}function p(a){b.isFunction(a)&&a.call(c)}function v(a,b){var c=((window.innerWidth||e.width())-a.outerWidth(!0))/2,d=((window.innerHeight||e.height())-a.outerHeight(!0))/2-b;return[c,20>d?20:d]}function w(){return(window.innerHeight||e.height())>c.outerHeight(!0)+20&&(window.innerWidth||e.width())>c.outerWidth(!0)+20}b.isFunction(r)&&(u=r,r=null);var a=b.extend({},b.fn.bPopup.defaults,r);a.scrollBar||b("html").css("overflow","hidden");var c=this,h=b(document),e=b(window),x=/OS 6(_\d)+/i.test(navigator.userAgent),n,d,t,l,m,k,j,f,g;c.close=function(){a=this.data("bPopup");d="__bPopup"+e.data("bPopup");q()};return c.each(function(){if(!c.data("bPopup"))if(p(a.onOpen),n=(e.data("bPopup")||0)+1,d="__bPopup"+n,l="auto"!==a.position[1],m="auto"!==a.position[0],k="fixed"===a.positionStyle,a.loadUrl)switch(a.contentContainer=b(a.contentContainer||c),a.content){case "iframe":b('<iframe id="bIframe" scrolling="no" frameborder="0"></iframe>').attr("src",a.loadUrl).appendTo(a.contentContainer);p(a.loadCallback);s();break;default:a.contentContainer.load(a.loadUrl,function(){p(a.loadCallback);s()})}else s()})};b.fn.bPopup.defaults={amsl:50,appending:!0,appendTo:"body",closeClass:"bClose",content:"ajax",contentContainer:!1,escClose:!0,fadeSpeed:250,follow:[!0,!0],followSpeed:500,loadCallback:!1,loadUrl:!1,modal:!0,modalClose:!0,modalColor:"#000",onClose:!1,onOpen:!1,opacity:0.7,position:["auto","auto"],positionStyle:"absolute",scrollBar:!0,zIndex:9997}})(jQuery);

		
// Select all checkboxes
$(document).ready(function(){
    $("#checkboxall").click(function(){
        var checked_status = this.checked;
        $("input[name=checkall]").each(function() {
            this.checked = checked_status;
        });
    });
});

