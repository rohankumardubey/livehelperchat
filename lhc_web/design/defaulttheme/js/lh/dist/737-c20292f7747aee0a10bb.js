(self.webpackChunk=self.webpackChunk||[]).push([[737],{737:a=>{var o={cancelcolorbox:function(){$("#myModal").foundation("reveal","close")},initializeModal:function(a){var o=null!=a?a:"myModal";0==$("#"+o).length&&(0==$("#widget-layout").length?$("body"):$("#widget-layout")).prepend('<div id="'+o+'" class="modal bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true"></div>')},hideCallback:!1,modalInstance:null,revealModal:function(a){o.modalInstance&&o.modalInstance.hide(),void 0!==a.hidecallback?o.hideCallback=!0:o.hideCallback=!1,o.initializeModal("myModal");var e={show:!0,focus:!($("#admin-body").length>0),backdrop:!($("#admin-body").length>0)||void 0!==a.backdrop&&1==a.backdrop};if(void 0===a.iframe)void 0!==a.loadmethod&&"post"==a.loadmethod?jQuery.post(a.url,a.datapost,(function(l){void 0!==a.showcallback&&$("#myModal").on("shown.bs.modal",a.showcallback),void 0!==a.hidecallback&&$("#myModal").on("hide.bs.modal",a.hidecallback),""!=l?($("#myModal").html(l),o.modalInstance=new bootstrap.Modal("#myModal",e),o.modalInstance.show(),o.setCenteredDraggable()):void 0!==a.on_empty?a.on_empty():alert("Empty content was returned!")})):jQuery.get(a.url,(function(l){void 0!==a.showcallback&&$("#myModal").on("shown.bs.modal",a.showcallback),void 0!==a.hidecallback&&$("#myModal").on("hide.bs.modal",a.hidecallback),""!=l?($("#myModal").html(l),o.modalInstance=new bootstrap.Modal("#myModal",e),o.modalInstance.show(),o.setCenteredDraggable()):void 0!==a.on_mepty?a.on_mepty():alert("Empty content was returned!")}));else{var l="",t="";void 0===a.hideheader?l='<div class="modal-header"><h4 class="modal-title" id="myModalLabel"><span class="material-icons">info</span>'+(void 0===a.title?"":a.title)+'</h4><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div>':t=(void 0===a.title?"":"<b>"+a.title+"</b>")+'<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>';var d=void 0===a.modalbodyclass?"":" "+a.modalbodyclass;void 0!==a.showcallback&&$("#myModal").on("shown.bs.modal",a.showcallback),void 0!==a.hidecallback&&$("#myModal").on("hide.bs.modal",a.hidecallback),$("#myModal").html('<div class="modal-dialog modal-dialog-scrollable modal-xl"><div class="modal-content">'+l+'<div class="modal-body'+d+'">'+t+'<iframe src="'+a.url+'" frameborder="0" style="width:100%" height="'+a.height+'" /></div></div></div>'),o.modalInstance=new bootstrap.Modal("#myModal",e),o.modalInstance.show(),o.setCenteredDraggable()}},setCenteredDraggable:function(){if($("#admin-body").length>0){var a=$("#myModal .modal-dialog"),e=o.rememberPositions(),l=o.getPositions();(null===e||parseInt(e[1])>l.width||parseInt(e[0])>l.height||parseInt(e[0])<0||a.width()+parseInt(e[1])<0)&&(e=[(l.height-a.height())/2,(l.width-a.width())/2]),a.draggabilly({handle:".modal-header",containment:"#admin-body"}).css({top:parseInt(e[0]),left:parseInt(e[1])}).on("dragEnd",(function(e,l){o.rememberPositions(a.position().top,a.position().left)}))}},rememberPositions:function(a,o){if(sessionStorage)if(a&&o)try{var e=sessionStorage.setItem("mpos",a+","+o)}catch(a){}else try{if(null!==(e=sessionStorage.getItem("mpos")))return e.split(",")}catch(a){}return null},getPositions:function(){return{width:window.innerWidth||document.documentElement.clientWidth||document.body.clientWidth||0,height:window.innerHeight||document.documentElement.clientHeight||document.body.clientHeight||0}}};a.exports=o}}]);